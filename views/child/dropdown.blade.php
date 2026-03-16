@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.child.dropdown',
    'menus::styles.style1.child.dropdown',
], ['item' => $item, 'child' => $child ?? null])
