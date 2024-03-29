<?php

namespace io3x1\FilamentSitemap\Pages;

use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\Grid;
use Spatie\Sitemap\SitemapGenerator;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\ButtonAction;
use Filament\Forms\Components\FileUpload;
use io3x1\FilamentSitemap\Settings\SitesSettings;


class SiteSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = SitesSettings::class;

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationGroup = 'Settings';

    protected static function getNavigationLabel(): string
    {
        return __('Settings');
    }

    protected function getActions(): array
    {
        return [
            Action::make('sitemap')->requiresConfirmation()->action('generateSitemap')->label(__('Generate Sitemap')),
        ];
    }


    public function generateSitemap()
    {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        Notification::make()
            ->title( _("Sitemap Generated Success"))
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->send();
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(['default' => 2])->schema([
                TextInput::make('site_name')
                    ->columnSpan(["2xl" => 1])
                    ->hint(config('filament-sitemap.show_hint') ? 'setting("site_name")' : null),
                TextInput::make('site_author')
                    ->columnSpan(["2xl" => 1])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_author")': null),
                TextInput::make('site_email')
                    ->columnSpan(["2xl" => 1])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_email")': null),
                TextInput::make('site_phone')
                    ->columnSpan(["2xl" => 1])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_phone")': null),
                TextArea::make('site_description')
                    ->columnSpan(["2xl" => 1])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_description")': null),
                TextArea::make('site_keywords')
                    ->columnSpan(["2xl" => 1])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_keywords")': null),
                TextArea::make('site_address')
                    ->columnSpan(["2xl" => 1])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_address")': null),
                TextInput::make('site_phone_code')
                    ->columnSpan(["2xl" => 1])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_phone_code")': null),
                TextInput::make('site_location')
                    ->columnSpan(["2xl" => 2])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_location")': null),
                TextInput::make('site_currency')
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_currency")': null),
                TextInput::make('site_language')
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_language")': null),
                FileUpload::make('site_profile')
                    ->columnSpan(["2xl" => 2])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_profile")': null),
                FileUpload::make('site_logo')
                    ->columnSpan(["2xl" => 2])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_logo")': null),
                Repeater::make('site_social')
                    ->columnSpan(["2xl" => 2])
                    ->schema([
                        TextInput::make('vendor'),
                        TextInput::make('link')->url(),
                    ])
                    ->hint(config('filament-sitemap.show_hint') ?'setting("site_social")': null),
            ])

        ];
    }
}
