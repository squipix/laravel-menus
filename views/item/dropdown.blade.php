@php($activeStyle = config('menus.activeStyle', 'style1'))
@includeFirst([
    'menus::styles.' . $activeStyle . '.item.dropdown',
    'menus::styles.style1.item.dropdown',
], ['item' => $item])
