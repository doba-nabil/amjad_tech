<?php
namespace App\Filament\Widgets;

use App\Models\Purchase;
use App\Models\Project;
use App\Models\ContactRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make(__('dashboard.total_purchases'), Purchase::count())
                ->description(__('dashboard.all_time'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make(__('dashboard.active_subscriptions'), Purchase::where('status', 'active')->count())
                ->description(__('dashboard.currently_active'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('primary'),
            Stat::make(__('dashboard.pending_contacts'), ContactRequest::where('status', 'pending')->count())
                ->description(__('dashboard.needs_review'))
                ->descriptionIcon('heroicon-m-envelope-open')
                ->color('danger'),
            Stat::make(__('dashboard.total_projects'), Project::count())
                ->description(__('dashboard.portfolio_size'))
                ->color('info'),
        ];
    }
}
