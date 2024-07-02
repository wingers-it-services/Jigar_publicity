<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Gym;
use App\Models\UserWorkout;
use App\Models\UserDiet;
use App\Models\User;
use App\Models\Book;
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
    protected $book;
    protected $gym;
    protected $userService;
    protected $workout;
    protected $diet;
    protected $userBodyMeasurement;
    protected $bmi;
    protected $gymStaff;

    public function __construct(
        User $user,
        Book $book,
        Gym $gym,
        UserService $userService,
        UserWorkout $workout,
        UserDiet $diet,
        UserBodyMeasurement $userBodyMeasurement,
        userBmi $bmi,
        GymStaff $gymStaff
    ) {
        $this->user = $user;
        $this->book = $book;
        $this->gym = $gym;
        $this->userService = $userService;
        $this->workout = $workout;
        $this->diet = $diet;
        $this->userBodyMeasurement = $userBodyMeasurement;
        $this->bmi = $bmi;
        $this->gymStaff = $gymStaff;
    }

    /**
     * The function `showAddUsers` returns a view for adding users in an admin panel.
     *
     * @return A view named 'admin.add-user' is being returned.
     */
    public function showAddUsers()
    {
        return view('admin.add-user');
    }

    /**
     * The function `addUserByadmin` in PHP validates and adds a new user with specified data, logging
     * any errors that occur.
     *
     * @param Request request The `addUserByadmin` function is used to add a new user by an admin. It
     * takes a `Request` object as a parameter, which contains the data submitted by the admin to create
     * a new user. The function then validates the input data, adds the user using the `addUser
     *
     * @return The function `addUserByadmin` is returning a success message "User Added Successfully" if
     * the user is added successfully, and an error message "User Not Added" if there is an exception
     * caught during the process of adding the user.
     */
    public function addUserByadmin(Request $request)
    {
        try {
             $request->validate([
                'image'=> 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'website' => 'required',
                'company_name' => 'required',
                'company_address' => 'required',
                'no_of_device' => 'required'
            ]);

            $validateData = $request->all();
            $imagePath = null;
            if ($request->hasFile('image')) {
                $userPhoto = $request->file('image');
                $filename = time() . '_' . $userPhoto->getClientOriginalName();
                $imagePath = 'user_images/' . $filename;
                $userPhoto->move(public_path('user_images/'), $filename);
            }
            // dd($imagePath);
            $this->user->addUser($validateData,$imagePath);

            return back()->with('status', 'success')->with('message', 'User Added Successfully');
        } catch (\Exception $e) {
            Log::error('[AdminUserController][addUserByadmin] Error adding user: ' . $e->getMessage());
            return back()->with('status', 'error')->with('message', 'User Not Added');
        }
    }

    /**
     * The userList function retrieves all users and passes them to the admin user-list view.
     */
    public function userList()
    {
        $users = $this->user->all();
        return view('admin.user-list', compact('users'));
    }

    /**
     * The function updateUser in PHP validates and updates user information, handling potential errors
     * and logging exceptions.
     *
     * @param Request request The `updateUser` function in the code snippet is a method that updates
     * user information based on the data provided in the request. Here's a breakdown of the function:
     *
     * @return The function `updateUser` is returning a redirect response. If the user update is
     * successful, it will redirect back with a success message "Subscription Updated Successfully". If
     * there is an error during the update process, it will redirect back with an error message "error
     * while updating profile". If an exception is caught during the process, it will log the error
     * message and redirect back with the error message from the
     */
    public function updateUser(Request $request)
    {
        // dd($request->all());
        try {
            $validatedData = $request->validate([
                "uuid" => 'required',
                "name" => 'required',
                "email" => 'required',
                "phone" => 'required',
                "gender" => 'required',
                "website" => 'required',
                "company_name" => 'required',
                "company_address" => 'required',
                "no_of_device" => 'required'
            ]);

            $uuid = $request->uuid;
            $updateUser = $this->user->updateUser($validatedData, $uuid);

            if ($updateUser) {
                return redirect()->back()->with("status", "success")->with("message", "Subscription Upated Succesfully");
            } else {

                return redirect()->back()->with('error', 'error while updating profile');
            }
        } catch (\Exception $th) {
            Log::error("[AdminUserController][updateUser] error " . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * The function deleteUser deletes a user based on their UUID and redirects back with a success
     * message.
     *
     * @param uuid The `uuid` parameter in the `deleteUser` function is used to uniquely identify the
     * user that needs to be deleted from the database. It is typically a Universally Unique Identifier
     * (UUID) assigned to each user record in the database to ensure a globally unique identifier for
     * the user.
     *
     * @return a redirect back to the previous page with a success message "User deleted
     * successfully!".
     */
    public function deleteUser($uuid)
    {
        $user = $this->user->where('uuid', $uuid)->firstOrFail();
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }


    /**
     * The function userPaymentList retrieves all users and passes them to the 'admin.user-payment' view.
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
    //  * The function updateAdminUser in PHP updates an admin user's profile with validation, image
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

    public function userDetails(string $uuid)
    {

        $users = $this->user->where('uuid',$uuid)->first();
        $userDetails = $this->user->where('uuid', $uuid)->get();
        $books = $this->book->all();
        return view('admin.user-details', compact('users','userDetails','books'));
    }
}
