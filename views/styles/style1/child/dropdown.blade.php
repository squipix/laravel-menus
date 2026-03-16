<li class="dropdown-submenu {{ $item->hasActiveOnChild() ? 'active' : '' }}">
	<a tabindex="-1" href="#">{{ $item->title }}</a>
	<ul class="dropdown-menu">
		@foreach ($item->childs as $child)
			@if ($child->hasChilds())
				@include('menus::styles.style1.child.dropdown', ['item' => $child])
			@else
				@include('menus::styles.style1.child.item', ['item' => $child])
			@endif
		@endforeach
	</ul>
</li>
