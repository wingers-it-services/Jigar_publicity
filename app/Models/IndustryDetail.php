<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class IndustryDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'advertisment_image',
        'category_id',
        'area_id',
        'industry_name',
        'contact_no',
        'industry_type',
        'address',
        'email',
        'product',
        'by_product',
        'raw_material',
        'web_link',
        'office_address'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function contacts()
    {
        return $this->hasMany(ContactDetail::class, 'industry_id');
    }

    public function categories()
    {
        return $this->belongsTo(IndustriesCategorie::class, 'category_id');
    }

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }


    public function addIndustryDetail(array $addindustry, $imagePath)
    {
        try {
            // Create the product
            return IndustryDetail::create([
                'advertisment_image' => $imagePath,
                'category_id'        => $addindustry['category_id'],
                'area_id'            => $addindustry['area_id'],
                'industry_name'      => $addindustry['industry_name'],
                'contact_no'         => $addindustry['contact_no'],
                'industry_type'      => $addindustry['industry_type'],
                'address'            => $addindustry['address'],
                'email'              => $addindustry['email'],
                'product'            => $addindustry['product'],
                'by_product'         => $addindustry['by_product'],
                'raw_material'       => $addindustry['raw_material'],
                'web_link'           => $addindustry['web_link'],
                'office_address'     => $addindustry['office_address']

            ]);
        } catch (\Throwable $e) {
            Log::error('[IndustryDetail][addIndustryDetail] Error creating industry: ' . $e->getMessage());
            throw $e; // Re-throw the exception to see the full stack trace
        }
    }
}
