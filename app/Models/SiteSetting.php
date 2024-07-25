<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'one_device_per_hour',
        'two_device_per_hour',
        'three_device_per_hour',
        'four_device_per_hour',
        'five_device_per_hour',
        'six_device_per_hour',
        'seven_device_per_hour',
        'eight_device_per_hour',
        'nine_device_per_hour',
        'ten_device_per_hour'
    ];
    public function addOrUpdateSiteSetting(array $siteSetting)
    {
        try {
            // Update or create the record with a fixed ID (e.g., 1)
            return $this->updateOrCreate(
                ['id' => 1], // Unique condition for a single record
                [
                    'one_device_per_hour' => $siteSetting['one_device_per_hour'],
                    'two_device_per_hour' => $siteSetting['two_device_per_hour'],
                    'three_device_per_hour' => $siteSetting['three_device_per_hour'],
                    'four_device_per_hour' => $siteSetting['four_device_per_hour'],
                    'five_device_per_hour' => $siteSetting['five_device_per_hour'],
                    'six_device_per_hour' => $siteSetting['six_device_per_hour'],
                    'seven_device_per_hour' => $siteSetting['seven_device_per_hour'],
                    'eight_device_per_hour' => $siteSetting['eight_device_per_hour'],
                    'nine_device_per_hour' => $siteSetting['nine_device_per_hour'],
                    'ten_device_per_hour' => $siteSetting['ten_device_per_hour'],
                ]
            );
        } catch (\Throwable $e) {
            Log::error('[SiteSetting][addOrUpdateSiteSetting] Error adding or updating detail: ' . $e->getMessage());
            // Optionally, you can throw the exception or handle it as needed
            throw $e;
        }
    }

}
