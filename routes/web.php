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
    Route::post('/blogs/{slug}/comment', [WebsiteController::class, 'postComment'])->name('blog.comment');
    Route::get('/pricing', [WebsiteController::class, 'pricing'])->name('pricing');
    Route::get('/packages/render', [WebsiteController::class, 'renderPackages'])->name('packages.render');
    Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
    Route::post('/contact', [WebsiteController::class, 'contactSubmit'])->name('contact.submit');
Route::post('/subscribe', [WebsiteController::class, 'subscribe'])->name('subscribe');
    Route::get('/category/{slug}', [WebsiteController::class, 'categoryBlogs'])->name('category.blogs');
    Route::get('/p/{slug}', [WebsiteController::class, 'page'])->name('page');
    Route::get('/faq', [WebsiteController::class, 'faq'])->name('faq');

    // Checkout Routes
    Route::get('/checkout/{slug}', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [\App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/callback/myfatoorah/{transaction_id}', [\App\Http\Controllers\CheckoutController::class, 'myfatoorahCallback'])->name('checkout.myfatoorah.callback');
    Route::get('/checkout/callback/bookeey/{transaction_id}', [\App\Http\Controllers\CheckoutController::class, 'bookeeyCallback'])->name('checkout.bookeey.callback');
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

