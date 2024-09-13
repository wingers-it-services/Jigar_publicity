<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLoginHistory;
use Brick\Math\BigInteger;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

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
            $userAgent = $request->header('User-Agent');
            $loginHistory = $this->userLoginHistory
                ->where('user_agent', $userAgent)
                ->orderBy('created_at', 'desc')
                ->get();

            if (!$loginHistory->isEmpty()) {
                $currentLogin = $loginHistory->first();
                $currentLogin->increment('current_session_time', $request->input('current_session_time'));

                $totalTime = $this->calculateTotalTime($loginHistory);
                $this->user->where('id', auth()->id())->update(['total_time' => $totalTime]);
            } else Log::error('user login history is empty');
        } catch (Exception $e) {
            Log::error('[UserLoginHistoryController][storeSessionTimePweb] error while string session pent time on website : ' . $e->getMessage());
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
}
