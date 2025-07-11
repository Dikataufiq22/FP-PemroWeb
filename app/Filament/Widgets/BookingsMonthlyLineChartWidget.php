<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\LineChartWidget;

class BookingsMonthlyLineChartWidget extends LineChartWidget
{
    protected static ?string $heading = 'Tren Pemesanan / Bulan';

    protected function getData(): array
    {
        $bookingsByMonth = Booking::selectRaw('DATE_FORMAT(start_date, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Format label bulan ke format "Jul 2025" dst
        $labels = collect($bookingsByMonth->keys())->map(function($month) {
            return \Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('M Y');
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Pemesanan',
                    'data' => array_values($bookingsByMonth->toArray()),
                    'borderColor' => 'rgba(59, 130, 246, 1)',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'tension' => 0.4,
                    'pointBackgroundColor' => 'rgba(59, 130, 246, 1)',
                ],
            ],
            'labels' => $labels,
        ];
    }
}
