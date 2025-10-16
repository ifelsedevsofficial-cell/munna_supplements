<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'address',
        'city',
        'phone_number',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
