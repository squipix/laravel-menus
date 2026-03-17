# Usage & Examples

This page shows quick examples to create and render menus.

Basic builder example (in a service provider, routes file, or a view composer):

```php
use Squipix\Menus\Facades\Menu;

Menu::make('main', function($menu) {
    $menu->add(['title' => 'Home', 'url' => '/']);
    $menu->url('/about', 'About');
    $menu->route('profile.show', 'Profile', ['id' => 1]);

    $menu->dropdown('Products', function($sub) {
        $sub->url('/products/1', 'Product 1');
        $sub->url('/products/2', 'Product 2');
    });
});
```

Render the menu in Blade:

```
{!! Menu::render('main') !!}
```

Presenter / style selection (inside the builder callback):

```php
Menu::make('main', function($menu) {
    $menu->style('navbar'); // set a presenter style alias
    // ... add items
});
```

Binding example (resolve placeholders at render time):

```php
Menu::make('main', function($menu) {
    $menu->add(['title' => 'Profile {id}', 'url' => '/user/{id}']);
});

echo Menu::render('main', null, ['id' => 42]);
```

See `config/menus.php` for available styles and presenter aliases.
