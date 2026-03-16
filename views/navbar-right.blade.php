@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.navbar-right',
    'menus::styles.style1.navbar-right',
], ['items' => $items])
