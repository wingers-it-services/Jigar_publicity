<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class UnitDetail extends Model
{
    protected $fillable = [
        'industry_detail_id',
        'unit_name',
        'unit_contact_no',
        'unit_address'
    ];

    public function addUnitData(array $unitDetails)
    {
        try {
            foreach ($unitDetails['unit_name'] as $key => $unit) {
                $this->create([
                    'industry_detail_id' => $unitDetails['industry_detail_id'],
                    'unit_name' => $unit,
                    'unit_contact_no' => $unitDetails['unit_contact_no'][$key],
                    'unit_address' => $unitDetails['unit_address'][$key],
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('[UnitDetail][addUnitData] Error creating unit detail: ' . $e->getMessage());
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
