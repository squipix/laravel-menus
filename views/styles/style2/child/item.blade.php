@if ($item->isDivider())
    <li class="mb-1 last:mb-0">
        <hr class="border-gray-200 dark:border-gray-700/60">
    </li>
@elseif ($item->isHeader())
    <li class="mb-1 last:mb-0">
        <span class="text-xs uppercase text-gray-400 dark:text-gray-500 font-semibold">{{ $item->title }}</span>
    </li>
@else
    <li class="mb-1 last:mb-0">
        <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate {{ $item->isActive() ? 'text-violet-500!' : '' }}"
           href="{{ $item->getUrl() }}" {!! $item->getAttributes() !!}>
            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $item->title }}</span>
        </a>
    </li>
@endif
