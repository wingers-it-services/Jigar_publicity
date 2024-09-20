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
        $userLoginHistorys = $this->userLoginHistory
            ->with(['user:id,no_of_hour'])
            ->where('user_id', $userId)
            ->get();
        return view('user.user-login-history', compact('userLoginHistorys'));
    }
}
