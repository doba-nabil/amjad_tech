@php
    $settings = null;
    try {
        if (!app()->runningInConsole()) {
            $settings = \App\Models\Setting::first();
        }
    } catch (\Exception $e) {}

    $logo = $settings && $settings->logo ? \Illuminate\Support\Facades\Storage::url($settings->logo) : null;
    $favicon = $settings && $settings->favicon ? \Illuminate\Support\Facades\Storage::url($settings->favicon) : null;
    $siteName = $settings->site_name ?? 'Tech Company';
@endphp

<div class="fi-logo flex text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white" style="align-items: center; justify-content: center; width: 100%;">
    {{-- Full Logo (Expanded) --}}
    <div class="fi-logo-expanded">
        @if($logo)
            <img src="{{ asset($logo) }}" alt="{{ $siteName }}" style="max-height: 40px; width: auto;" />
        @else
            {{ $siteName }}
        @endif
    </div>

    {{-- Favicon (Collapsed) --}}
    @if($favicon)
        <div class="fi-logo-collapsed hidden" style="display: none;">
            <img src="{{ asset($favicon) }}" alt="{{ $siteName }}" style="max-height: 30px; width: auto;" />
        </div>
    @else
        <div class="fi-logo-collapsed hidden" style="display: none;">
            {{ substr($siteName, 0, 1) }}
        </div>
    @endif
</div>

<style>
    /* 
     Filament v3 collapsed sidebar usually has a max-width and sets overflow hidden.
     We can use CSS to switch between the logos when the sidebar width is small.
     A typical collapsed sidebar in Filament is around 4rem (64px) wide. 
    */
    @media (min-width: 1024px) {
        .fi-sidebar-is-collapsed .fi-logo-expanded,
        aside[style*="width: 4rem"] .fi-logo-expanded,
        aside[style*="width: 5rem"] .fi-logo-expanded,
        .fi-sidebar-nav-collapsed .fi-logo-expanded,
        .fi-collapsed .fi-logo-expanded {
            display: none !important;
        }

        .fi-sidebar-is-collapsed .fi-logo-collapsed,
        aside[style*="width: 4rem"] .fi-logo-collapsed,
        aside[style*="width: 5rem"] .fi-logo-collapsed,
        .fi-sidebar-nav-collapsed .fi-logo-collapsed,
        .fi-collapsed .fi-logo-collapsed {
            display: block !important;
        }
    }
</style>
