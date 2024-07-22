<?php

namespace App\Models;

use App\Enums\DummyPasswordEnum;
use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $fillable = [
        'image',
        'name',
        'email',
        'password',
        'phone',
        'gender',
        'website',
        'company_name',
        'company_address',
        'no_of_device',
        'payment_status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function addUser(array $validatedData, $imagePath)
    {
        try {
            return $this->create([
                'name'           => $validatedData['name'],
                'email'          => $validatedData['email'],
                'password'       => Hash::make($validatedData['password']),
                'gender'         => $validatedData['gender'],
                'phone'          => $validatedData['phone'],
                'website'        => $validatedData['website'],
                'company_name'   => $validatedData['company_name'],
                'company_address' => $validatedData['company_address'],
                'no_of_device'   => $validatedData['no_of_device'],
                'image'          => $imagePath,
                'payment_status' => $validatedData['payment_status'] ?? PaymentStatus::PENDING,

            ]);
        } catch (Throwable $e) {
            Log::error('[User][addUser] Error adding user detail: ' . $e->getMessage());
        }
    }

    public function updateUser(array $validatedData, $uuid)
    {
        $userDetail = User::where('uuid', $uuid)->first();
        if (!$userDetail) {
            return redirect()->back()->with('error', 'user not found');
        }
        try {
            $updateData = [
                "name"           => $validatedData['name'],
                "email"          => $validatedData['email'],
                "phone"          => $validatedData['phone'],
                "gender"         => $validatedData['gender'],
                "website"        => $validatedData['website'],
                "company_name"   => $validatedData['company_name'],
                "company_address" => $validatedData['company_address'],
                "no_of_device"   => $validatedData['no_of_device'],
                "payment_status" => $validatedData['payment_status'],
            ];

            // Only update the password if it is not "**********"
            if ($validatedData['password'] !== DummyPasswordEnum::PAASWORD) {
                $updateData["password"] = Hash::make($validatedData['password']);
            }

            $userDetail->update($updateData);

            return $userDetail->save();
        } catch (Throwable $e) {
            Log::error('[User][updateUser] Error while updating user detail: ' . $e->getMessage());
        }
    }


    public function updateUserDetail(array $validatedData)
    {
        $userDetail = User::where('uuid', $validatedData['uuid'])->first();
        if (!$userDetail) {
            return redirect()->back()->with('error', 'user not found');
        }
        try {
            $userDetail->update([
                "name"           => $validatedData['name'],
                "phone"          => $validatedData['phone'],
                "gender"         => $validatedData['gender'],
                "website"        => $validatedData['website'],
                "company_name"   => $validatedData['company_name'],
                "company_address" => $validatedData['company_address']
            ]);

            return $userDetail->save();
        } catch (Throwable $e) {
            Log::error('[User][updateUserDetail] Error while updating user detail: ' . $e->getMessage());
        }
    }
}
