@php
    $user = auth('zeus')->user();
@endphp
<div id="m-menu" class="bg-black-coral text-ghost-white h-full float-left rounded-t-2xl md:rounded-l-none md:rounded-r-2xl pt-5 hidden duration-700 z-50 w-full md:block md:w-1/5 overflow-y-auto absolute md:static top-full right-0 left-0 opacity-0 md:opacity-100 sidebar">
    <span id="menu-close" class="md:hidden absolute right-4 top-3 text-4xl"><i class="far fa-times"></i></span>
    <div class="w-100 flex flex-col items-center">
        <a href="{{ route('zeus.auth.profile') }}">
            <div class="avatar-container h-24 w-24 rounded-full ring ring-yellow-400 ring-opacity-60 p-1">
                @if ($user->avatar)
                    <img src="{{ asset($user->avatar) }}" class="w-full h-full rounded-full" alt="User Avatar">
                @endif
            </div>
        </a>
        <div class="info w-100 text-center">
            <p class="font-bold text-xl mt-2">{{ $user->name }}</p>
            <p class="text-xs">{{ $user->email }}</p>
        </div>
        <div class="w-100">
            <img src="{{ asset(config('zconfig.package.logo')) }}" height="50" alt="">
        </div>
    </div>
    <div class="w-100">
        <ul class="menubar text-xl py-8 pr-4">
            <x-zview::menu.item route="zeus.dashboard">
                <i class="fas fa-home"></i> @lang('dashboard')
            </x-zview::menu.item>
            @can('viewAny', \Zeus\Models\ModelType::class)
            <x-zview::menu.item route="zeus.modeltypes.index">
                <x-slot name="submenu">
                    @foreach (\Cache::get('modeltypes', []) as $mt)
                    <li>
                        <a href="{{ route('zeus.modeltypes.edit', ['modeltype' => $mt->id]) }}">
                            <i class="{{ $mt->details->icon ?? 'fas fa-server' }}"></i>{{ $mt->name_singular }}
                        </a>
                    </li>
                    @endforeach
                </x-slot>
                <i class="fas fa-database"></i> @lang('database')
            </x-zview::menu.item>
            @endcan
            <x-zview::menu.item route="zeus.website">
                <i class="fas fa-globe"></i> @lang('Website')
            </x-zview::menu.item>
            <x-zview::menu.item route="zeus.file-gallery">
                <i class="fas fa-image"></i> @lang('Gallery')
            </x-zview::menu.item>
            @can('viewAny', \Zeus\Models\User::class)
                <x-zview::menu.item route="zeus.admins.index">
                    <i class="fas fa-user-tie"></i> {{ trans_choice('zlang::auth.admin', 2) }}
                </x-zview::menu.item>
            @endcan
            <x-zview::menu.item route="zeus.custom.tickets.index">
                <i class="far fa-user-headset"></i> @lang('Tickets')
            </x-zview::menu.item>
            <li>
                <a href="#logout" id="logout-button">
                    <i class="fas fa-power-off"></i> @lang('zlang::auth.logout')
                </a>
            </li>
        </ul>
    </div>
</div>