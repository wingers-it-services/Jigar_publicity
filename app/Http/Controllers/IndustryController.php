<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\ContactDetail;
use App\Models\IndustriesCategorie;
use App\Models\Industry_Detail;
use App\Models\IndustryDetail;
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
    private $contactDetail;
    private $area;
    private $purchase;

    public function __construct(IndustriesCategorie $industriesCategorie, IndustryDetail $industryDetail, ContactDetail $contactDetail, UserPurchase $purchase, Area $area)
    {
        $this->industriesCategorie = $industriesCategorie;
        $this->industryDetail = $industryDetail;
        $this->contactDetail = $contactDetail;
        $this->purchase = $purchase;
        $this->area = $area;
    }

    public function industries()
    {
        $industryDetails = $this->industryDetail->all(); 
        $categorys = $this->industriesCategorie->all();
        $areas = $this->area->all();

        return view('admin.industries', compact('industryDetails', 'categorys', 'areas'));
    }

    public function viewAddIndustries()
    {
        $industryDetails = $this->industryDetail->all(); 
        $categorys = $this->industriesCategorie->all();
        $areas = $this->area->all();

        return view('admin.add-industries', compact('industryDetails', 'categorys', 'areas'));
    }

    public function checkCategoryId(Request $request)
    {
        $categoryId = $request->input('category_id');
        $exists = $this->industryDetail->where('category_id', $categoryId)->exists();

        return response()->json(['exists' => $exists]);
    }


    public function addIndustry(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'advertisment_image' => 'required',
                'category_id' => 'required',
                'area_id' => 'required',
                'industry_name' => 'required',
                'contact_no' => 'required',
                'address' => 'required',
                'email' => 'required',
                'product' => 'nullable',
                'by_product' => 'nullable',
                'raw_material' => 'nullable',

            ]);

            $imagePath = null;
            if ($request->hasFile('advertisment_image')) {
                $industryImage = $request->file('advertisment_image');
                $filename = time() . '_' . $industryImage->getClientOriginalName();
                $imagePath = 'advertisment_images/' . $filename;
                $industryImage->move(public_path('advertisment_images/'), $filename);
            }

            // Call addProductDetail to create the product and get the product instance
            $industry = $this->industryDetail->addIndustryDetail($validatedData, $imagePath);

            // Prepare product specification data
            $contactDetails = [
                'industry_id' => $industry->id,
                'contact_name' => $request->input('contact_name'),
                'mobile' => $request->input('mobile'),
                'email_id' => $request->input('email_id'),

            ];

            // Process product specification data
            $this->contactDetail->addContactData($contactDetails);


            // Optionally, redirect or return a response
            return redirect()->route("industries")->with('success', 'Industries added successfully');
        } catch (\Exception $th) {
            Log::error("[IndustryController][addIndustry] error " . $th->getMessage());
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
