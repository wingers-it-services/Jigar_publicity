<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use App\Models\Area;
use App\Models\Gym;
use App\Models\IndustriesCategorie;
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
    protected $industriesCategory;
    protected $industryArea;

    public function __construct(
        User $user,
        IndustryDetail $industryDetail,
        IndustriesCategorie $industriesCategory,
        Area $industryArea,
        Advertisment $advertisment
    ) {
        $this->user = $user;
        $this->industryDetail = $industryDetail;
        $this->industriesCategory = $industriesCategory;
        $this->industryArea = $industryArea;
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
        $totalIndustryCategories = $this->industriesCategory->get()->count();
        $totalIndustrialAreas = $this->industryArea->get()->count();

        $paidStatus = $this->user->whereNot('is_admin', 1)->where('payment_status', 1)->get()->count();
        $pendingStatus = $this->user->whereNot('is_admin', 1)->where('payment_status', 0)->get()->count();

        return view('admin.dashboard', compact('totalIndustries', 'totalUsers', 'totalAds', 'totalIndustryCategories', 'totalIndustrialAreas', 'paidStatus', 'pendingStatus'));
    }

    public function viewAdminProfile()
    {
        $status = null;
        $message = null;
        $userDetail = $this->user->where('id', auth()->user()->id)->first();
        return view('admin.admin-profile', compact('status', 'message', 'userDetail'));
    }


    public function adminLogout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin-login')->with('status', 'success')->with('message', 'Logged out successfully.');
        } catch (Exception $e) {
            Log::error('[AdminController] [adminLogout] Error while logging in admin : ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
        }
    }

    public function getPaymentStatus(Request $request)
    {
        try {
            $paidCount = $this->user->whereNot('is_admin', 1)->where('payment_status', '1')->count();
            $pendingCount = $this->user->whereNot('is_admin', 1)->where('payment_status', '0')->count();

            $data = [
                'paid' => $paidCount,
                'pending' => $pendingCount
            ];

            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('[AdminUserController][getPaymentStatus] Error fetching payment status: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching payment status'], 500);
        }
    }
}
