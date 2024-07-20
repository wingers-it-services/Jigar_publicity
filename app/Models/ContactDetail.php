<?php

namespace App\Models;

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
                // dd($contactDetails);
                // if (empty($contact)) {
                //     continue;
                // }

                $this->create([
                    'industry_id'  => $contactDetails['industry_id'],
                    'contact_name' => $contact,
                    'designation'  => $contactDetails['designation'][$key],
                    'mobile'       => $contactDetails['mobile'][$key],
                    'email_id'     => $contactDetails['email_id'][$key]
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('[ContactDetail1][addContacttData] Error creating contact detail: ' . $e->getMessage());
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
