@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.nav-pills',
    'menus::styles.style1.nav-pills',
], ['items' => $items])
