<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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

            // Call the function to check and create the session_time cookie if needed
            $response = $this->checkAndCreateCookie($request, $next);

            return $response;
        }

        return redirect('/')->with('status', 'error')->with('message', 'Not a valid user');
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

                // Reduce remaining_time by the specified number of seconds
                $user->remaining_time -= 300;

                // Save the updated value to the database
                $user->save();
                // Create the cookie and return the response
                return $next($request)->withCookie($cookie);
            }
        }

        return $next($request); // Proceed if no user is logged in or cookie already exists
    }
}
