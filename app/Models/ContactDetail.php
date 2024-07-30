<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Log;

class ContactDetail extends Model
{
    protected $fillable = [
        'industry_id',
        'contact_name',
        'designation',
        'mobile',
        'email_id'
    ];


    public function addContactData(array $contactDetails)
    {
        try {
            foreach ($contactDetails['contact_name'] as $key => $contact) {
                $this->create([
                    'industry_id'  => $contactDetails['industry_id'],
                    'contact_name' => $contact,
                    'designation'  => $contactDetails['designation'][$key],
                    'mobile'       => $contactDetails['mobile'][$key],
                    'email_id'     => $contactDetails['email_id'][$key]
                ]);
            }
            return [
                'status'  => 'success',
                'message' => 'Contact detsils updated succesfully.'
            ];
        } catch (Exception $e) {
            Log::error('[ContactDetail][addContacttData] Error creating contact detail: ' . $e->getMessage());
            return [
                'status'  => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function industry()
    {
        return $this->belongsTo(IndustryDetail::class, 'industry_id', 'id');
    }
}
