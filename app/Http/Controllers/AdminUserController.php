<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Gym;
use App\Models\UserWorkout;
use App\Models\UserDiet;
use App\Models\UserBodyMeasurement;
use App\Models\userBmi;
use App\Models\GymStaff;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Traits\SessionTrait;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Log;
use Throwable;

class AdminUserController extends Controller
{
    use SessionTrait;
    protected $user;
    protected $gym;
    protected $userService;
    protected $workout;
    protected $diet;
    protected $userBodyMeasurement;
    protected $bmi;
    protected $gymStaff;

    public function __construct(
        AdminUser $user,
        Gym $gym,
        UserService $userService,
        UserWorkout $workout,
        UserDiet $diet,
        UserBodyMeasurement $userBodyMeasurement,
        userBmi $bmi,
        GymStaff $gymStaff
    ) {
        $this->user = $user;
        $this->gym = $gym;
        $this->userService = $userService;
        $this->workout = $workout;
        $this->diet = $diet;
        $this->userBodyMeasurement = $userBodyMeasurement;
        $this->bmi = $bmi;
        $this->gymStaff = $gymStaff;
    }

    public function showAddUsers()
    {
        return view('admin.add-user');
    }

    // public function addUserByadmin(Request $request)
    // {
    //     try {
    //         $validatedData = $request->validate([
    //             'gym_id' => 'nullable',
    //             'user_type' => 'required',
    //             'first_name' => 'required',
    //             'last_name' => 'required',
    //             'email' => 'required',
    //             'gender' => 'required',
    //             'phone_no' => 'required',
    //             'username' => 'required',
    //             'password' => 'required',
    //             'image' => 'required'
    //         ]);

    //         $imagePath = null;
    //         $data = $request->all();
    //         if ($request->hasFile('image')) {
    //             $imagePath = $this->userService->uploadUserProfileImage($request->file('image'));
    //         }

    //         if ($validatedData['user_type'] == \App\Enums\UserTypeEnum::HOMEUSER) {
    //             $validatedData['gym_id'] = 0;
    //         }

    //         $this->user->addUser($validatedData, $imagePath);

    //         return back()->with('status', 'success')->with('message', 'User Added Successfully');
    //     } catch (\Exception $e) {
    //         Log::error('[AdminUserController][addUserByadmin] Error adding user: ' . $e->getMessage());
    //         return back()->with('status', 'error')->with('message', 'User Not Added');
    //     }
    // }

    /**
     * The userList function retrieves all users and passes them to the admin user-list view.
     */
    public function userList()
    {
        $users = $this->user->all();
        return view('admin.user-list', compact('users'));
    }

    /**
     * The function `userPaymentList` retrieves all users and passes them to the 'admin.user-payment' view.
     */
    public function userPaymentList()
    {
        $users = $this->user->all();
        return view('admin.user-payment', compact('users'));
    }


    // public function viewEditUser($uuid)
    // {
    //     $user = $this->user->where('uuid', $uuid)->first();
    //     $gyms = $this->gym->get();
    //     $workouts = $this->workout->all();
    //     $diets = $this->diet->all();

    //     $gymId = $this->gym->where('uuid', $this->getGymSession()['uuid'])->first()->id;
    //     $userId = $user->id;
    //     $bmis = $this->bmi->where('user_id', $userId)->get();
    //     $trainers = $this->gymStaff->where('designation_id', "1")->get();
    //     $trainers = $this->gymStaff->where('gym_id', $gymId)->where('designation_id', "1")->get();
    //     return view('admin.adminUser.editAdminUser', compact('user', 'gyms', 'workouts', 'diets', 'bmis', 'trainers'));
    // }

    // /**
    //  * The function `updateAdminUser` in PHP updates an admin user's profile with validation, image
    //  * upload, and error handling.
    //  */
    // public function updateAdminUser(Request $request)
    // {
    //     try {

    //         $validatedData = $request->validate([
    //             'uuid' => 'required',
    //             'user_type' => 'required',
    //             'gym_id' => 'required',
    //             'first_name' => 'required',
    //             'last_name' => 'required',
    //             'email' => 'required',
    //             'gender' => 'required',
    //             'phone_no' => 'required',
    //             'username' => 'required',
    //             'password' => 'required',
    //             'image' => 'nullable'
    //         ]);


    //         $imagePath = null;
    //         if ($request->hasFile('image')) {
    //             $imagePath = $this->userService->uploadUserProfileImage($request->file('image'));
    //         }

    //         $isProfileUpdated = $this->user->updateUser($validatedData, $imagePath);



    //         if ($isProfileUpdated) {
    //             return redirect()->route('gymUserList')->with('status', 'success')->with('message', 'User updated successfully.');
    //         }
    //         return redirect()->back()->with('status', 'error')->with('message', 'error while updating user.');
    //     } catch (\Exception $e) {
    //         Log::error('[AdminUserController][updateAdminUser] Error updating user ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
    //         return redirect()->back()->with('status', 'error')->with('message', 'error while updating user.');
    //     }
    // }


    public function userLoginHistory(Request $request)
    {
        //     $agent = new Agent();
        // $dt = Carbon::now();

        // $device_name = '';
        // if ($agent->isDesktop()) {
        //     $device_name = 'desktop';
        // } elseif ($agent->isTablet()) {
        //     $device_name = 'tablet';
        // } elseif ($agent->isMobile()) {
        //     $device_name = 'mobile';
        // }




        //     dd(['device_name' => $device_name, 'tgl' => $dt->toDateString()]);
        $users = $this->user->all();
        return view('admin.login-history', compact('users'));
    }
}
