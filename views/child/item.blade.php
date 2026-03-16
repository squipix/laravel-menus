@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.child.item',
    'menus::styles.style1.child.item',
], ['item' => $item])
