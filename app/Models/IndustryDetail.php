<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class IndustryDetail extends Model
{
    protected $fillable = [
        'advertisment_image',
        'category_id',
        'area_id',
        'industry_name',
        'contact_no',
        'address',
        'email',
        'product',
        'by_product',
        'raw_material'
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
    
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    

    public function addIndustryDetail(array $addindustry, $imagePath)
    {
        try {
            // Create the product
            return IndustryDetail::create([
                'image' => $imagePath,
                'category_id' => $addindustry['category_id'],
                'area_id' => $addindustry['area_id'],
                'industry_name' => $addindustry['industry_name'],
                'contact_no' => $addindustry['contact_no'],
                'address' => $addindustry['address'],
                'industry_email' => $addindustry['industry_email'],
                'product' => $addindustry['product'],
                'by_product' => $addindustry['by_product'],
                'raw_material' => $addindustry['raw_material'],

            ]);
        } catch (\Throwable $e) {
            Log::error('[IndustryDetail][addIndustryDetail] Error creating industry: ' . $e->getMessage());
            throw $e; // Re-throw the exception to see the full stack trace
        }
    }


}
