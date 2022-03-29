<x-zview-layout-default title="site settings">
    <h1 class="title">Site Settings</h1>
    <a href="{{ route('zeus.settings.create') }}">create</a>
    <div class="w-full p-4">
        <nav class="w-full">
            <ul class="list-none grid grid-flow-col text-center bg-gray-300 text-gray-900 text-xl rounded-md overflow-hidden">
                @foreach ($groups as $group)
                <li>
                    @if (request()->query('group') === $group)
                        <a class="bg-white border-t-4 border-gray-900 p-3 block" href="#">{{ $group }}</a>
                    @else
                        <a class="p-3 block" href="{{ route('zeus.settings.index', ['group' => $group]) }}">{{ $group }}</a>
                    @endif
                </li>
                @endforeach
            </ul>
        </nav>
        @if ($settings)
        <form class="w-full bg-white p-8 rounded-md overflow-hidden shadow-sm" method="POST" action="{{ route('zeus.settings.groups.update', ['group' => request()->query('group')]) }}">
            @method('PATCH')
            @csrf
            @foreach ($settings as $setting)
                <div class="w-full p-1 mt-2 flex justify-end items-center">
                    <a class="mx-2 btn bg-gray-100 text-gray-700 text-sm" href="{{ route('zeus.settings.edit', ['id' => $setting->id]) }}">
                        @lang('zlang::custom.messages.edit-as-admin')
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </div>
                <x-zview-setting-field :setting="$setting"/>
                @if (! $loop->last)
                    <hr>
                @endif
            @endforeach
            <div class="px-3 mt-14 w-full flex items-center justify-start gap-4">
                <button type="submit" class="btn bg-blue-yonder-dark text-white">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </form>
        @endif
    </div>
</x-zview-layout-default>