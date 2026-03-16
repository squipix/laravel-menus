@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.nav-pills-justified',
    'menus::styles.style1.nav-pills-justified',
], ['items' => $items])
