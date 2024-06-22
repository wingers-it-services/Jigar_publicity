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
}
