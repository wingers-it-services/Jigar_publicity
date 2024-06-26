<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class User extends Authenticatable
{

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'phone',
        'website',
        'company_name',
        'company_address',
        'no_of_device'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function trainerDetails()
    {
        // $trainer = GymStaff::
    }

    public function addUser(array $validatedData)
    {
        try {
            return $this->create([
                'username' => $validatedData['username'],
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'phone' => $validatedData['phone'],
                'website' => $validatedData['website'],
                'company_name' => $validatedData['company_name'],
                'company_address' => $validatedData['company_address'],
                'no_of_device' => $validatedData['no_of_device']
            ]);
        } catch (Throwable $e) {
            Log::error('[User][addUser] Error adding user detail: ' . $e->getMessage());
        }
    }

    public function updateUser(array $validatedData,$uuid)
    {
        $userDetail = User::where('uuid', $uuid)->first();
        if (!$userDetail) {
            return redirect()->back()->with('error', 'user not found');
        }
        try {
            $userDetail->update([
                "name"           => $validatedData['name'],
                "email"          => $validatedData['email'],
                "phone"          => $validatedData['phone'],
                "website"        => $validatedData['website'],
                "company_name"   => $validatedData['company_name'],
                "company_address"=> $validatedData['company_address'],
                "no_of_device"   => $validatedData['no_of_device']
            ]);

            return $userDetail->save();

        } catch (Throwable $e) {
            Log::error('[User][updateUser] Error while updating user detail: ' . $e->getMessage());
        }
    }
}
