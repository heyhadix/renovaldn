<?php

namespace App\Filament\Resources\Leads\Schemas;

use App\Models\Lead;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(30),
                        Select::make('preferred_contact')
                            ->label('Preferred Contact Method')
                            ->options([
                                'email' => 'Email',
                                'phone' => 'Phone',
                            ])
                            ->required()
                            ->default('email'),
                    ]),

                Section::make('Enquiry Details')
                    ->schema([
                        Select::make('service')
                            ->options(array_combine(Lead::$services, Lead::$services))
                            ->required()
                            ->searchable(),
                        Textarea::make('message')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Admin')
                    ->columns(2)
                    ->schema([
                        Select::make('status')
                            ->options(Lead::$statuses)
                            ->required()
                            ->default('new'),
                        Textarea::make('admin_notes')
                            ->label('Internal Notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
