<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class IndustryDetail extends Model
{
    protected $fillable = [
        'image',
        'category_id',
        'industry_name',
        'contact_no',
        'address'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function units()
    {
        return $this->hasMany(UnitDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(IndustriesCategorie::class, 'category_id');
    }

    public function addIndustryDetail(array $addindustry, $imagePath)
    {
        try {
            // Create the product
            return IndustryDetail::create([
                'image' => $imagePath,
                'category_id' => $addindustry['category_id'],
                'industry_name' => $addindustry['industry_name'],
                'contact_no' => $addindustry['contact_no'],
                'address' => $addindustry['address'],
            ]);
        } catch (\Throwable $e) {
            Log::error('[IndustryDetail][addIndustryDetail] Error creating industry: ' . $e->getMessage());
            throw $e; // Re-throw the exception to see the full stack trace
        }
    }

   
}
