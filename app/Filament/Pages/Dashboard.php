<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatisticsReportWidget;
use App\Filament\Widgets\BookingsLineChartWidget;
use App\Filament\Widgets\BookingsMonthlyLineChartWidget; // Pastikan ini diimport

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            StatisticsReportWidget::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            BookingsLineChartWidget::class, // Line chart harian
            BookingsMonthlyLineChartWidget::class, // Line chart bulanan
        ];
    }
}
