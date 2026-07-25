<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia, HasSlug;

    protected $guarded = [];

    public $translatable = [
        'name',
        'description',
        'client_needs',
        'working_process',
        'check_and_launch'
    ];

    protected $casts = [
        'client_needs' => 'array',
        'working_process' => 'array',
        'check_and_launch' => 'array',
        'project_date' => 'date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
