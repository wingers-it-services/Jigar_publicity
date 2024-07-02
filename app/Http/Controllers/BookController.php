<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\GymNotification;
use App\Models\IndustriesCategorie;
use App\Models\Industry_Detail;
use App\Models\IndustryDetail;
use App\Models\UnitDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class BookController extends Controller
{
    protected $notification;
    protected $book;
    private $industriesCategorie;
    private $industryDetail;
    private $unitDetail;

    public function __construct(GymNotification $notification, Book $book, IndustriesCategorie $industriesCategorie, IndustryDetail $industryDetail, UnitDetail $unitDetail)
    {
        $this->notification = $notification;
        $this->book = $book;
        $this->industriesCategorie = $industriesCategorie;
        $this->industryDetail = $industryDetail;
        $this->unitDetail = $unitDetail;
    }

    public function bookList(Request $request)
    {
        $status = null;
        $message = null;
        $books = $this->book->withCount('industries')->get();
        return view('admin.books-list', compact('status', 'message', 'books'));
    }

    public function showAddBook(Request $request)
    {
        return view('admin.add-book');
    }

    public function bookDetails($uuid)
    {
        $bookDetails = $this->book->where('uuid', $uuid)->first();
        $industryDetails = $this->industryDetail->where('book_id', $uuid)->get();
        // Get the category IDs from the industry details
        $categoryIds = $industryDetails->pluck('category_id')->unique();
        // Filter the categories based on the category IDs from the industry details
        $industriesCategorie = $this->industriesCategorie->whereIn('id', $categoryIds)->get();

        // Count the number of units for each category
        $industriesCategorie = $industriesCategorie->map(function ($category) use ($industryDetails) {
            $categoryIndustryIds = $industryDetails->where('category_id', $category->id)->pluck('id');
            $category->unit_count = $this->unitDetail->whereIn('industry_detail_id', $categoryIndustryIds)->count();
            return $category;
        });

        $categorys = $this->industriesCategorie->all();


        return view('admin.book-details', compact('bookDetails', 'industriesCategorie', 'industryDetails', 'categorys'));
    }

    public function addBook(Request $request)
    {
        try {
            $request->validate([
                "image" => 'required',
                "book_name" => 'required',
                "book_price" => 'required',
                "association_name" => 'required',
                "association_web_link" => 'required',
                "association_email" => 'required',
                "association_ph_no" => 'required',
                "association_address" => 'required',
                "publication_name" => 'required',
                "publication_web_link" => 'required',
                "publication_email" => 'required',
                "publication_ph_no" => 'required',
                "publication_address" => 'required'
            ]);

            $validateData = $request->all();
            $imagePath = null;
            if ($request->hasFile('image')) {
                $bookPhoto = $request->file('image');
                $filename = time() . '_' . $bookPhoto->getClientOriginalName();
                $imagePath = 'books_images/' . $filename;
                $bookPhoto->move(public_path('books_images/'), $filename);
            }

            $this->book->addBook($validateData, $imagePath);

            return redirect()->back()->with('success', 'Data saved successfully.');
        } catch (\Throwable $th) {
            Log::error("[BookController][addBook] error " . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function updateBook(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "uuid" => 'required',
                "book_name" => 'required',
                "book_price" => 'required',
                'image' => 'nullable'
                // "association_name" => 'required',
                // "association_web_link" => 'required',
                // "association_email" => 'required',
                // "association_ph_no" => 'required',
                // "association_address" => 'required',
                // "publication_name" => 'required',
                // "publication_web_link" => 'required',
                // "publication_email" => 'required',
                // "publication_ph_no" => 'required',
                // "publication_address" => 'required'
            ]);

            $uuid = $request->uuid;
            $imagePath = null;
            if ($request->hasFile('image')) {
                $bookPhoto = $request->file('image');
                $filename = time() . '_' . $bookPhoto->getClientOriginalName();
                $imagePath = 'books_images/' . $filename;
                $bookPhoto->move(public_path('books_images/'), $filename);
            }
            $updatedbook = $this->book->updateBook($validatedData, $imagePath, $uuid);
            if ($updatedbook) {
                return redirect()->back()->with("status", "success")->with("message", "Subscription Upated Succesfully");
            } else {
                return redirect()->back()->with('error', 'error while updating profile');
            }
        } catch (\Exception $th) {
            Log::error("[BookController][updateBook] error " . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function deleteBook($uuid)
    {
        $books = $this->book->where('uuid', $uuid)->firstOrFail();
        $books->delete();
        return redirect()->back()->with('success', 'Book deleted successfully!');
    }

    public function checkCategoryId(Request $request)
    {
        $categoryId = $request->input('category_id');
        $exists = $this->industryDetail->where('category_id', $categoryId)->exists();

        return response()->json(['exists' => $exists]);
    }


    public function addIndustryInBook(Request $request)
    {
        // dd($request->all());
        try {

            $validatedData = $request->validate([
                'image' => 'required',
                'book_id' => 'required',
                'category_id' => 'required',
                'industry_name' => 'required',
                'contact_no' => 'required',
                'address' => 'required',
                // 'size.*' => 'required',
                // 'quantity.*' => 'required',
                // 'status.*' => 'required',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $industryImage = $request->file('image');
                $filename = time() . '_' . $industryImage->getClientOriginalName();
                $imagePath = 'industry_images/' . $filename;
                $industryImage->move(public_path('industry_images/'), $filename);
            }

            // Call addProductDetail to create the product and get the product instance
            $industry = $this->industryDetail->addIndustryDetail($validatedData, $imagePath);

            // Prepare product specification data
            $unitDetails = [
                'industry_detail_id' => $industry->id,
                'unit_name' => $request->input('unit_name'),
                'unit_contact_no' => $request->input('unit_contact_no'),
                'unit_address' => $request->input('unit_address'),

            ];

            // Process product specification data
            $this->unitDetail->addUnitData($unitDetails);


            // Optionally, redirect or return a response
            return redirect()->back()->with('success', 'Industries added successfully');
        } catch (\Exception $th) {
            Log::error("[BookController][addIndustryInBook] error " . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function userbookList(Request $request)
{
    $status = null;
    $message = null;
    $books = $this->book->all();
    return view('user.books-list', compact('status', 'message', 'books'));
}



}



