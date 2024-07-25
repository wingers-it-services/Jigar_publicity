<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class SiteSettingController extends Controller
{
    protected $siteSetting;

    public function __construct(SiteSetting $siteSetting)
    {
        $this->siteSetting = $siteSetting;
    }

    public function viewSiteSetting()
    {
        $message = null;
        $status = null;
        $setting = $this->siteSetting->first();
        return view('admin.site-setting', compact('status', 'message', 'setting'));
    }

    public function updateSiteSetting(Request $request)
    {
        try {
            $siteSetting = (new SiteSetting())->addOrUpdateSiteSetting($request->all());
            return redirect()->back()->with('status','success')->with('message','Site setting created or updated successfully');
        } catch (\Throwable $e) {
            Log::error('[SiteSettingController][updateSiteSetting]Error creating or updating site setting'.$e->getMessage());
            return redirect()->back()->with('status','error')->with('message','Error creating or updating site setting');
        }
    }
}
