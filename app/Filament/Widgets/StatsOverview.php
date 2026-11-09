<?php

namespace App\Filament\Widgets;

use App\Models\Pengaduan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Menunggu', Pengaduan::where('status', 'menunggu')->count()),
            Stat::make('Proses', Pengaduan::where('status', 'Proses')->count()),
            Stat::make('Selesai', Pengaduan::where('status', 'Selesai')->count()),
        ];
    }
}
