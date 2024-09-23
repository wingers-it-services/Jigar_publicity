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

    public function storeLocation(Request $request)
    {
        try {
            $request->validate([
                // 'history_id' => 'required|exists:user_login_history,id',
                'latitude'   => 'required|max:20',
                'longitude'  => 'required|max:20',
            ]);

            Log::info($request->all());
            return response()->json(
                [
                    'status'   => 200,
                    'message'  => 'Location added successfully',
                    'response' => $request->all()
                ],
                200,
            );
        } catch (Exception $e) {
            Log::error('[UserLoginHistoryController][storeLocation] error while strong user location : ' . $e->getMessage());
            return response()->json(
                [
                    'status'  => 500,
                    'message' => 'Error while getting location : ' . $e->getMessage()
                ],
                500,
            );
        }
    }
}
