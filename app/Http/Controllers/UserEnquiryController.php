<?php

namespace App\Http\Controllers;
use App\Models\UserEnquiry;
use App\Traits\SessionTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Throwable;

class UserEnquiryController extends Controller
{

    use SessionTrait;
    protected $userEnquiry;
    protected $gym;

    public function __construct(UserEnquiry $userEnquiry)
    {
        $this->userEnquiry = $userEnquiry;
    }

    public function addEnquiry(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'subject'     => 'required',
            'inquiry'     => 'required',
            'status'      => 'required',
            'user_id'     => 'required',
            'attachment.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'  // Adjust validation rules as needed
        ]);

        // Collect validated data
        $validatedData = $request->all();
        $attachments = [];

        // Handle file attachments
        if ($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'user_attachment/' . $filename;
                $file->move(public_path('user_attachment/'), $filename);
                $attachments[] = $filePath;
            }
        }

        // Add the attachments to the validated data
        $validatedData['attachments'] = json_encode($attachments);

        // Save the enquiry
        $this->userEnquiry->addEnquiry($validatedData);

        return back()->with('status', 'success')->with('message', 'UserEnquiry Added Successfully');
    } catch (\Exception $e) {
        Log::error('[UserEnquiryController][addEnquiry] Error adding userEnquiry: ' . $e->getMessage());
        return back()->with('status', 'error')->with('message', 'UserEnquiry Not Added');
    }
}


    public function viewAdminEnquiry(Request $request, $uuid)
    {
        // $uuid = $request->input('uuid');
        $enquiryDetails = $this->userEnquiry->where('uuid', $uuid)->first();
        return view('admin.viewEnquiry', compact('enquiryDetails'));
    }

    public function updateStatus(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "uuid" => 'required',
                "status" => 'required',
            ]);
            $uuid=$request->uuid;

            $this->userEnquiry->updateEnquiryStatus($validatedData, $uuid);
            return redirect()->route('listEnquiry')->with('status', 'success')->with('message', 'coupon Updated successfully.');
        } catch (Throwable $th) {
            Log::error("[AdminEnquiryController][updateStatus] error " . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }

    }


}
