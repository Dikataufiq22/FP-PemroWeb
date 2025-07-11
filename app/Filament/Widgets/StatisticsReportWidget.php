<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatisticsReportWidget extends BaseWidget
{
    protected function getCards(): array
    {
        $totalBookings = Booking::count();
        $estimatedRevenue = Booking::sum('total_price');
        $topProduct = Product::withCount('bookings')
            ->orderByDesc('bookings_count')
            ->first();

        return [
            Card::make('Total Pemesanan', $totalBookings)
                ->description('Jumlah seluruh pemesanan')
                ->color('primary')
                ->icon('heroicon-m-clipboard-document-list'),
            Card::make('Estimasi Pendapatan', 'Rp ' . number_format($estimatedRevenue, 0, ',', '.'))
                ->description('Total estimasi pendapatan')
                ->color('success')
                ->icon('heroicon-m-currency-dollar'),
            Card::make('Produk Terlaris', $topProduct ? $topProduct->name : '-')
                ->description($topProduct ? $topProduct->bookings_count . ' pemesanan' : 'Tidak ada data')
                ->color('warning')
                ->icon('heroicon-m-star'),
        ];
    }
}

