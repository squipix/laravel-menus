# Presenters & Customization

This package ships with several presenters (Bootstrap, AdminLTE, Foundation).
Presenters are responsible for turning `MenuItem` objects into HTML.

Built-in presenters are configured in `config/menus.php` under `styles` and
`stylePresenters`. To use a presenter by alias, call `$menu->style('alias')`.

Creating a custom presenter

1. Create a class that implements `Squipix\Menus\Presenters\PresenterInterface`.
2. Implement the required wrapper methods (`getOpenTagWrapper`, `getCloseTagWrapper`,
   `getMenuWithDropDownWrapper`, `getMenuWithoutDropdownWrapper`, `getHeaderWrapper`, etc.).
3. Register the presenter in your `config/menus.php` mapping:

```php
'styles' => [
    'my-style' => \App\Menus\Presenters\MyPresenter::class,
],
```

4. Use it when building the menu:

```php
Menu::make('main', function($menu) {
    $menu->style('my-style');
    // ...
});
```

View-based presenters

You can also render menus via a Blade view presenter by calling `$builder->setView('view.name')`
from the builder. The view receives an `items` variable with ordered items.
