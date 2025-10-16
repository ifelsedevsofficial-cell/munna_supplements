<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Order;
use Filament\Widgets\ChartWidget;

class WeeklySalesChart extends ChartWidget
{
    protected ?string $heading = 'Weekly Sales (Last 7 Days)';
    protected int|string|array $columnSpan = '1';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        // Loop through last 7 days
        for ($i = 6; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i);
            $labels[] = $day->format('D');

            $data[] = Order::where('payment_status', 'paid')
                ->whereDate('created_at', $day->toDateString())
                ->sum('total_amount');
        }
        $colors = collect($data)->map(function ($value) {
            if ($value > 5000) return '#16a34a'; // green for high sales
            if ($value > 1000) return '#f59e0b'; // amber for medium
            return '#ef4444'; // red for low
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
