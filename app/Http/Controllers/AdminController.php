<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use App\Models\Gym;
use App\Models\IndustryDetail;
use App\Traits\SessionTrait;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use SessionTrait;
    protected $user;
    protected $industryDetail;
    protected $advertisment;

    public function __construct(User $user, IndustryDetail $industryDetail, Advertisment $advertisment)
    {
        $this->user = $user;
        $this->industryDetail = $industryDetail;
        $this->advertisment = $advertisment;
    }
    public function adminLogin(Request $request)
    {
        try {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');
            $user = $this->user->where('is_admin', 1)->where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return back()->with('status', 'error')->with('message', 'The provided credentials do not match our records.');
            }

            if (Auth::attempt($credentials)) {
                return redirect()->route('admin-dashboard')->with('status', 'success')->with('message', 'Logged in succesfully.');
            }
            return redirect()->back()->with('status', 'error')->with('message', 'The provided credentials do not match our records.');
        } catch (Exception $e) {
            Log::error('Error while logging in admin : ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
        }
    }

    public function dashboard(Request $request)
    {
        $totalIndustries = $this->industryDetail->all()->count();
        $totalUsers = $this->user->whereNot('is_admin', 1)->get()->count();
        $totalAds = $this->advertisment->get()->count();

        return view('admin.dashboard', compact('totalIndustries', 'totalUsers', 'totalAds'));
    }
}
