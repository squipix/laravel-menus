@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.nav-tabs-justified',
    'menus::styles.style1.nav-tabs-justified',
], ['items' => $items])
