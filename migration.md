# Migration from nWidart/laravel-menus to Squipix/laravel-menus

This package is a drop-in replacement for `nWidart/laravel-menus`. Follow these steps to migrate your existing project to use `Squipix/laravel-menus`.

## Step 1: Update composer.json

Remove the old package and add the new one. In your `composer.json`, replace:
```json
"nwidart/laravel-menus": "^x.x"
```

With:
```json
"squipix/laravel-menus": "^x.x"
```

Then run:
```bash
composer update
```

## Step 2: Update Namespaces

You need to update the namespaces in your application where the package is used. Perform a global search and replace in your project directory (typically in `app/`, `routes/`, and `config/`):

**Search for:** `Nwidart\Menus`
**Replace with:** `Squipix\Menus`

*Note: This will also cover the `Nwidart\Menus\Facades\Menu` facade replacement to `Squipix\Menus\Facades\Menu`.*

## Step 3: Update Published Configuration (If applicable)

If you previously published the package's configuration file (`config/menus.php`), the presenter classes will still contain the old namespace. Update the `styles` array inside `config/menus.php`:

**Search for:** `\Nwidart\Menus\Presenters\`
**Replace with:** `\Squipix\Menus\Presenters\`

Alternatively, you could republish the config file, but be careful not to overwrite any custom styles you added.

## Step 4: Update Published Views (If applicable)

If you published the package views previously, you should rename the vendor views directory to match the new package name:

```bash
mv resources/views/vendor/nwidart/menus resources/views/vendor/Squipix/menus
```

## Conclusion

That's it! Everything else works exactly the same. You have successfully migrated to the maintained version supporting newer Laravel versions.
