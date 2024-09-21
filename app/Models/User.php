<?php

namespace App\Models;

use App\Enums\AccountStatusEnum;
use App\Enums\DummyPasswordEnum;
use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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
        'no_of_hour',
        'remaining_time',
        'payment_status',
        'account_status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function getImageAttribute()
    {
        $imagePath = $this->attributes['image'];
        $defaultImagePath = 'images/profile/17.jpg';
        $fullImagePath = $imagePath;  // Adjusted path

        // Check if the file exists in the public directory
        if ($imagePath && file_exists(public_path($fullImagePath))) {
            return asset($fullImagePath);
        }

        return asset($defaultImagePath);
    }

    public function addUser(array $validatedData, $imagePath)
    {
        try {
            return $this->create([
                'name'            => $validatedData['name'],
                'email'           => $validatedData['email'],
                'password'        => Hash::make($validatedData['password']),
                'gender'          => $validatedData['gender'],
                'phone'           => $validatedData['phone'],
                'website'         => $validatedData['website'],
                'company_name'    => $validatedData['company_name'],
                'company_address' => $validatedData['company_address'],
                'no_of_device'    => $validatedData['no_of_device'],
                'no_of_hour'      => $validatedData['no_of_hour'],
                'remaining_time'  => ($validatedData['no_of_hour'] ?? 0) * 60,
                'image'           => $imagePath,
                'payment_status'  => $validatedData['payment_status'] ?? PaymentStatus::PENDING,
                'account_status'  => $validatedData['account_status'] ?? AccountStatusEnum::PENDING,

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
                "name"            => $validatedData['name'],
                "email"           => $validatedData['email'],
                "phone"           => $validatedData['phone'],
                "gender"          => $validatedData['gender'],
                "website"         => $validatedData['website'],
                "company_name"    => $validatedData['company_name'],
                "company_address" => $validatedData['company_address'],
                "no_of_device"    => $validatedData['no_of_device'],
                "no_of_hour"      => $validatedData['no_of_hour'],
                "payment_status"  => $validatedData['payment_status'],
            ];

            // Only update the password if it is not "**********"
            if ($validatedData['password'] !== DummyPasswordEnum::PAASWORD) {
                $updateData["password"] = Hash::make($validatedData['password']);
            }

            // Only update remaining time if new hour option is selected
            if ($validatedData['no_of_hour'] != $userDetail->no_of_hour) {
                $updateData["remaining_time"] = ($validatedData['no_of_hour'] ?? 0) * 60;
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
