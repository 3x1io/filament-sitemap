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
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
