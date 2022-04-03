# Filament Sitemap

Site Settings Like title, description, profile and Sitemap Generator

## Installation

Before install looking for this packages and install it

- [spatie-laravel-settings-plugin](https://filamentphp.com/docs/2.x/spatie-laravel-settings-plugin/installation)
- [laravel-sitemap](https://github.com/spatie/laravel-sitemap)
- [filament-themes](https://github.com/3x1io/filament-themes)


You can install the package via composer:

```bash
composer require 3x1io/filament-sitemap
```

don't forget to migrate the settings table form [spatie-laravel-settings-plugin](https://filamentphp.com/docs/2.x/spatie-laravel-settings-plugin/installation)

run migration

```bash
php artisan migrate
```

and now clear cache

```bash
php artisan optimize:clear
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [3x1](https://github.com/3x1io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
