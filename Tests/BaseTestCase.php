<?php

namespace Squipix\Menus\Tests;

use Squipix\Html\HtmlServiceProvider;
use Squipix\Menus\MenusServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class BaseTestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        // $this->setUpDatabase();
    }

    protected function getPackageProviders($app)
    {
        return [
            HtmlServiceProvider::class,
            MenusServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('menus', [
            'activeStyle' => 'style2',

            'styleDefaults' => [
                'style1' => 'adminlte',
                'style2' => 'navbar',
            ],

            'stylePresenters' => [
                'style1' => [
                    'navbar' => \Squipix\Menus\Presenters\Bootstrap\NavbarPresenter::class,
                    'navbar-right' => \Squipix\Menus\Presenters\Bootstrap\NavbarRightPresenter::class,
                    'nav-pills' => \Squipix\Menus\Presenters\Bootstrap\NavPillsPresenter::class,
                    'nav-tab' => \Squipix\Menus\Presenters\Bootstrap\NavTabPresenter::class,
                    'sidebar' => \Squipix\Menus\Presenters\Bootstrap\SidebarMenuPresenter::class,
                    'navmenu' => \Squipix\Menus\Presenters\Bootstrap\NavMenuPresenter::class,
                    'adminlte' => \Squipix\Menus\Presenters\Admin\AdminltePresenter::class,
                    'zurbmenu' => \Squipix\Menus\Presenters\Foundation\ZurbMenuPresenter::class,
                ],
                'style2' => [
                    'navbar' => \Squipix\Menus\Presenters\Bootstrap\NavbarPresenter::class,
                    'navbar-right' => \Squipix\Menus\Presenters\Bootstrap\NavbarRightPresenter::class,
                    'nav-pills' => \Squipix\Menus\Presenters\Bootstrap\NavPillsPresenter::class,
                    'nav-tab' => \Squipix\Menus\Presenters\Bootstrap\NavTabPresenter::class,
                    'sidebar' => \Squipix\Menus\Presenters\Bootstrap\SidebarMenuPresenter::class,
                    'navmenu' => \Squipix\Menus\Presenters\Bootstrap\NavMenuPresenter::class,
                    'adminlte' => \Squipix\Menus\Presenters\Admin\AdminltePresenter::class,
                    'zurbmenu' => \Squipix\Menus\Presenters\Foundation\ZurbMenuPresenter::class,
                ],
            ],

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
        ]);
    }
}
