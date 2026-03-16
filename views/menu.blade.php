@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.menu',
    'menus::styles.style1.menu',
], ['items' => $items])
