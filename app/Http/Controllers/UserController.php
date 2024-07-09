<?php

namespace App\Http\Controllers;

use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use App\Models\IndustryDetail;
use App\Models\ContactDetail;
use Exception;
use Throwable;

class UserController extends Controller
{
    use SessionTrait;
    protected $industrydetail;
    protected $contactDetail;

    public function __construct(
        IndustryDetail $industrydetail,
        ContactDetail $contactDetail
    ) {
        $this->industrydetail = $industrydetail;
        $this->contactDetail  = $contactDetail;
    }

    public function industryList(Request $request)
    {
        $status = null;
        $message = null;
        $industries = $this->industrydetail->with('contacts')->get();

        return view('user.industry-list', compact('status', 'message', 'industries'));
    }

    public function fetchIndustryDetailsById(Request $request, $uuid)
    {
        try {
            $industry = $this->industrydetail->where('uuid', $uuid)->with('contacts')->first();
            if (!$industry) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Industry not found',
                ]);
            }

            return response()->json([
                'status'     => 200,
                'message'    => 'Industry details fetched successfully',
                'industries' => $industry,
                'contacts'   => $industry->contacts
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
