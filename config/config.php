<?php

return [

    'styles' => [
        'navbar' => \Squipix\Menus\Presenters\Bootstrap\NavbarPresenter::class,
        'navbar-right' => \Squipix\Menus\Presenters\Bootstrap\NavbarRightPresenter::class,
        'nav-pills' => \Squipix\Menus\Presenters\Bootstrap\NavPillsPresenter::class,
        'nav-tab' => \Squipix\Menus\Presenters\Bootstrap\NavTabPresenter::class,
        'sidebar' => \Squipix\Menus\Presenters\Bootstrap\SidebarMenuPresenter::class,
        'navmenu' => \Squipix\Menus\Presenters\Bootstrap\NavMenuPresenter::class,
        'adminlte' => \Squipix\Menus\Presenters\Admin\AdminltePresenter::class,
        'zurbmenu' => \Squipix\Menus\Presenters\Foundation\ZurbMenuPresenter::class,
    ],

    'ordering' => false,

];
