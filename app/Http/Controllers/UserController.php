<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use App\Models\IndustryDetail;
use App\Models\ContactDetail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use SessionTrait;
    protected $industrydetail;
    protected $contactDetail;
    protected $advertisment;
    protected $user;

    public function __construct(
        IndustryDetail $industrydetail,
        ContactDetail $contactDetail,
        Advertisment  $advertisment,
        User $user
    ) {
        $this->industrydetail = $industrydetail;
        $this->contactDetail  = $contactDetail;
        $this->advertisment   = $advertisment;
        $this->user = $user;
    }

    public function industryList(Request $request)
    {
        $status = null;
        $message = null;
        $industries = $this->industrydetail->with('contacts')->get();
        $imageType = $this->advertisment->image_type;
        $horImages = $this->advertisment->where('image_type', 'horizontal')->get();
        $verImages = $this->advertisment->where('image_type', 'vertical')->get();
        return view('user.industry-list', compact('status', 'message', 'industries', 'horImages', 'verImages'));
    }

    public function fetchIndustryDetailsById(Request $request, $uuid)
    {
        try {
            $industry = $this->industrydetail->where('uuid', $uuid)->with('contacts', 'category', 'area')->first();
            if (!$industry) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Industry not found',
                ]);
            }

            return response()->json([
                'status'     => 200,
                'message'    => 'Industry details fetched successfully',
                'industries' => $industry,
                'contacts'   => $industry->contacts,
                'categorys'  => $industry->category,
                'areas'  => $industry->area,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function viewAdvertisment()
    {
        $status = null;
        $message = null;
        $advertisments = $this->industrydetail->whereNotNull('advertisment_image')->get();
        return view('user.user-advertisement', compact('status', 'message', 'advertisments'));
    }

    public function viewUserProfile()
    {
        $status = null;
        $message = null;
        $userDetail = $this->user->where('id', auth()->user()->id)->first();
        $horImages = $this->advertisment->where('image_type', 'horizontal')->get();
        return view('user.user-profile', compact('status', 'message', 'userDetail', 'horImages'));
    }

    public function updateUserDetails(Request $request)
    {
        try {
            $request->validate([
                "name"            => 'required',
                "phone"           => 'required',
                "gender"          => 'required',
                "website"         => 'required',
                "company_name"    => 'required',
                "company_address" => 'required',
            ]);


            $user = $this->user->where('uuid', $request->uuid)->first();

            if ($request->hasFile('image')) {
                if ($user->image) {
                    $existingImagePath = public_path($user->image);
                    if (file_exists($existingImagePath)) {
                        unlink($existingImagePath);
                    }
                }
                $imagefile = $request->file('image');
                $filename = time() . '_' . $imagefile->getClientOriginalName();
                $imagePath = 'user_images/' . $filename;
                $imagefile->move(public_path('user_images/'), $filename);

                $user->update(['image' => $imagePath]);
            }

            $updateUser = $this->user->updateUserDetail($request->all());

            if ($updateUser) {
                return redirect()->back()->with("status", "success")->with("message", "User UpDated Succesfully");
            } else {

                return redirect()->back()->with('error', 'error while updating profile');
            }
        } catch (\Exception $th) {
            Log::error("[UserController][updateUserDetails] error " . $th->getMessage());
            // return redirect()->back()->with('error', $th->getMessage());
            return redirect()->back()->with('error', 'error while updating profile');
        }
    }

    public function fetchUserProfile()
    {
        $user = $this->user->findOrFail(auth()->user()->id);
        $user->profile_image_url = url('images/' . $user->image); 
        return response()->json($user);
    }

      public function viewUserRegister()
    {
        $status = null;
        $message = null;
        return view('user.user-register', compact('status', 'message'));
    }

    public function registerUser(Request $request){
        try {
            $request->validate([
                'image'           => 'required',
                'name'            => 'required',
                'email'           => 'required|unique:users,email',
                'password'        => 'required',
                'gender'          => 'required',
                'phone'           => 'required',
                'website'         => 'required',
                'company_name'    => 'required',
                'company_address' => 'required',
                'no_of_device'    => 'required',
            ]);

            $validateData = $request->all();
            $imagePath = null;
            if ($request->hasFile('image')) {
                $userPhoto = $request->file('image');
                $filename = time() . '_' . $userPhoto->getClientOriginalName();
                $imagePath = 'user_images/' . $filename;
                $userPhoto->move(public_path('user_images/'), $filename);
            }
            $this->user->addUser($validateData, $imagePath);

            return back()->with('status', 'success')->with('message', 'User Registered Successfully');
        } catch (\Exception $e) {
            Log::error('[UserController][registerUser] Error adding user: ' . $e->getMessage());
            return back()->with('status', 'error')->with('message', 'User Not Registered');
        }
    }

}
