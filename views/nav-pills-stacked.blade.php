@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.nav-pills-stacked',
    'menus::styles.style1.nav-pills-stacked',
], ['items' => $items])
