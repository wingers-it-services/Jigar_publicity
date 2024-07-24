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
            "amount"     => $orderData['totalprice'],
        ]);
    }
}
