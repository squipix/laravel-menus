<?php

namespace Squipix\Menus\Tests;

use Illuminate\Config\Repository;
use Squipix\Menus\MenuBuilder;
use Squipix\Menus\MenuItem;

class MenuBuilderTest extends BaseTestCase
{
    /** @test */
    public function it_makes_a_menu_item()
    {
        $builder = new MenuBuilder('main', app(Repository::class));

        self::assertInstanceOf(MenuItem::class, $builder->url('hello', 'world'));
    }
    /** @test */
    public function it_can_find_item_by_title()
    {
        $builder = new MenuBuilder('main', app(Repository::class));
        $builder->url('hello', 'World');
        $builder->url('foo', 'Bar');

        $item = $builder->whereTitle('Bar');
        self::assertInstanceOf(MenuItem::class, $item);
        self::assertEquals('foo', $item->url);
    }

    /** @test */
    public function it_can_find_item_by_attribute()
    {
        $builder = new MenuBuilder('main', app(Repository::class));
        $builder->url('hello', 'World');
        $builder->url('foo', 'Bar');

        $item = $builder->findBy('url', 'foo');
        self::assertInstanceOf(MenuItem::class, $item);
        self::assertEquals('Bar', $item->title);
    }

    /** @test */
    public function it_can_set_and_get_prefix_url()
    {
        $builder = new MenuBuilder('main', app(Repository::class));
        // Verify setPrefixUrl is fluent.
        self::assertInstanceOf(MenuBuilder::class, $builder->setPrefixUrl('admin'));
    }

    /** @test */
    public function it_can_add_a_divider()
    {
        $builder = new MenuBuilder('main', app(Repository::class));
        $builder->addDivider();

        $items = $builder->getItems();
        $divider = end($items);
        self::assertEquals('divider', $divider->name);
        self::assertTrue($divider->isDivider());
    }

    /** @test */
    public function it_can_add_a_header()
    {
        $builder = new MenuBuilder('main', app(Repository::class));
        $builder->addHeader('My Header');

        $items = $builder->getItems();
        $header = end($items);
        self::assertEquals('header', $header->name);
        self::assertEquals('My Header', $header->title);
        self::assertTrue($header->isHeader());
    }

    /** @test */
    public function it_can_get_ordered_items()
    {
        $builder = new MenuBuilder('main', app(Repository::class));
        $builder->url('one', 'One', 2, []);
        $builder->url('two', 'Two', 1, []);

        $builder->enableOrdering();
        $items = array_values($builder->getOrderedItems());

        self::assertEquals('Two', $items[0]->title);
        self::assertEquals('One', $items[1]->title);
    }

    /** @test */
    public function it_can_set_and_get_presenter()
    {
        $builder = new MenuBuilder('main', app(Repository::class));
        $builder->setPresenter(\Squipix\Menus\Presenters\Bootstrap\NavbarPresenter::class);

        self::assertInstanceOf(\Squipix\Menus\Presenters\PresenterInterface::class, $builder->getPresenter());
    }

    /** @test */
    public function it_throws_exception_if_presenter_class_does_not_exist()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Presenter class NonExistentClass does not exist.");

        $builder = new MenuBuilder('main', app(Repository::class));
        $builder->setPresenter('NonExistentClass');
        $builder->getPresenter();
    }

    /** @test */
    public function it_throws_exception_if_presenter_does_not_implement_interface()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Presenter must implement ' . \Squipix\Menus\Presenters\PresenterInterface::class);

        $builder = new MenuBuilder('main', app(Repository::class));
        $builder->setPresenter(\stdClass::class);
        $builder->getPresenter();
    }

    /** @test */
    public function it_reads_presenters_from_active_style_configuration()
    {
        app('config')->set('menus.activeStyle', 'style1');

        $builder = new MenuBuilder('main', app(Repository::class));

        self::assertTrue($builder->hasStyle('adminlte'));
        self::assertEquals(
            \Squipix\Menus\Presenters\Admin\AdminltePresenter::class,
            $builder->getStyle('adminlte')
        );
    }

    /** @test */
    public function it_uses_active_style_default_presenter_when_no_presenter_is_provided()
    {
        app('config')->set('menus.activeStyle', 'style1');

        $builder = new MenuBuilder('main', app(Repository::class));

        self::assertStringContainsString('sidebar-menu tree', $builder->render());
    }

    /** @test */
    public function it_falls_back_to_legacy_styles_when_style_presenters_are_missing()
    {
        app('config')->set('menus.stylePresenters', []);
        app('config')->set('menus.styles', [
            'legacy' => \Squipix\Menus\Presenters\Bootstrap\NavbarPresenter::class,
        ]);

        $builder = new MenuBuilder('main', app(Repository::class));

        self::assertTrue($builder->hasStyle('legacy'));
        self::assertEquals(
            \Squipix\Menus\Presenters\Bootstrap\NavbarPresenter::class,
            $builder->getStyle('legacy')
        );
    }
}
