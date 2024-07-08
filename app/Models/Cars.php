<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';
    protected $fillable = [
        'name',
        'year',
        'description'
    ];

    protected $casts = [
        'year' => 'integer'
    ];

    public function articles()
    {
        return $this->hasMany(Articles::class, 'car_id', 'id');
    }
}
