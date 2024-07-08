<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Token;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Articles extends Model
{
    use HasSlug;
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'body',
        'slug',
        'like',
        'image',
        'view_count',
        'car_id',
        'category_id'
    ];
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function car()
    {
        return $this->hasOne(Cars::class,'id', 'car_id');
    }
    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comments::class, 'article_id', 'id');
    }
}
