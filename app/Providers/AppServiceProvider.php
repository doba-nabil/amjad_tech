<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Filament\Forms\Components\Field;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (!app()->runningInConsole()) {
                $settings = \App\Models\Setting::first() ?? new \App\Models\Setting([
                    'show_services_section' => true,
                    'show_projects_section' => true,
                    'show_blogs_section' => true,
                ]);
                \Illuminate\Support\Facades\View::share('settings', $settings);
            }
        } catch (\Exception $e) {
            // Migration might not have run yet
        }

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar','en']);
        });

        // Disabled global real-time validation to improve performance on large forms like Settings
        // Field::configureUsing(function (Field $field) {
        //     $field->live(onBlur: true);
        // });
    }
}
