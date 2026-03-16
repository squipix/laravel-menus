# Installation

1. Require the package using Composer:

```
composer require squipix/laravel-menus
```

2. (Optional) Publish configuration and view templates:

```
php artisan vendor:publish --provider="Squipix\Menus\MenusServiceProvider" --tag="config"
php artisan vendor:publish --provider="Squipix\Menus\MenusServiceProvider" --tag="views"
```

3. (Optional) If auto-discovery is disabled, register the service provider and
   facade in `config/app.php`:

```php
'providers' => [
    // ...
    Squipix\Menus\MenusServiceProvider::class,
],

'aliases' => [
    // ...
    'Menu' => Squipix\Menus\Facades\Menu::class,
],
```

4. Configure the package in `config/menus.php` (published to `config/menus.php`)
   to set `activeStyle`, presenters, and ordering.
