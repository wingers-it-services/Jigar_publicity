<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\AdminAdvertismentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class Advertisment extends Model
{
    protected $fillable = [
        'advertisment_image',
        'image_type'
    ];
}
