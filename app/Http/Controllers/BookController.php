<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\GymNotification;
use App\Models\IndustriesCategorie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class BookController extends Controller
{
    protected $notification;
    protected $book;
    private $industriesCategorie;

    public function __construct(GymNotification $notification, Book $book, IndustriesCategorie $industriesCategorie)
    {
        $this->notification = $notification;
        $this->book = $book;
        $this->industriesCategorie = $industriesCategorie;
    }

    public function bookList(Request $request)
    {
        $status = null;
        $message = null;
        $books = $this->book->all();

        return view('admin.books-list', compact('status', 'message','books'));
    }

    public function showAddBook(Request $request)
    {
        return view('admin.add-book');
    }

    public function bookDetails($uuid)
    {
        $bookDetails = $this->book->where('uuid',$uuid)->first();
        $industriesCategorie = $this->industriesCategorie->all();

        return view('admin.book-details', compact('bookDetails','industriesCategorie'));
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

            $uuid=$request->uuid;
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
}
