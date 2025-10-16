<?php

namespace App\Filament\Pages\Settings;

use App\Filament\Support\Traits\Settings\HasSettingsNavigation;
use App\Settings\GeneralSettings;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

class ManageGeneralSettings extends SettingsPage
{
    use HasSettingsNavigation;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = GeneralSettings::class;

    public static function getNavigationLabel(): string
    {
        return 'Settings';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()->schema([
                    Tab::make('General')->schema([
                        TextInput::make('site_name')
                            ->required(),

                        FileUpload::make('site_logo')
                            ->label('Site Logo')
                            // ->image()
                            ->directory('images/logo')
                            ->disk('public')
                            ->visibility('public')
                            ->deleteUploadedFileUsing(function ($file, GeneralSettings $generalSettings) {
                                Storage::disk('public')->delete($file);
                                $generalSettings->site_logo = null;
                                $generalSettings->save();
                            })
                            ->nullable(),

                        TextInput::make('account_no')
                            ->required(),

                        // Select::make('currency_id')
                        //     ->label('System currency')
                        //     ->options(Currency::pluck('name', 'id')),

                        // Select::make('default_currency_id')
                        //     ->label('Default currency')
                        //     ->options(Currency::pluck('name', 'id'))
                    ]),
                    Tab::make('Application')->schema([
                        Select::make('navigation_type')
                            ->required()
                            ->options([
                                'sidebar' => 'Sidebar',
                                'topbar' => 'Topbar',
                            ]),
                        Select::make('content_width')
                            ->required()
                            ->options([
                                '7xl' => 'Large',
                                'full' => 'Full',
                            ]),
                        Toggle::make('spa_mode')
                            ->required()
                            ->reactive(),
                        Toggle::make('website_spa_mode')
                            ->required()
                            ->reactive(),
                        Toggle::make('spa_mode_prefetching')
                            ->required()
                            ->visible(fn($get) => $get('spa_mode') === true),

                        Action::make('reset_cache')
                            ->label('Reset cache')
                            ->action(function () {
                                $this->redirect(route('optimize'));
                            }),

                        Action::make('clear_cache')
                            ->label('Clear cache')
                            ->action(function () {
                                $this->redirect(route('optimize:clear'));
                            }),
                    ]),
                ])->columnSpanFull()
                    ->columns(2)
                    ->persistTabInQueryString()
                    ->persistTab()
                    ->id('general-settings-tabs'),
            ]);
    }

    protected function afterSave(): void
    {
        // This runs after the settings are saved
        $this->redirect(request()->header('Referer') ?? url()->current());
    }
}
