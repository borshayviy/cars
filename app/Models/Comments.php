<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'text',
        'user_id',
        'like',
        'parent_id',
        'article_id'
    ];
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
