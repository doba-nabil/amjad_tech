<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasTranslations, HasSlug;

    protected $guarded = [];

    public $translatable = [
        'name',
        'description'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
