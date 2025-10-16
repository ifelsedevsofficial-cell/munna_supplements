<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Order;
use Filament\Widgets\ChartWidget;

class MonthlySalesChart extends ChartWidget
{

    protected ?string $heading = 'Monthly Sales (Last 30 Days)';
    protected int|string|array $columnSpan = '1'; // half width if Weekly is other half
    protected static ?int $sort = 3; // after weekly

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        // Loop through last 30 days
        for ($i = 29; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i);
            $labels[] = $day->format('M d'); // e.g. Oct 01

            $data[] = Order::where('payment_status', 'paid')
                ->whereDate('created_at', $day->toDateString())
                ->sum('total_amount');
        }

        // Dynamic colors based on value
        $colors = collect($data)->map(function ($value) {
            if ($value > 10000) return '#16a34a'; // green for very high sales
            if ($value > 3000) return '#f59e0b';  // amber for medium
            return '#ef4444';                     // red for low
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Sales (PKR)',
                    'data' => $data,
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $labels,
        ];
        // return [
        //     'datasets' => [
        //         [
        //             'label' => 'Sales (PKR)',
        //             'data' => $data,
        //             'backgroundColor' => [
        //                 '#3b82f6', // blue
        //                 '#10b981', // green
        //                 '#f59e0b', // amber
        //                 '#ef4444', // red
        //                 '#8b5cf6', // purple
        //                 '#06b6d4', // cyan
        //                 '#ec4899', // pink
        //             ],
        //         ],
        //     ],
        //     'labels' => $labels,
        // ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
