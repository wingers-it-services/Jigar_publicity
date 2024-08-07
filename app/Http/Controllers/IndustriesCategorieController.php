<?php

namespace App\Http\Controllers;

use App\Models\IndustriesCategorie;
use App\Models\IndustryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndustriesCategorieController extends Controller
{

    private $industriesCategorie;
    private $industries;

    public function __construct(
        IndustriesCategorie $industriesCategorie,
        IndustryDetail $industries
    ) {
        $this->industriesCategorie = $industriesCategorie;
        $this->industries = $industries;
    }

    public function industriesCategorieList()
    {
        $industriesCategorie = $this->industriesCategorie->all();

        return view('admin.industries-categorie-list', compact('industriesCategorie'));
    }

    public function createIndustriesCategories(Request $request)
    {
        $this->industriesCategorie->create([
            'category_name' => $request->category_name
        ]);
        return back()->with('status', 'success')->with('message', 'Category Added Succesfully');
    }

    public function updateCategory(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'uuid' => 'required',
                'category_name' => 'required'
            ]);
            $uuid = $request->uuid;
            $this->industriesCategorie->updateCategory($validatedData, $uuid);

            return redirect()->back()->with('status', 'success')->with('message', 'Category updated successfully.');
        } catch (\Exception $e) {
            Log::error('[IndustriesCategorieController][updateCategory] Error updating category. Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Error while updating category.');
        }
    }

    public function deleteIndustriesCategorie($uuid)
    {
        // Retrieve the category first
        $industriesCategorie = $this->industriesCategorie->where('uuid', $uuid)->firstOrFail();

        // Store the ID before deletion
        $industryCategoryId = $industriesCategorie->id;

        // Delete the category
        $industriesCategorie->delete();

       

        return redirect()->route('industriesCategorieList')->with('status', 'success')->with('message', 'Category deleted successfully!');
    }
}
