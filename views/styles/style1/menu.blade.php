@foreach ($items as $item)
	@if ($item->hasChilds())
		@include('menus::styles.style1.item.dropdown', compact('item'))
	@else
		@include('menus::styles.style1.item.item', compact('item'))
	@endif
@endforeach
