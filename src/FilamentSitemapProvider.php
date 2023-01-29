<?php

namespace io3x1\FilamentSitemap;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use io3x1\FilamentSitemap\Pages\SiteSettings;

class FilamentSitemapProvider extends PluginServiceProvider
{

    public static string $name = 'filament-sitemap';

    protected array $resources = [];

    protected array $pages = [
        SiteSettings::class
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-sitemap');
    }

    public function boot(): void
    {
        parent::boot();

        //Register migrations
        if (! class_exists('SitesSettings')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/sites_settings.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_sites_settings.php'),
            ], 'filament-sitemap-migrations');
        }

        //Register config
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-sitemap.php', 'filament-sitemap');

        //Publish Config
        $this->publishes([
            __DIR__ . '/../config/filament-sitemap.php' => config_path('filament-sitemap.php'),
        ], 'filament-sitemap-config');

    }
}
