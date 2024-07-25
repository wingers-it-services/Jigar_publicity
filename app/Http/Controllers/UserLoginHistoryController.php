<?php

namespace App\Http\Controllers;

use App\Models\UserLoginHistory;

class UserLoginHistoryController extends Controller
{
    protected $userLoginHistory;

    public function __construct(UserLoginHistory $userLoginHistory)
    {
        $this->userLoginHistory = $userLoginHistory;
    }

    public function loginHistory()
    {
        $userId = auth()->user()->id;
        $userLoginHistorys = $this->userLoginHistory->where('user_id', $userId)->get();
        return view('user.user-login-history', compact('userLoginHistorys'));
    }
}
