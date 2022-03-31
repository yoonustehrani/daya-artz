<x-zview-layout-default :title="__('zlang::modeltype.browse', ['name' => trans_choice('zlang::auth.admin', 2)])">
    <div class="w-100 r-float">
        <h1 class="title w-auto inline">@lang('zlang::modeltype.browse', ['name' => trans_choice('zlang::auth.admin', 2)])</h1>
        <p class="inline w-auto float-right">
            <a class="btn bg-blue-400" href="{{ route('zeus.admins.create') }}">@lang('zlang::modeltype.create', ['name' => trans_choice('zlang::auth.admin', 1)])</a>
        </p>
    </div>
    <div class="w-full p-4 overflow-x-auto">
        <table class="w-full table-auto text-center mt-5 awesome-table text-sm">
            <thead class="text-white">
                <th scope="col"><i class="fas fa-hashtag"></i></th>
                <th scope="col">@lang('Username')</th>
                <th scope="col">@lang('Fullname')</th>
                <th scope="col">@lang('Email')</th>
                <th scope="col">@lang('Role')</th>
                <th scope="col">@lang('Language')</th>
                <th scope="col">{{ trans_choice('zlang::main.action', 2) }}</th>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <td>
                        @if ($admin->avatar)
                            <span><img src="{{ asset($admin->avatar) }}" alt="{{ $admin->name . ' avatar' }}" width="25"></span>
                        @endif
                        <span>{{ $admin->name }}</span>
                    </td>
                    <td>{{ $admin->fullname }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role ? $admin->role->title : '---' }}</td>
                    <td>@lang("zlang::main.lang.{$admin->lang}")</td>
                    <td>
                        <div class="flex justify-center">
                            {{-- <button class="btn-sm btn-green">manage</button> --}}
                            @can('update', $admin)
                                <a href="{{ route('zeus.admins.edit', ['admin' => $admin->id]) }}" class="btn-sm m-1 bg-emerald-500 text-white"><i class="fas fa-cog"></i></a>
                            @endcan
                            @can('delete', $admin)
                                <button class="btn-sm m-1 btn-red"><i class="fas fa-trash"></i></button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-zview-layout-default>