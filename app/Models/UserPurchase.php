<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class UserPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function userPurchase(array $validatedData)
    {
        try {
            return $this->create([
                'user_id'           => $validatedData['user_id'],
                'status'       => $validatedData['status']
            ]);
        } catch (Throwable $e) {
            Log::error('[UserPurchase][userPurchase] Error adding userPurchase detail: ' . $e->getMessage());
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
