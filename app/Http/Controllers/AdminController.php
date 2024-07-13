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

        return redirect()->route('admin-dashboard')->with('status', 'success')->with('message', 'Gym profile updated succesfully.');
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    
}
