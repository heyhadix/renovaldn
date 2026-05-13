<?php

namespace App\Filament\Resources\Leads;

use App\Filament\Resources\Leads\Pages\CreateLead;
use App\Filament\Resources\Leads\Pages\EditLead;
use App\Filament\Resources\Leads\Pages\ListLeads;
use App\Filament\Resources\Leads\Pages\ViewLead;
use App\Filament\Resources\Leads\Schemas\LeadForm;
use App\Filament\Resources\Leads\Tables\LeadsTable;
use App\Models\Lead;
use BackedEnum;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInbox;

    protected static ?string $navigationLabel = 'Leads';

    protected static ?string $modelLabel = 'Lead';

    protected static ?string $pluralModelLabel = 'Leads';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return LeadForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Contact Details')
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([
                    TextEntry::make('name')
                        ->label('Full Name')
                        ->weight('bold')
                        ->size('lg'),
                    TextEntry::make('created_at')
                        ->label('Received')
                        ->dateTime('d M Y, H:i')
                        ->icon('heroicon-o-clock')
                        ->color('gray'),
                    TextEntry::make('email')
                        ->label('Email Address')
                        ->icon('heroicon-o-envelope')
                        ->copyable()
                        ->copyMessage('Email copied!'),
                    TextEntry::make('phone')
                        ->label('Phone Number')
                        ->icon('heroicon-o-phone')
                        ->placeholder('Not provided'),
                    TextEntry::make('preferred_contact')
                        ->label('Preferred Contact Method')
                        ->badge()
                        ->color(fn (string $state): string => $state === 'phone' ? 'success' : 'info')
                        ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                ]),

            Section::make('Enquiry')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->columns(1)
                ->schema([
                    TextEntry::make('service')
                        ->label('Service Required')
                        ->badge()
                        ->color('info')
                        ->size('lg'),
                    TextEntry::make('message')
                        ->label('Project Description')
                        ->placeholder('No message provided.')
                        ->prose()
                        ->columnSpanFull(),
                ]),

            Section::make('Status & Notes')
                ->icon('heroicon-o-clipboard-document-list')
                ->columns(2)
                ->schema([
                    TextEntry::make('status')
                        ->badge()
                        ->size('lg')
                        ->color(fn (string $state): string => match ($state) {
                            'new'       => 'success',
                            'contacted' => 'warning',
                            'completed' => 'gray',
                            default     => 'info',
                        })
                        ->formatStateUsing(fn (string $state): string => Lead::$statuses[$state] ?? ucfirst($state)),
                    TextEntry::make('updated_at')
                        ->label('Last Updated')
                        ->dateTime('d M Y, H:i')
                        ->icon('heroicon-o-arrow-path')
                        ->color('gray'),
                    TextEntry::make('admin_notes')
                        ->label('Internal Notes')
                        ->placeholder('No notes added.')
                        ->columnSpanFull()
                        ->prose(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return LeadsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListLeads::route('/'),
            'create' => CreateLead::route('/create'),
            'view'   => ViewLead::route('/{record}'),
            'edit'   => EditLead::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::where('status', 'new')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): string
    {
        return 'success';
    }
}
