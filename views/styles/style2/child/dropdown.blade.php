<li class="mb-1 last:mb-0" x-data="{ open: {{ ($item->isActive() || $item->hasActiveOnChild()) ? 1 : 0 }} }">
    <a class="flex items-center justify-between text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate {{ ($item->isActive() || $item->hasActiveOnChild()) ? 'text-violet-500!' : '' }}"
       href="#" @click.prevent="open = !open">
        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $item->title }}</span>
        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 {{ ($item->isActive() || $item->hasActiveOnChild()) ? 'rotate-180' : '' }}"
             :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
        </svg>
    </a>
    <ul class="pl-4 mt-1 {{ (!$item->isActive() && !$item->hasActiveOnChild()) ? 'hidden' : '' }}" :class="open ? 'block!' : 'hidden'">
        @foreach ($item->childs as $child)
            @if ($child->hasChilds())
                @include('menus::styles.style2.child.dropdown', ['item' => $child])
            @else
                @include('menus::styles.style2.child.item', ['item' => $child])
            @endif
        @endforeach
    </ul>
</li>
