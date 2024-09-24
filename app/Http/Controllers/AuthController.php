<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatusEnum;
use App\Enums\PaymentStatus;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\UserLoginHistory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

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
                'email'    => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');
            $user = $this->user->where('email', $request->email)
                ->whereNot('is_admin', 1)
                ->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return back()->with('status', 'error')->with('message', 'The provided credentials do not match our records.');
            }

            if ($user->account_status !== AccountStatusEnum::APPROVED) {
                return back()->with('status', 'error')->with('message', 'Your account is not approved.');
            }

            if ($this->checkAllowUserTologin($user)) {
                return back()->with('status', 'error')->with('message', 'You reached max allowed device limit.');
            }

            // Handle authenticated session
            if (auth()->check()) {
                $currentUser = auth()->user();

                $message = $currentUser->is_admin
                    ? 'This system is occupied by Admin. Please login with Admin credentials.'
                    : 'This system is occupied by user ' . $currentUser->name . '. Please login with ' . $currentUser->name;
            }

            // Attempt login if not authenticated
            if (Auth::attempt($credentials)) {
                if ($user->payment_status === PaymentStatus::PAID) {
                    // Store latitude and longitude in the user model
                    $user->latitude = $request->latitude;
                    $user->longitude = $request->longitude;
                    $user->save();
                    $this->logUserLoginDetails($request);

                    // increasing user active device user is being logged in
                    $user->active_device += 1;
                    $user->save();
                    $route = 'industry-list';
                } else {
                    $route = 'payment';
                }
            }
            return redirect()->route($route)->with('user', $user);
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
        $deviceType  = $this->lockedUserDeviceDetails();
        $ipaddress   = $this->getUserIp();
        $userBrowser = $request->header('User-Agent');

        // Get geo information from latitude and longitude instead of IP
        $geo = $this->getGeoInfoFromLatLng($request->latitude, $request->longitude);

        if ($geo) {
            $this->userLoginHistory->create([
                'user_id'     => auth()->user()->id,
                'device_type' => $deviceType,
                'ip_address'  => $ipaddress,
                'user_agent'  => $userBrowser,
                'json'        => json_encode($geo),
                'country'     => $geo['country'] ?? 'Unknown',
                'region'      => $geo['region'] ?? 'Unknown',
                'city'        => $geo['city'] ?? 'Unknown',
                'address'     => $geo['address'] ?? 'Unknown',
            ]);
        } else {
            Log::error('Geo information is not available for the provided latitude and longitude.');
        }
    }

    public function getUserIp()
    {
        try {
            $ipaddress = request()->ip();
        } catch (Exception $e) {
            Log::error('Error fetching IP address: ' . $e->getMessage());
            $ipaddress = '127.0.0.1';
        }

        return $ipaddress;
    }

    // Method to get geo info from latitude and longitude using an external geocoding service
    private function getGeoInfoFromLatLng($latitude, $longitude)
    {
        try {
            // Nominatim API URL for reverse geocoding
            $url = 'https://nominatim.openstreetmap.org/reverse';

            // Make an API request using Laravel's Http client
            $response = Http::get($url, [
                'lat'    => $latitude,
                'lon'    => $longitude,
                'format' => 'json'
            ]);
            // Check if the request was successful
            if ($response->successful()) {
                $geoData = $response->json();


                if (!empty($geoData)) {
                    // Extract the relevant information from the response
                    $geoInfo = [
                        'city'     => $geoData['address']['state_district'] ?? 'Unknown',
                        'country'  => $geoData['address']['country'] ?? 'Unknown',
                        'region'   => $geoData['address']['state'] ?? 'Unknown',
                        'address'  => $geoData['display_name'] ?? 'Unknown',
                    ];
                    return $geoInfo;
                }
            } else {
                Log::error('Error fetching geo info from lat/lng: HTTP request failed with status ' . $response->status());
            }
        } catch (Exception $e) {
            Log::error('Error fetching geo info from lat/lng: ' . $e->getMessage());
        }

        return null;
    }




    // Helper function to extract specific address components
    private function getAddressComponent($components, $type)
    {
        foreach ($components as $component) {
            if (in_array($type, $component['types'])) {
                return $component['long_name'];
            }
        }
        return null;
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
            return 'computer';
        } elseif ($agent->isTablet()) {
            return 'tablet';
        } elseif ($agent->isMobile()) {
            return 'mobile';
        }
        return 'unknown';
    }
}
