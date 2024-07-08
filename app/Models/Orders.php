<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total_year',
        'wallet',
        'qty'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}
