<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLoginHistory;
use Brick\Math\BigInteger;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class UserLoginHistoryController extends Controller
{
    protected $userLoginHistory;
    protected $user;

    public function __construct(UserLoginHistory $userLoginHistory, User $user)
    {
        $this->userLoginHistory = $userLoginHistory;
        $this->user = $user;
    }

    public function loginHistory()
    {
        $userId = auth()->user()->id;
        $userLoginHistorys = $this->userLoginHistory->where('user_id', $userId)->get();
        return view('user.user-login-history', compact('userLoginHistorys'));
    }


    public function storeSessionTime(Request $request)
    {
        try {
            $user = auth()->user();
            $userAgent = $request->header('User-Agent');
            $loginHistory = $this->userLoginHistory
                ->where('user_agent', $userAgent)
                ->orderBy('created_at', 'desc')
                ->get();

            if (!$loginHistory->isEmpty()) {
                $currentLogin = $loginHistory->first();
                $currentLogin->increment('current_session_time', $request->input('current_session_time'));

                $totalTime = $this->calculateTotalTime($loginHistory);
                $this->user->where('id',   $user->id)->update(['total_time' => $totalTime]);
            } else Log::error('user login history is empty');

            if ($this->isSubscriptionTimeExpired($user)) {
                Auth::logout(); // Log out the user
                return redirect('/')->with('status', 'error')->with('message', 'Ypur subscription time is expired'); // Redirect to the login page
            }
        } catch (Exception $e) {
            Log::error('[UserLoginHistoryController][storeSessionTime] error while storing time spent on website : ' . $e->getMessage());
        }
    }

    private function calculateTotalTime($loginHistory): BigInteger
    {
        $totalTime = BigInteger::zero();

        foreach ($loginHistory as $entry) {
            if (isset($entry['current_session_time']) && is_numeric($entry['current_session_time'])) {
                $totalTime = $totalTime->plus(BigInteger::of($entry['current_session_time']));
            }
        }
        return $totalTime;
    }
    private function isSubscriptionTimeExpired(User $user): bool
    {
        $userSubscriptionTime = $user->no_of_hour * 60 * 60;  // seconds = hour * minutes * secs
        return $user->total_time > $userSubscriptionTime;
    }

    // FUNCTION TO CLEAR ALL SESSSION OF PROVIDED USER'S ID
    // private function logOutUser(User $user)
    // {
    //     Log::info('[logOutUser] user');
    //     Log::info($user);

    //     // Get all session files
    //     $sessionFiles = Storage::files('framework/sessions');

    //     // Iterate through each session file
    //     foreach ($sessionFiles as $file) {
    //         // Skip the .gitignore file if it exists
    //         if (basename($file) === '.gitignore') {
    //             continue;
    //         }

    //         // Get the file contents
    //         $sessionData = Storage::get($file);

    //         // Unserialize session data
    //         $session = unserialize($sessionData);
    //         Log::info('session log');
    //         Log::info($session);

    //         // Check if session contains user-specific data
    //         foreach ($session as $key => $value) {
    //             if (strpos($key, 'login_web_') === 0) {
    //                 // Assuming the user ID or some user-specific data is stored here
    //                 if ($value == $user->id) {
    //                     // Delete the session file
    //                     Storage::delete($file);
    //                     // Optionally, invalidate the session and regenerate token
    //                     Session::invalidate();
    //                     Session::regenerateToken();
    //                     break 2; // Exit both loops after deleting the relevant session
    //                 }
    //             }
    //         }
    //     }
    // }
}
