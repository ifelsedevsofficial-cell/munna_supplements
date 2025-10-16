<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'payment_status',
        'payment_method',
        'transaction_image'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderDetail()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusBadgeClassAttribute()
    {
        return match ($this->status) {
            'pending'   => 'bg-warning',
            'delivered' => 'bg-success',
            'cancelled' => 'bg-danger',
            default     => 'bg-info',
        };
    }
}
