<?php

namespace Squipix\Menus\Tests;

use Squipix\Menus\Menu;
use Squipix\Menus\MenuBuilder;

class MenuTest extends BaseTestCase
{
    /**
     * @var Menu
     */
    private $menu;

    public function setUp(): void
    {
        parent::setUp();
        $this->menu = app(Menu::class);
    }
    /** @test */
    public function it_generates_an_empty_menu()
    {
        $this->menu->create('test', function (MenuBuilder $menu) {
        });

        $expected = <<<TEXT

<ul class="nav navbar-nav">

</ul>

TEXT;

        self::assertEquals($expected, $this->menu->get('test'));
    }

    /** @test */
    public function it_makes_is_an_alias_for_create()
    {
        $this->menu->make('test', function (MenuBuilder $menu) {
        });

        $expected = <<<TEXT

<ul class="nav navbar-nav">

</ul>

TEXT;

        self::assertEquals($expected, $this->menu->get('test'));
    }

    /** @test */
    public function it_render_is_an_alias_of_get()
    {
        $this->menu->make('test', function (MenuBuilder $menu) {
        });

        $expected = <<<TEXT

<ul class="nav navbar-nav">

</ul>

TEXT;

        self::assertEquals($expected, $this->menu->render('test'));
    }

    /** @test */
    public function it_can_get_the_instance_of_a_menu()
    {
        $this->menu->create('test', function (MenuBuilder $menu) {
        });

        $this->assertInstanceOf(MenuBuilder::class, $this->menu->instance('test'));
    }

    /** @test */
    public function it_can_modify_a_menu_instance()
    {
        $this->menu->create('test', function (MenuBuilder $menu) {
        });

        $this->menu->modify('test', function (MenuBuilder $builder) {
            $builder->url('hello', 'world');
        });

        $this->assertCount(1, $this->menu->instance('test'));
    }

    /** @test */
    public function it_gets_a_partial_for_dropdown_styles()
    {
        $this->menu->create('test', function (MenuBuilder $menu) {
        });

        $this->assertStringContainsString('.dropdown-submenu', $this->menu->style());
    }

    /** @test */
    public function it_can_get_all_menus()
    {
        $this->menu->create('main', function (MenuBuilder $menu) {
        });
        $this->menu->create('footer', function (MenuBuilder $menu) {
        });

        $this->assertCount(2, $this->menu->all());
    }

    /** @test */
    public function it_can_count_menus()
    {
        $this->menu->create('main', function (MenuBuilder $menu) {
        });
        $this->menu->create('footer', function (MenuBuilder $menu) {
        });

        $this->assertEquals(2, $this->menu->count());
    }

    /** @test */
    public function it_can_destroy_all_menus()
    {
        $this->menu->create('main', function (MenuBuilder $menu) {
        });
        $this->menu->create('footer', function (MenuBuilder $menu) {
        });

        $this->assertCount(2, $this->menu->all());
        $this->menu->destroy();
        $this->assertCount(0, $this->menu->all());
    }

    /** @test */
    public function it_uses_the_active_style_default_presenter_for_rendering()
    {
        app('config')->set('menus.activeStyle', 'style1');

        $this->menu->create('test', function (MenuBuilder $menu) {});

        $this->assertStringContainsString('sidebar-menu tree', $this->menu->get('test'));
    }

    /** @test */
    public function it_switches_style_partial_based_on_active_style()
    {
        app('config')->set('menus.activeStyle', 'style2');

        $this->assertStringContainsString('style2', $this->menu->style());
    }
}
