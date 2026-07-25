<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Blog extends Model
{
    use HasTranslations, HasSlug;

    protected $guarded = [];

    public $translatable = [
        'main_title',
        'sub_title',
        'content',
        'author_name'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('main_title')
            ->saveSlugsTo('slug');
    }
}