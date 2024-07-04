<?php

namespace App\Http\Controllers;

use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use App\Models\IndustryDetail;
use Throwable;

class UserController extends Controller
{
    use SessionTrait;
    protected $industrydetail;

    public function __construct(IndustryDetail $industrydetail
    ) {
        $this-> industrydetail= $industrydetail;
    }

    public function industryList(Request $request)
    {
        $status = null;
        $message = null;
        $industries = $this-> industrydetail->all();
        return view('user.industry-list', compact('status', 'message','industries'));
    }
}
