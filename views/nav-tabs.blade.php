@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.nav-tabs',
    'menus::styles.style1.nav-tabs',
], ['items' => $items])
