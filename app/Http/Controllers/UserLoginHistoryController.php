<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Advertisment;
use App\Models\UserLoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserLoginHistoryController extends Controller
{
    protected $userLoginHistory;

    public function __construct(UserLoginHistory $userLoginHistory)
    {
        $this->userLoginHistory = $userLoginHistory;
    }

    public function loginHistory()
    {
        $userId = auth()->user()->id;
        $userLoginHistorys = $this->userLoginHistory->where('user_id', $userId)->get();

        return view('user.user-login-history', compact('userLoginHistorys'));
    }

    public function userLoginHistoryById(int $userId)
    {
        try {
            $validatedData = $request->validate([
                'advertisment_image' => 'required|max:3602',
                'image_type' => 'required|in:horizontal,vertical'
            ]);

            if ($request->hasFile('advertisment_image')) {
                $advertismentImage = $request->file('advertisment_image');
                $imageType = $request->input('image_type');

                // Get image dimensions
                list($width, $height) = getimagesize($advertismentImage);

                // Define your criteria for horizontal and vertical images
                $isHorizontal = $width > $height;
                $isVertical = $height > $width;

                if (($imageType == 'horizontal' && !$isHorizontal) || ($imageType == 'vertical' && !$isVertical)) {
                    return redirect()->back()->with('error', 'Image dimensions do not match the selected type.');
                }

                $filename = time() . '_' . $advertismentImage->getClientOriginalName();
                $imagePath = 'advertisement_images/' . $filename;
                $advertismentImage->move(public_path('advertisement_images/'), $filename);

                $this->advertisment->create([
                    'advertisment_image' => $imagePath,
                    'image_type' => $imageType
                ]);
                return back()->with('status', 'success')->with('message', 'Advertisement added successfully');
                // return redirect()->back()->with('success', 'Advertisement added successfully.');
            } else {
                Log::error("[AdvertismentController][addAdvertisment] Error: Image file is null.");
                return redirect()->back()->with('error', 'Image file is required.');
            }
        } catch (\Throwable $th) {
            Log::error("[AdvertismentController][addAdvertisment] Error: " . $th->getMessage());
            // return redirect()->back()->with('error', $th->getMessage());
            return back()->with('status', 'error')->with('message', 'Advertisement Not Added');
        }
    }

    public function deleteAdvertisment($id)
    {
        $advertisment = $this->advertisment->where('id', $id)->firstOrFail();
        $advertisment->delete();
        // return redirect()->back()->with('success', 'Advertisment deleted successfully!');
        return back()->with('status', 'success')->with('message', 'Advertisment deleted successfully!');
    }
}
