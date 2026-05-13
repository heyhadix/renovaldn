<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LeadStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total     = Lead::count();
        $new       = Lead::where('status', 'new')->count();
        $contacted = Lead::where('status', 'contacted')->count();
        $completed = Lead::where('status', 'completed')->count();
        $thisMonth = Lead::whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year)
                        ->count();

        return [
            Stat::make('Total Leads', $total)
                ->description('All time enquiries')
                ->descriptionIcon('heroicon-o-inbox')
                ->color('info')
                ->icon('heroicon-o-inbox-stack'),

            Stat::make('New', $new)
                ->description('Awaiting response')
                ->descriptionIcon('heroicon-o-sparkles')
                ->color('success')
                ->icon('heroicon-o-bell-alert'),

            Stat::make('Contacted', $contacted)
                ->description('In progress')
                ->descriptionIcon('heroicon-o-arrow-path')
                ->color('warning')
                ->icon('heroicon-o-chat-bubble-left-right'),

            Stat::make('Completed', $completed)
                ->description('Jobs finished')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('gray')
                ->icon('heroicon-o-check-badge'),

            Stat::make('This Month', $thisMonth)
                ->description(now()->format('F Y'))
                ->descriptionIcon('heroicon-o-calendar-days')
                ->color('primary')
                ->icon('heroicon-o-chart-bar'),
        ];
    }
}
