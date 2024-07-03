<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Gym;
use App\Models\UserWorkout;
use App\Models\UserDiet;
use App\Models\User;
use App\Models\UserPurchase;
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
    protected $userPurchase;
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
        UserPurchase $userPurchase,
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
        $this->userPurchase = $userPurchase;
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
                'image' => 'required',
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
            $this->user->addUser($validateData, $imagePath);

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

        $users = $this->user->where('uuid', $uuid)->first();
        $userDetails = $this->user->where('uuid', $uuid)->get();
        $books = $this->book->all();
        $userPurchases = $this->userPurchase->where('user_id', $uuid)->get();

        return view('admin.user-details', compact('users', 'userDetails', 'books','userPurchases'));
    }


    public function addUserPurchase(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'book_id' => 'required',
                'status' => 'required'
            ]);

            $validateData = $request->all();
            $this->userPurchase->userPurchase($validateData);

            return back()->with('status', 'success')->with('message', 'User Added Successfully');
        } catch (\Exception $e) {
            Log::error('[AdminUserController][addUserPurchase] Error adding userPurchase: ' . $e->getMessage());
            return back()->with('status', 'error')->with('message', 'UserPurchase Not Added');
        }
    }
}
