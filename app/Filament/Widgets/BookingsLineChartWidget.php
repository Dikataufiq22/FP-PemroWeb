<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\LineChartWidget;

class BookingsLineChartWidget extends LineChartWidget
{
    protected static ?string $heading = 'Tren Pemesanan / Hari';

    protected function getData(): array
    {
        $bookingsByDay = Booking::selectRaw('DATE(start_date) as day, COUNT(*) as count')
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('count', 'day');

        return [
            'datasets' => [
                [
                    'label' => 'Pemesanan',
                    'data' => array_values($bookingsByDay->toArray()),
                    'borderColor' => 'rgba(249, 115, 22, 1)',
                    'backgroundColor' => 'rgba(249, 115, 22, 0.2)',
                    'tension' => 0.4,
                    'pointBackgroundColor' => 'rgba(249, 115, 22, 1)',
                ],
            ],
            'labels' => array_keys($bookingsByDay->toArray()),
        ];
    }
}
