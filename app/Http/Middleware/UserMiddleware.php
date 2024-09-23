<?php

namespace App\Http\Middleware;

use App\Enums\PaymentStatus;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\UserLoginHistory;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\returnValue;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_admin == 0) {
            if (!$this->isPaymentDone()) {
                $settings = SiteSetting::first();
                if ($settings && $settings->payment_gateway_allow) {
                    Auth::logout();
                    return redirect()->route('login')->with('status', 'error')->with('message', 'Please complete the payment process before going ahead.');
                } else {
                    return redirect()->route('login')->with('status', 'error')->with('message', 'Payment not done.\nContact admin for payment');
                }
            }
            $response = $this->checkAndCreateCookie($request, $next);
            return $response;
        } else
            return redirect()->back()->with('status', 'error')->with('message', 'You are not authorized user.\nLogin with your credentials');
    }

    private function checkAndCreateCookie(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Check if the user is logged in
        if ($user) {
            // Check if remaining_time is 0 or less
            if ($user->remaining_time <= 0) {
                // Log out the user
                Auth::logout();

                // Redirect to the home page
                return redirect('/')->with('status', 'error')->with('message', 'Your Subscription time is expired');
            }

            // Check if the 'session_time' cookie exists
            if (!$request->cookie('session_time')) {
                $cookie = cookie('session_time', now(), 5);
                $user->remaining_time -= 5;
                $user->save();
                $this->increaseLoginTime($user, 5);
                // Create the cookie and return the response
                return $next($request)->withCookie($cookie);
            }
        }

        return $next($request); // Proceed if no user is logged in or cookie already exists
    }

    private function isPaymentDone(): bool
    {
        return Auth::user()->payment_status === PaymentStatus::PAID;
    }

    public function increaseLoginTime(User $user, $minutes)
    {
        try {
            $loginHistory = UserLoginHistory::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->first();

            if ($loginHistory) {
                $loginHistory->current_session_time += $minutes;
                $loginHistory->save();
            }
        } catch (Exception $e) {
            Log::error('[UserMiddleware][increaseLoginTime] error while increasing current session time : ' . $e->getMessage());
        }
    }
}
