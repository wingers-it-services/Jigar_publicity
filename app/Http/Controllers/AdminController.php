<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use SessionTrait;

    public function adminLogin(Request $request)
    {

        // $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // dd( $auth);
        // // Authenticate the user
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     // Store the user's IP address and browser information
        //     $user = Auth::user();
        //     $user->last_login_ip = $request->ip();
        //     $user->last_login_browser = $request->header('User-Agent');
        //     $user->save();

        //     // Store the IP address and browser information in the session
        //     $request->session()->put('last_login_ip', $request->ip());
        //     $request->session()->put('last_login_browser', $request->header('User-Agent'));

        //     // Redirect to the dashboard
        //     // return redirect()->intended('dashboard');
        // }
        return redirect()->route('admin-dashboard')->with('status', 'success')->with('message', 'Gym profile updated succesfully.');
    }

    // In your LoginController
    public function authenticate(Request $request)
    {
    }

    // Create a custom middleware to check the user's IP address and browser information
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('last_login_ip') || !$request->session()->has('last_login_browser')) {
            // If the session data is missing, redirect to the login page
            return redirect()->route('login');
        }

        $user = Auth::user();
        if ($request->ip() !== $user->last_login_ip || $request->header('User-Agent') !== $user->last_login_browser) {
            // If the IP address or browser information doesn't match, redirect to the login page
            return redirect()->route('login');
        }

        // If everything checks out, allow the request to proceed
        return $next($request);
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }
    public function showClubInfo()
    {
        return view('GymOwner.clubInfo');
    }

    public function showPackages()
    {
        return view('GymOwner.packages');
    }

    public function showPersonalTraining()
    {
        return view('GymOwner.personalTraining');
    }

    public function showNews()
    {
        return view('GymOwner.news');
    }

    public function showAddNews()
    {
        return view('GymOwner.addNews');
    }

    public function showEventItems()
    {
        return view('GymOwner.eventItem');
    }

    public function showEventLists()
    {
        return view('GymOwner.eventsList');
    }

    // public function showCourseSchedule()
    // {
    //     return view('GymOwner.courseSchedule');
    // }

    // public function showCourses()
    // {
    //     return view('GymOwner.courses');
    // }

    // public function showTrainers()
    // {
    //     return view('GymOwner.trainers');
    // }

    // public function showRooms()
    // {
    //     return view('GymOwner.rooms');
    // }

    public function showAddUsers()
    {
        return view('GymOwner.User.addUsers');
    }

    public function showUserPayment()
    {
        return view('GymOwner.userPayment');
    }
}
