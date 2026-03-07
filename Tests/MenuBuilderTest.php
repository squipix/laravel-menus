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
}
