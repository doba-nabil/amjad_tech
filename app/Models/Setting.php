<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = [
        'site_name',
        'meta_title',
        'meta_description',
        'address'
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'social_media' => 'array'
    ];
}
