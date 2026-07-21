<?php
namespace App\Filament\Widgets;

use App\Models\Purchase;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class PurchasesChart extends ChartWidget
{
    protected static ?string $heading = 'Purchases Chart';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 1; // Half width on desktop

    public function getHeading(): string
    {
        return __('dashboard.purchases_chart');
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

        // Real data fetching logic would go here depending on filter. 
        // We will mock the shape based on the active filter for now.
        if ($activeFilter === 'week') {
            for ($i = 6; $i >= 0; $i--) {
                $day = Carbon::now()->subDays($i);
                $data[] = Purchase::whereDate('purchase_date', $day->toDateString())->count();
                $labels[] = $day->format('D');
            }
        } elseif ($activeFilter === 'month') {
            for ($i = 4; $i >= 1; $i--) {
                $weekStart = Carbon::now()->subWeeks($i);
                $data[] = Purchase::whereBetween('purchase_date', [$weekStart, $weekStart->copy()->addDays(7)])->count();
                $labels[] = 'Week ' . (5 - $i);
            }
        } elseif ($activeFilter === 'six_months') {
            for ($i = 5; $i >= 0; $i--) {
                $month = Carbon::now()->subMonths($i);
                $data[] = Purchase::whereMonth('purchase_date', $month->month)->count();
                $labels[] = $month->format('M');
            }
        } else {
            // year
            for ($i = 1; $i <= 12; $i++) {
                $month = Carbon::create(null, $i, 1);
                $data[] = Purchase::whereMonth('purchase_date', $i)->count();
                $labels[] = $month->format('M');
            }
        }

        return [
            'datasets' => [
                [
                    'label' => __('dashboard.purchases'),
                    'data' => $data,
                    'backgroundColor' => 'rgba(99, 102, 241, 0.5)', // Indigo
                    'borderColor' => 'rgb(99, 102, 241)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
