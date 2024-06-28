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

    // public function updateUser(array $updateUser, $imagePath)
    // {

    //     // dd($updateUser);
    //     $uuid = $updateUser['uuid'];
    //     $userProfile = User::where('uuid', $uuid)->first();

    //     // Check if the user exists
    //     if (!$userProfile) {
    //         return redirect()->back()->with('error', 'User not found');
    //     }
    //     try {
    //         $userProfile->update([
    //             'first_name' => $updateUser['first_name'],
    //             'last_name' => $updateUser['last_name'],
    //             'email' => $updateUser['email'],
    //             'gender' => $updateUser['gender'],
    //             'phone_no' => $updateUser['phone_no'],
    //             'username' => $updateUser['username'],
    //             'password' => $updateUser['password'],
    //         ]);
    //         if (isset($imagePath)) {
    //             $userProfile->update([
    //                 'image' => $imagePath
    //             ]);
    //         }

    //         return $userProfile->save();
    //     } catch (Throwable $e) {
    //         Log::error('[Gym][updateUser] Error while updating user detail: ' . $e->getMessage());
    //     }
    // }
    // public function addTrainer(array $gymTrainer)
    // {
    //     $userId = $gymTrainer['user_id'];
    //     $trainerId = $gymTrainer['trainer_id'];
    //     $userProfile = User::find($userId);

    //     // Check if the user exists
    //     if (!$userProfile) {
    //         return redirect()->back()->with('error', 'User not found');
    //     }
    //     try {
    //         if ($trainerId == "0") {
    //             $trainerId = null;
    //         }

    //         $userProfile->update([
    //             'trainer_id' => $trainerId
    //         ]);
    //         return $userProfile->save();
    //     } catch (Throwable $e) {
    //         Log::error('[Gym][addTrainer] Error while alloting Trainer detail: ' . $e->getMessage());
    //     }
    // }
}