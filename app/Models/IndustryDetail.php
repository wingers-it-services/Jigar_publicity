<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Throwable;

class IndustryDetail extends Model
{
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
        'raw_material'
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
                'advertisment_image' => $imagePath,
                'category_id' => $addindustry['category_id'],
                'area_id' => $addindustry['area_id'],
                'industry_name' => $addindustry['industry_name'],
                'contact_no' => $addindustry['contact_no'],
                'industry_type' => $addindustry['industry_type'],
                'address' => $addindustry['address'],
                'email' => $addindustry['email'],
                'product' => $addindustry['product'],
                'by_product' => $addindustry['by_product'],
                'raw_material' => $addindustry['raw_material'],

            ]);
        } catch (\Throwable $e) {
            Log::error('[IndustryDetail][addIndustryDetail] Error creating industry: ' . $e->getMessage());
            throw $e; // Re-throw the exception to see the full stack trace
        }
    }

    public function contacts()
    {
        return $this->hasMany(ContactDetail::class, 'industry_id','id'); // Make sure 'industry_id' is the correct foreign key
    }

    // public function updateIndustryDetails(array $validatedData,$uuid,$imagePath)
    // {
    //     $industryDetail = IndustryDetail::where('uuid', $uuid)->first();
    //     if (!$industryDetail) {
    //         return redirect()->back()->with('error', 'user not found');
    //     }
    //     try {
    //         $industryDetail->update([
    //             "category_id"           => $validatedData['category_id'],
    //             "area_id"          => $validatedData['area_id'],
    //             "industry_name"          => $validatedData['industry_name'],
    //             "contact_no"         => $validatedData['contact_no'],
    //             "industry_type"        => $validatedData['industry_type'],
    //             "address"   => $validatedData['address'],
    //             "email"=> $validatedData['email'],
    //             "product"   => $validatedData['product'],
    //             "by_product"=> $validatedData['by_product'],
    //             "raw_material"   => $validatedData['raw_material']
    //         ]);

    //          // Update the image path if provided
    //          if ($imagePath) {
    //             $industryDetail->advertisment_image = $imagePath;
    //         }

    //         return $industryDetail->save();

    //     } catch (Throwable $e) {
    //         Log::error('[IndustryDetail][updateIndustryDetails] Error while updating user detail: ' . $e->getMessage());
    //     }
    // }


}
