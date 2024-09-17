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
        // Check if the 'session_time' cookie exists
        if (!$request->cookie('session_time')) {
            $cookie = cookie('session_time', now(), 5);
            $user = Auth::user();

            // Reduce remaining_time by the specified number of seconds
            $user->remaining_time -= 300;

            // Save the updated value to the database
            $user->save();
            return $next($request)->withCookie($cookie);
        }

        return $next($request); // Proceed if the cookie already exists
    }
}
