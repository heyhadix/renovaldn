<?php

namespace App\Filament\Resources\Leads\Tables;

use App\Models\Lead;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Email copied'),
                TextColumn::make('phone')
                    ->searchable()
                    ->placeholder('—'),
                TextColumn::make('service')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new'       => 'success',
                        'contacted' => 'warning',
                        'completed' => 'gray',
                        default     => 'info',
                    })
                    ->formatStateUsing(fn (string $state): string => Lead::$statuses[$state] ?? ucfirst($state)),
                TextColumn::make('preferred_contact')
                    ->label('Contact Via')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(Lead::$statuses),
                SelectFilter::make('service')
                    ->options(array_combine(Lead::$services, Lead::$services)),
            ])
            ->recordActions([
                ViewAction::make(),
                Action::make('sendEmail')
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->color('success')
                    ->url(fn (Lead $record): string => "mailto:{$record->email}?subject=Re: Your Enquiry about {$record->service}&body=Hi {$record->name},%0A%0AThank you for contacting Renova LDN.%0A%0AKind regards,%0ARenova LDN Team")
                    ->openUrlInNewTab(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
