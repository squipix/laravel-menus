<li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r {{ ($item->isActive() || $item->hasActiveOnChild()) ? 'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' : '' }}"
    x-data="{ open: {{ ($item->isActive() || $item->hasActiveOnChild()) ? 1 : 0 }} }">
    <a class="block text-gray-800 dark:text-gray-100 truncate transition {{ (!$item->isActive() && !$item->hasActiveOnChild()) ? 'hover:text-gray-900 dark:hover:text-white' : '' }}"
       href="#" @click.prevent="open = !open; sidebarExpanded = true">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                {!! $item->getIcon() !!}
                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $item->title }}</span>
            </div>
            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 {{ ($item->isActive() || $item->hasActiveOnChild()) ? 'rotate-180' : '' }}"
                     :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                </svg>
            </div>
        </div>
    </a>
    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
        <ul class="pl-8 mt-1 {{ (!$item->isActive() && !$item->hasActiveOnChild()) ? 'hidden' : '' }}" :class="open ? 'block!' : 'hidden'">
            @foreach ($item->childs as $child)
                @if ($child->hasChilds())
                    @include('menus::styles.style2.child.dropdown', ['item' => $child])
                @else
                    @include('menus::styles.style2.child.item', ['item' => $child])
                @endif
            @endforeach
        </ul>
    </div>
</li>
