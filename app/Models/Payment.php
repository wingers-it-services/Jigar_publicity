<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderId',
        'name',
        'email',
        'user_id',
        'mobile',
        'amount',
        'response_code',
        'merchantId',
        'transectionId',
        'providerReferenceId',
        'responseData',
        'invoice'
    ];

    public function newOrder(array $orderData)
    {
        return $this->create([
            "orderId"    => $orderData['orderId'],
            "user_id"    => $orderData['userId'],
            "name"       => $orderData['name'],
            "email"      => $orderData['email'],
            "mobile"     => $orderData['mobile'],
            "no_of_device" => $orderData['no_of_device'],
            "number_of_hours" => $orderData['number_of_hours'],
            "amount"=>$orderData['amount']
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
