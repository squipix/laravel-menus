@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.default',
    'menus::styles.style1.default',
], ['items' => $items])
