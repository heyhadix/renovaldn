<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section as SchemaSection;
use Filament\Support\Icons\Heroicon;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?int $navigationSort = 2;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Setting::all_keyed());
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->statePath('data')
            ->components([
                SchemaSection::make('Contact Information')
                    ->description('These details appear on the contact page, footer and navigation.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->placeholder('+44 (0) 7000 000 000'),
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->placeholder('info@renovaldn.com'),
                        TextInput::make('address')
                            ->label('Address / Service Area')
                            ->placeholder('Greater London, UK')
                            ->columnSpanFull(),
                        TextInput::make('hours_weekday')
                            ->label('Weekday Hours')
                            ->placeholder('Mon–Fri: 8am – 6pm'),
                        TextInput::make('hours_weekend')
                            ->label('Weekend Hours')
                            ->placeholder('Saturday: 9am – 4pm'),
                    ]),

                SchemaSection::make('Social Media Links')
                    ->description('Full URLs for your social profiles. Leave as # to hide.')
                    ->columns(3)
                    ->schema([
                        TextInput::make('instagram')
                            ->label('Instagram URL')
                            ->url()
                            ->placeholder('https://instagram.com/...'),
                        TextInput::make('facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->placeholder('https://facebook.com/...'),
                        TextInput::make('linkedin')
                            ->label('LinkedIn URL')
                            ->url()
                            ->placeholder('https://linkedin.com/...'),
                    ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::set($key, $value ?? '');
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }
}
