<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Package extends Model
{
    use HasTranslations, HasSlug;

    protected $guarded = [];

    public $translatable = [
        'name',
        'sub_name',
        'features'
    ];

    protected $casts = [
        'features' => 'array'
    ];

    public function prices()
    {
        return $this->hasMany(PackagePrice::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
