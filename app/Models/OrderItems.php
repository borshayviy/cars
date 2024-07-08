<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        'car_id',
        'order_id',
        'qty',
        'total'
    ];

    public function order()
    {
        return $this->hasOne(Orders::class, 'id', 'order_id');

    }

    public function car()
    {
        return  $this->hasOne(Cars::class, 'id', 'car_id');
    }
}
