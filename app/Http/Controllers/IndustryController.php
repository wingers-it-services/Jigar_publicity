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

    public function viewUpdateIndustries($uuid)
    {
        $industryDetails = $this->industryDetail->where('uuid', $uuid)->first();
        $industryId = $industryDetails->id;
        $contacts = $this->contactDetail->where('industry_id', $industryId)->get();
        $categorys = $this->industriesCategorie->all();
        $areas = $this->area->all();

        return view('admin.update-industries', compact('industryDetails', 'categorys', 'areas', 'contacts'));
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
                'industry_type' => 'required',
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

    public function updateIndustry(Request $request, string $uuid)
    {
        try {
            $industry = $this->industryDetail->where('uuid', $uuid)->first();
            
            $industryData = [
                'category_id' => $request->input('category_id'),
                'area_id' => $request->input('area_id'),
                'industry_name' => $request->input('industry_name'),
                'contact_no' => $request->input('contact_no'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'industry_type' => $request->input('industry_type'),
                'product' => $request->input('product'),
                'by_product' => $request->input('by_product'),
                'raw_material' => $request->input('raw_material'),

            ];
            // Handle image upload
            if ($request->hasFile('advertisment_image')) {
                $industryImage = $request->file('advertisment_image');
                $filename = time() . '_' . $industryImage->getClientOriginalName();
                $imagePath = 'advertisment_images/' . $filename;
                $industryImage->move(public_path('advertisment_images/'), $filename);

                // Add the new image path to the industry data
                $industryData['advertisment_image'] = $imagePath;

                // Optionally, delete the old image if it exists
                if ($industry->advertisment_image) {
                    $oldImagePath = public_path($industry->advertisment_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $industry->update($industryData);

            // Loop through the specifications
            foreach ($request->input('contact_name') as $index => $contact_name) {
                // Prepare specification data
                $contactData = [
                    'contact_name' => $contact_name,
                    'mobile' => $request->input('mobile')[$index],
                    'email_id' => $request->input('email_id')[$index],
                ];

                // Update or create the specification
                $industry->contacts()->updateOrCreate(
                    ['contact_name' => $contact_name],
                    $contactData
                );
            }
            // Redirect with success message
            return redirect()->back()->with('status', 'success')->with('message', 'Industry updated successfully.');
        } catch (\Exception $th) {
            Log::error("[IndustryController][updateIndustry] error " . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function deleteContacts($id)
    {
        $this->contactDetail->findOrFail($id)->delete();
    }

    public function deleteIndustries($id)
    {
        $deleteIndustry = $this->industryDetail->where('id', $id)->firstOrFail();
        $deleteIndustry->delete();
        $deleteContact = $this->contactDetail->where('industry_id', $id)->firstOrFail();
        $deleteContact->delete();

        return redirect()->back()->with('success', 'Industry deleted successfully!');
    }

    public function userbookList(Request $request)
    {
        $status = null;
        $message = null;

        return view('user.books-list', compact('status', 'message'));
    }
}
