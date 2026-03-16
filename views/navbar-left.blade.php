@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.navbar-left',
    'menus::styles.style1.navbar-left',
], ['items' => $items])
