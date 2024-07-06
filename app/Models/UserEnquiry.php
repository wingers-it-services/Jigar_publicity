<?php

namespace App\Models;

use App\Enums\EnquiryStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Throwable;

class UserEnquiry extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'subject',
        'inquiry',
        'status',
        'user_id',
    ];

    public function addEnquiry(array $validatedData)
{
    try {
        return $this->create([
            'subject'     => $validatedData['subject'],
            'inquiry'     => $validatedData['inquiry'],
            'status'      => $validatedData['status'],
            'user_id'     => $validatedData['user_id'],
            'attachment'  => $validatedData['attachments']
        ]);
    } catch (Throwable $e) {
        Log::error('[UserEnquiry][addEnquiry] Error adding Enquiry detail: ' . $e->getMessage());
        throw $e;  // Re-throw the exception after logging it
    }
}


    public function updateEnquiryStatus(array $validatedData, $uuid)
    {
        $gymEnquiry = UserEnquiry::where('uuid', $uuid)->first();
        try {
            $gymEnquiry->update([
                "status" =>  $validatedData['status']
            ]);
            return $gymEnquiry->save();
        } catch (Throwable $e) {
            Log::error('[GymCoupon][updateCoupon] Error while updating coupon detail: ' . $e->getMessage());
        }
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}
