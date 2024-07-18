<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLoginHistory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;

class AuthController extends Controller
{
    protected $user;
    protected $userLoginHistory;

    public function __construct(
        User $user,
        UserLoginHistory $userLoginHistory
    ) {
        $this->user = $user;
        $this->userLoginHistory = $userLoginHistory;
    }

    /**
     * The function userLogin in PHP validates user credentials, checks device limit, logs user login
     * details, and redirects to the user dashboard if authentication is successful.
     *
     * @param Request request The userLogin function you provided is responsible for handling user
     * login functionality. It first validates the email and password fields from the request. Then, it
     * attempts to find a user with the provided email address and checks if the password matches using
     * Hash::check.
     *
     * @return The userLogin function is returning different responses based on the conditions:
     */
    public function userLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');
            $user = $this->user->where('email', $request->email)->whereNot('is_admin', 1)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return back()->with('status', 'error')->with('message', 'The provided credentials do not match our records.');
            }

            if ($this->checkAllowUserTologin($user)) {
                return back()->with('status', 'error')->with('message', 'You reached max allowed device limit.');
            }

            if (auth()->check()) {
                if (auth()->user()->id == $user->id) {
                    $this->logUserLoginDetails($request);
                    return redirect()->route('industry-list');
                } else {
                    if (auth()->user()->is_admin == 1)
                        return back()->with('status', 'error')->with('message', 'This system is occupied by Admin Please login with Admin credentials');
                    else
                        return back()->with('status', 'error')->with('message', 'This system is occupied by user ' . auth()->user()->name . ' Please login with ' . auth()->user()->name);
                }
            } elseif (Auth::attempt($credentials)) {
                $user->active_device += 1;
                $user->save();

                $this->logUserLoginDetails($request);
                return redirect()->route('industry-list');
            }

            return back()->with('status', 'error')->with('message', 'The provided credentials do not match our records.');
        } catch (Exception $e) {
            Log::error('[AuthController][userLogin] Login error: ' . $e->getMessage());
            return back()->with('status', 'error')->with('message', 'An error occurred while trying to log in. Please try again later.');
        }
    }

    /**
     * The function logUserLoginDetails logs user login details including device type, IP address,
     * user agent, and geolocation information.
     *
     * @param Request request The logUserLoginDetails function is used to log details of a user's
     * login activity. Here's an explanation of the parameters used in the function:
     */
    private function logUserLoginDetails(Request $request)
    {
        $deviceType = $this->lockedUserDeviceDetails();
        $ipaddress = $this->getUserIp();
        $userBrowser = $request->header('User-Agent');
        $geo = $json = file_get_contents("http://ipinfo.io/150.129.113.19/geo");
        $json = json_decode($json, true);

        $this->userLoginHistory->create([
            'user_id' => auth()->user()->id,
            'device_type' => $deviceType,
            'ip_address' => $ipaddress,
            'user_agent' => $userBrowser,
            'json'     =>  $geo,
            'country'  => $json['country'],
            'region'   => $json['region'],
            'city'     => $json['city'],
        ]);
    }

    private function checkAllowUserTologin(User $user)
    {
        return $user->active_device >= $user->no_of_device;
    }

    /**
     * The function lockedUserDeviceDetails determines the type of device (desktop, tablet, mobile,
     * or unknown) based on the user agent.
     *
     * @return The function lockedUserDeviceDetails() returns the type of device based on the user
     * agent information. It returns 'desktop' if the user is using a desktop device, 'tablet' if the
     * user is using a tablet device, 'mobile' if the user is using a mobile device, and 'unknown' if
     * the device type cannot be determined or an exception occurs during the process.
     */
    public function lockedUserDeviceDetails()
    {
        $agent = new Agent();
        if ($agent->isDesktop()) {
            return 'desktop';
        } elseif ($agent->isTablet()) {
            return 'tablet';
        } elseif ($agent->isMobile()) {
            return 'mobile';
        }
        return 'unknown';
    }

    /**
     * The function getUserIp in PHP retrieves the user's IP address from various server variables.
     *
     * @return The function getUserIp() returns the IP address of the user. It checks various server
     * variables like HTTP_CLIENT_IP, HTTP_X_FORWARDED_FOR, HTTP_X_FORWARDED,
     * HTTP_FORWARDED_FOR, HTTP_FORWARDED, and REMOTE_ADDR to determine the user's IP address. If
     * none of these variables are set, it returns 'UNKNOWN'.
     */
    public function getUserIp()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
