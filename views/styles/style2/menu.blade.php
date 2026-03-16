@foreach ($items as $item)
	@if ($item->hasChilds())
		@include('menus::styles.style2.item.dropdown', compact('item'))
	@else
		@include('menus::styles.style2.item.item', compact('item'))
	@endif
@endforeach
