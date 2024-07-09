<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class Area extends Model
{
    use SoftDeletes;
    protected $table = 'areas';

    protected $fillable = [
        'area_name'
    ];

    public function updateArea(array $validatedData, $uuid)
    {
        $userDetail = Area::where('uuid', $uuid)->first();
        if (!$userDetail) {
            return redirect()->back()->with('error', 'user not found');
        }
        try {
            $userDetail->update([
                "area_name"    => $validatedData['area_name'],
            ]);

            return $userDetail->save();

        } catch (Throwable $e) {
            Log::error('[Area][updateArea] Error while updating user detail: ' . $e->getMessage());
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
