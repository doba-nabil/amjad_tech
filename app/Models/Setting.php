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
        'address',
        'home_blog_title',
        'home_blog_subtitle',
        'home_blog_text',
        'home_services_title',
        'home_services_subtitle',
        'home_services_text',
        'home_projects_title',
        'home_projects_subtitle',
        'home_projects_text',
        'footer_text',
        'footer_column_1_title',
        'footer_column_2_title',
        'home_about_title',
        'home_about_subtitle',
        'home_about_text',
        'home_packages_title',
        'home_packages_subtitle',
        'home_packages_text',
    ];

    protected $casts = [
        'social_media' => 'array',
        'phone_numbers' => 'array',
        'header_links' => 'array',
        'footer_links' => 'array',
        'show_services_section' => 'boolean',
        'show_projects_section' => 'boolean',
        'show_blogs_section' => 'boolean',
        'show_hero_social' => 'boolean',
        'show_about_section' => 'boolean',
        'show_packages_section' => 'boolean',
    ];
}
