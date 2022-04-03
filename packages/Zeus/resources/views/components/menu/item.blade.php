@isset($route)
    <li class="w-full block mb-4 {{ request()->routeIs($route) ? 'active' : '' }}">
        @isset($submenu)
            <a href="{{ route($route) }}">
                {{ $slot }}
            </a>
            <ul class="ml-2 px-6 py-2 hidden">
                {{ $submenu }}
            </ul>
        @else
        <a href="{{ route($route) }}">
            {{ $slot }}
        </a>
        @endisset
    </li>
@else
    <li class="w-full block mb-4">
        @isset($submenu)
            <a href="#">
                {{ $slot }}
            </a>
            <ul class="ml-2 px-6 py-2 hidden">
                {{ $submenu }}
            </ul>
        @else
        <a href="#">
            {{ $slot }}
        </a>
        @endisset
    </li>
@endisset