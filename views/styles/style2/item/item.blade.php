@if ($item->isDivider())
    <li class="pl-4 pr-3 py-2 mb-0.5 last:mb-0">
        <hr class="border-gray-200 dark:border-gray-700/60">
    </li>
@elseif ($item->isHeader())
    <li class="px-3 py-2">
        <h3 class="text-xs uppercase text-gray-400 dark:text-gray-500 font-semibold">
            {{ $item->title }}
        </h3>
    </li>
@else
    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r {{ $item->isActive() ? 'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' : '' }}">
        <a class="block text-gray-800 dark:text-gray-100 truncate transition {{ !$item->isActive() ? 'hover:text-gray-900 dark:hover:text-white' : '' }}"
           href="{{ $item->getUrl() }}" {!! $item->getAttributes() !!}>
            <div class="flex items-center">
                {!! $item->getIcon() !!}
                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $item->title }}</span>
            </div>
        </a>
    </li>
@endif
