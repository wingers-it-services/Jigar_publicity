<?php

namespace App\Models;

use App\Enums\GymSubscriptionStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class IndustriesCategorie extends Model
{
    use SoftDeletes;

    protected $table = 'industries_categories';

    protected $fillable = [
        'category_name'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function updateCategory(array $validatedData, $uuid)
    {
        $userDetail = IndustriesCategorie::where('uuid', $uuid)->first();
        if (!$userDetail) {
            return redirect()->back()->with('error', 'user not found');
        }
        try {
            $userDetail->update([
                "category_name"           => $validatedData['category_name'],
            ]);

            return $userDetail->save();

        } catch (Throwable $e) {
            Log::error('[IndustriesCategorie][updateCategory] Error while updating user detail: ' . $e->getMessage());
        }
    }
}
