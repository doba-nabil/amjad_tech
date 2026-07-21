<?php
namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class VisitsChart extends ChartWidget
{
    protected static ?string $heading = 'Visits Overview';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 1; // Half width on desktop

    public function getHeading(): string
    {
        return __('dashboard.visits_chart');
    }

    protected function getFilters(): ?array
    {
        return [
            'week' => __('dashboard.this_week'),
            'month' => __('dashboard.this_month'),
            'six_months' => __('dashboard.six_months'),
            'year' => __('dashboard.this_year'),
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter ?? 'year';

        $data = [];
        $labels = [];

        // Dummy data for visits
        if ($activeFilter === 'week') {
            $data = [120, 150, 100, 180, 200, 350, 400];
            for ($i = 6; $i >= 0; $i--) $labels[] = Carbon::now()->subDays($i)->format('D');
        } elseif ($activeFilter === 'month') {
            $data = [1000, 1500, 1200, 2000];
            $labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
        } elseif ($activeFilter === 'six_months') {
            $data = [4000, 4800, 5500, 6200, 7000, 8500];
            for ($i = 5; $i >= 0; $i--) $labels[] = Carbon::now()->subMonths($i)->format('M');
        } else {
            // year
            $data = [1200, 1900, 3000, 2500, 4200, 3800, 5000, 4800, 5500, 6200, 7000, 8500];
            for ($i = 1; $i <= 12; $i++) $labels[] = Carbon::create(null, $i, 1)->format('M');
        }

        return [
            'datasets' => [
                [
                    'label' => __('dashboard.visits'),
                    'data' => $data,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)', // Blue
                    'borderColor' => 'rgb(59, 130, 246)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
