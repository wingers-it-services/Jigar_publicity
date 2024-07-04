<?php

namespace App\Http\Controllers;

use App\Models\GymNotification;
use App\Models\IndustriesCategorie;
use App\Models\Industry_Detail;
use App\Models\IndustryDetail;
use App\Models\UnitDetail;
use App\Models\UserPurchase;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class IndustryController extends Controller
{
    protected $notification;
    private $industriesCategorie;
    private $industryDetail;
    private $unitDetail;
    private $purchase;

    public function __construct(IndustriesCategorie $industriesCategorie, IndustryDetail $industryDetail, UnitDetail $unitDetail, UserPurchase $purchase)
    {
        $this->industriesCategorie = $industriesCategorie;
        $this->industryDetail = $industryDetail;
        $this->unitDetail = $unitDetail;
        $this->purchase = $purchase;
    }

   

    

    public function industries()
    {
        $industryDetails = $this->industryDetail->all(); 
        $categorys = $this->industriesCategorie->all();

        return view('admin.industries', compact('industryDetails', 'categorys'));
    }

   

   

   

    public function checkCategoryId(Request $request)
    {
        $categoryId = $request->input('category_id');
        $exists = $this->industryDetail->where('category_id', $categoryId)->exists();

        return response()->json(['exists' => $exists]);
    }


    public function addIndustryInBook(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'image' => 'required',
                'category_id' => 'required',
                'industry_name' => 'required',
                'contact_no' => 'required',
                'address' => 'required',
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
            Log::error("[IndustryController][addIndustryInBook] error " . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function userbookList(Request $request)
    {
        $status = null;
        $message = null;
        
        return view('user.books-list', compact('status', 'message'));
    }
}
