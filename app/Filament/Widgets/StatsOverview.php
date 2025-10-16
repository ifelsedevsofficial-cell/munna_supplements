<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '30s'; // auto-refresh

    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full'; // widget spans full width

    protected function getColumns(): int
    {
        return 5; // or however many stats you have
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', number_format(User::withoutSuperAdmins()->count()))
                ->description('Active Users')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([3, 5, 8, 12, 15, 18]) // tiny sparkline
                ->icon('heroicon-o-user-group')
                ->color('success'),

            Stat::make('Total Orders', number_format(Order::count()))
                ->description('Orders placed so far')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([5, 9, 14, 20, 25, 32]) // mock order growth
                ->icon('heroicon-o-shopping-cart')
                ->color('primary'),

            Stat::make('Total Products', number_format(Product::count()))
                ->description('Items in catalog')
                ->descriptionIcon('heroicon-m-archive-box')
                ->chart([2, 4, 6, 8, 10, 12]) // sample product growth
                ->icon('heroicon-o-archive-box')
                ->color('warning'),

            Stat::make('Weekly Sales', 'PKR ' . number_format(
                Order::where('payment_status', 'paid')
                    ->where('created_at', '>=', Carbon::now()->subDays(7))
                    ->sum('total_amount'),
                2
            ))
                ->description('Sales in last 7 days')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->icon('heroicon-o-banknotes')
                ->color('info'),

            Stat::make('Monthly Sales', 'PKR ' . number_format(
                Order::where('payment_status', 'paid')
                    ->where('created_at', '>=', Carbon::now()->subDays(30))
                    ->sum('total_amount'),
                2
            ))
                ->description('Sales in last 30 days')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->icon('heroicon-o-banknotes')
                ->color('success'),

            Stat::make('Pending Orders', Order::where('status', 'pending')->count())
                ->icon('heroicon-o-clock')
                ->extraAttributes([
                    'class' => 'stat-pending',
                ]),

            Stat::make('Processing Orders', Order::where('status', 'processing')->count())
                ->icon('heroicon-o-cog-6-tooth')
                ->extraAttributes([
                    'class' => 'stat-processing',
                ]),

            Stat::make('Shipped Orders', Order::where('status', 'shipped')->count())
                ->icon('heroicon-o-truck')
                ->extraAttributes([
                    'class' => 'stat-shipped',
                ]),

            Stat::make('Delivered Orders', Order::where('status', 'delivered')->count())
                ->icon('heroicon-o-check-circle')
                ->extraAttributes([
                    'class' => 'stat-delivered',
                ]),

            Stat::make('Cancelled Orders', Order::where('status', 'cancelled')->count())
                ->icon('heroicon-o-x-circle')
                ->extraAttributes([
                    'class' => 'stat-cancelled',
                ]),

        ];
    }
}
