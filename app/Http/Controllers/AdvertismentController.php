<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdvertismentController extends Controller
{
    protected $advertisment;

    public function __construct(Advertisment $advertisment)
    {
        $this->advertisment = $advertisment;
    }

    public function viewAdvertisment()
    {
        $status = null;
        $message = null;
        $advertisments = $this->advertisment->all();

        return view('admin.add-advertisment', compact('status', 'message', 'advertisments'));
    }

    public function addAdvertisment(Request $request)
    {


        try {
            $validatedData = $request->validate([
                "advertisment_image" => 'required',
            ]);

            $imagePath = null;
            if ($request->hasFile('advertisment_image')) {
                $subscriptionImage = $request->file('advertisment_image');
                $filename = time() . '_' . $subscriptionImage->getClientOriginalName();
                $imagePath = 'adversit_images/' . $filename;
                $subscriptionImage->move(public_path('adversit_images/'), $filename);
            }
             else {
                log::error("[AdvertismentController][addAdvertisment] error imagefile is null");
            }
            $this->advertisment->create([
                'advertisment_image' => $imagePath
            ]);

            return redirect()->back()->with('success', 'Advertisment Added successfully.');
        } catch (\Throwable $th) {
            Log::error("[AdvertismentController][addAdvertisment] error " . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function deleteAdvertisment($id)
    {
        $advertisment = $this->advertisment->where('id', $id)->firstOrFail();
        $advertisment->delete();
        return redirect()->back()->with('success', 'Advertisment deleted successfully!');
    }
}
