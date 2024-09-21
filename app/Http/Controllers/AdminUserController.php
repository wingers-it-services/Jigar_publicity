<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatusEnum;
use App\Models\Gym;
use App\Models\User;
use App\Models\UserLoginHistory;
use Illuminate\Http\Request;
use App\Traits\SessionTrait;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use SessionTrait;
    protected $user;
    protected $userHistory;

    public function __construct(
        User $user,
        UserLoginHistory $userHistory
    ) {
        $this->user = $user;
        $this->userHistory = $userHistory;
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
                'payment_status'  => 'required'
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
        $users = $this->user->whereNot('is_admin', 1)->get();
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
     * message and redirect back with the error message from theac
     */
    public function updateUser(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "uuid"             => 'required',
                "name"             => 'required',
                "email"            => 'required',
                "phone"            => 'required',
                "gender"           => 'required',
                "website"          => 'required',
                "company_name"     => 'required',
                "company_address"  => 'required',
                "no_of_device"     => 'required',
                "no_of_hour"       => 'required',
                "password"         => 'required',
                "payment_status"   => 'required'
            ]);

            $uuid = $request->uuid;
            $updateUser = $this->user->updateUser($validatedData, $uuid);

            if ($updateUser) {
                return redirect()->back()->with("status", "success")->with("message", "User UpDated Succesfully");
            } else {

                return redirect()->back()->with('error', 'error while updating profile');
            }
        } catch (\Exception $th) {
            Log::error("[AdminUserController][updateUser] error " . $th->getMessage());
            // return redirect()->back()->with('error', $th->getMessage());
            return redirect()->back()->with('error', 'error while updating profile');
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
        // return redirect()->back()->with('success', 'User deleted successfully!');
        return redirect()->back()->with("status", "success")->with("message", "User deleted successfully!");
    }


    /**
     * The function userPaymentList retrieves all users and passes them to the 'admin.user-payment' view.
     */
    public function userPaymentList(Request $request)
    {
        $userPayments = $this->user->whereNot('is_admin', 1)->get();

        return view('admin.user-payment', compact('userPayments'));
    }

    public function userLoginHistory()
    {
        $loginHistories = $this->userHistory->with('user:id,name,email,no_of_hour')->whereHas('user', function ($query) {
            $query->where('is_admin', '!=', 1);
        })->get();
        return view('admin.login-history', compact('loginHistories'));
    }


    public function userDetails(string $uuid)
    {
        $users = $this->user->where('uuid', $uuid)->first();
        $userDetails = $this->user->where('uuid', $uuid)->get();
        $userId = $users->id;
        $userLogins = $this->userHistory->where('user_id', $userId)->get();


        return view('admin.user-details', compact('users', 'userDetails', 'userLogins'));
    }


    public function addUserPurchase(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'status' => 'required'
            ]);

            $validateData = $request->all();

            return back()->with('status', 'success')->with('message', 'User Added Successfully');
        } catch (\Exception $e) {
            Log::error('[AdminUserController][addUserPurchase] Error adding userPurchase: ' . $e->getMessage());
            return back()->with('status', 'error')->with('message', 'UserPurchase Not Added');
        }
    }

    public function pendingUserList()
    {
        $users = $this->user->where('account_status', AccountStatusEnum::PENDING)->whereNot('is_admin', 1)->get();
        return view('admin.pending-user-list', compact('users'));
    }
}
