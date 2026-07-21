<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Models\Package;
use App\Http\Controllers\WebsiteController;

Route::group([
    'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    // Frontend Routes
    Route::get('/', [WebsiteController::class, 'index'])->name('home');
    Route::get('/projects', [WebsiteController::class, 'projects'])->name('projects');
    Route::get('/projects/{slug}', [WebsiteController::class, 'projectDetails'])->name('project.details');
    Route::get('/blogs', [WebsiteController::class, 'blogs'])->name('blogs');
    Route::get('/blogs/{slug}', [WebsiteController::class, 'blogDetails'])->name('blog.details');
    Route::get('/pricing', [WebsiteController::class, 'pricing'])->name('pricing');
    Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
    Route::post('/contact', [WebsiteController::class, 'submitContact'])->name('contact.submit');
    Route::get('/p/{slug}', [WebsiteController::class, 'page'])->name('page');
});

// Sitemap Generation
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create();

    $sitemap->add(Url::create('/')->setPriority(1.0));
    $sitemap->add(Url::create('/projects')->setPriority(0.8));
    $sitemap->add(Url::create('/blogs')->setPriority(0.8));
    $sitemap->add(Url::create('/pricing')->setPriority(0.7));
    $sitemap->add(Url::create('/contact')->setPriority(0.7));

    foreach (Project::all() as $project) {
        $sitemap->add(Url::create("/projects/{$project->slug}")->setPriority(0.6));
    }
    
    foreach (Blog::all() as $blog) {
        $sitemap->add(Url::create("/blogs/{$blog->slug}")->setPriority(0.6));
    }

    $sitemap->writeToFile(public_path('sitemap.xml'));
    return response()->file(public_path('sitemap.xml'));
});
