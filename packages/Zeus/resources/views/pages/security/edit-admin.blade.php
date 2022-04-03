<x-zview-layout-default :title="__('zlang::modeltype.creating', ['name' => trans_choice('zlang::auth.admin', 1)])">
    <div>
        <x-zview::error-alerts />
    </div>
    <h1 class="title">@lang('zlang::modeltype.editing', ['name' => trans_choice('zlang::auth.admin', 1)]) #{{ $admin->getKey() }}</h1>
    <form action="{{ route('zeus.admins.update', ['admin' => $admin->getKey()]) }}" method="post" class="w-100 xl:w-3/4 grid grid-cols-2 gap-4">
        @csrf
        @method('PUT')
        <div class="p-3">
            <label for="">
                <span class="text-gray-700">@lang('Username') :</span>
            </label>
            <input type="text" class="solid-input w-full" name="name" value="{{ $admin->name }}">
        </div>
        <div class="p-3">
            <label for="email">
                <span class="text-gray-700">@lang('Email') :</span>
            </label>
            <input type="text" class="solid-input w-full" name="email" id="email" value="{{ $admin->email }}">
        </div>
        <div class="p-3">
            <label>
                <span class="text-gray-700">@lang('Avatar') :</span>
            </label>
            <input type="text" class="solid-input my-1 ml-2" name="avatar" value="{{ $admin->avatar }}" id="id_avatar">
            <div 
                class="react-file-picker ml-2"
                data-upload="{{ route('api.zeus.files.store') }}"
                data-search="{{ route('api.zeus.files.index') }}"
                data-set-to="id_avatar"
            ></div>
        </div>
        <div class="p-3">
            <label for="password">
                <span class="text-gray-700">@lang('Password') :</span>
            </label>
            <input type="password" class="solid-input w-full" name="password" id="password">
        </div>
        <div class="p-3">
            <label for="password_confirmation">
                <span class="text-gray-700">@lang('confirmation') :</span>
            </label>
            <input type="password" class="solid-input w-full" name="password_confirmation" id="password_confirmation">
        </div>
        <div class="p-3">
            <label for="">
                <span class="text-gray-700">@lang('Firstname') :</span>
            </label>
            <input type="text" class="solid-input w-full" name="first_name" value="{{ $admin->first_name }}">
        </div>
        <div class="p-3">
            <label for="">
                <span class="text-gray-700">@lang('Lastname') :</span>
            </label>
            <input type="text" class="solid-input w-full" name="last_name" value="{{ $admin->last_name }}">
        </div>
        <div class="p-3">
            <label for="lang">
                <span class="text-gray-700">@lang('Language') :</span>
            </label>
            <select class="solid-select w-full" name="lang">
                @foreach (['en', 'fa'] as $lang)
                    <option @if($admin->lang == $lang) selected @endif value="{{ $lang }}">@lang("zlang::main.lang.{$lang}")</option>
                @endforeach
            </select>
        </div>
        <div class="p-3">
            <label for="role">
                <span class="text-gray-700">@lang('Main Role') :</span>
            </label>
            <select class="solid-select w-full" name="role">
                @foreach ($roles as $role)
                    <option @if($admin->role_id == $role->id) selected @endif value="{{ $role->id }}">@lang($role->title)</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-full">
            <table class="w-full table-auto text-center mt-5 awesome-table text-sm">
                <thead class="text-white">
                    <tr>
                        <th>
                            <input type="checkbox" data-toggle-all-checkbox>
                        </th>
                        <th>@lang('Key')</th>
                        <th>@lang('Title')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="cursor-pointer trwithinput">
                            <th>
                                <input
                                    type="checkbox" 
                                    name="permissions[{{ $permission->id }}]" 
                                    value="{{ $permission->id }}"
                                    @if($admin->permissions->firstWhere('id', $permission->id)) checked @endif>
                            </th>
                            <td>{{ $permission->key }}</td>
                            <td>{{ $permission->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-span-full flex justify-center">
            <button type="submit" class="btn bg-emerald-500 text-white">@lang('Save')</button>
        </div>
    </form>
    @push('scripts')
    <script>
        $(() => {
            $('input[data-toggle-all-checkbox]').on('click', function(e) {
                let { checked } = e.target
                $('.trwithinput input[type="checkbox"]').prop("checked", checked)
            })
        })
    </script>
    @endpush
</x-zview-layout-default>