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

    public function getAdvertismentImageAttribute()
    {
        $imagePath = $this->attributes['advertisment_image']; // Use the attributes array to access model properties
        $defaultImagePath = 'images/advertisement.jpg';

        // Construct the full image path
        $fullImagePath = 'advertisment_images/' . $imagePath;  // Adjust path based on where images are stored

        // Check if the file exists in the public directory
        if ($imagePath && file_exists(public_path($fullImagePath))) {
            return asset($fullImagePath);
        }

        return asset($defaultImagePath);
    }
}
