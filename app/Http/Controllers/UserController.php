<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
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
    protected $advertisment;

    public function __construct(
        IndustryDetail $industrydetail,
        ContactDetail $contactDetail,
        Advertisment  $advertisment
    ) {
        $this->industrydetail = $industrydetail;
        $this->contactDetail  = $contactDetail;
        $this->advertisment   = $advertisment;
    }

    public function industryList(Request $request)
    {
        $status = null;
        $message = null;
        $industries = $this->industrydetail->with('contacts')->get();
        $advertisments = $this->advertisment->first();
        return view('user.industry-list', compact('status', 'message', 'industries','advertisments'));
    }

    public function fetchIndustryDetailsById(Request $request, $uuid)
    {
        try {
            $industry = $this->industrydetail->where('uuid', $uuid)->with('contacts','category','area')->first();
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
                'contacts'   => $industry->contacts,
                'categorys'  => $industry->category,
                'areas'  => $industry->area,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
