<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\GymSubscription;
use App\Models\IndustriesCategorie;
use App\Services\GymService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class IndustriesCategorieController extends Controller
{

    private $industriesCategorie;

    public function __construct(
        IndustriesCategorie $industriesCategorie
    ) {
        $this->industriesCategorie = $industriesCategorie;
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
                'category_name' => 'required' // Corrected the typo from 'caregory_name' to 'category_name'
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
        $industriesCategorie = $this->industriesCategorie->where('uuid', $uuid)->firstOrFail();
        $industriesCategorie->delete();
        return redirect()->route('industriesCategorieList')->with('success', 'Gym deleted successfully!');
    }


    // public function addTermsAndConditions(Request $request)
    // {
    //     try {
    //         Validator::make($request->all(), []);
    //         $data = $request->all();
    //         $this->gym->addTandC($data);
    //         return back()->with('status', 'success')->with('message', 'Gym terms and conditions added Succesfully');
    //     } catch (\Exception $e) {
    //         Log::error('[GymController][addTermsAndConditions]Error adding : ' . 'Request=' . $e->getMessage());
    //         return back()->with('status', 'error')->with('message', 'T&C Not Added ');
    //     }
    // }

    // public function addGymSocialLink(Request $request)
    // {
    //     try {
    //         Validator::make($request->all(), []);
    //         $data = $request->all();
    //         $this->gym->addSocialLink($data);
    //         return back()->with('status', 'success')->with('message', 'Gym terms and conditions added Succesfully');
    //     } catch (\Exception $e) {
    //         Log::error('[GymController][addGymSocialLink]Error adding : ' . 'Request=' . $e->getMessage());
    //         return back()->with('status', 'error')->with('message', 'T&C Not Added ');
    //     }
    // }
}
