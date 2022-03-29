<x-zview-layout-default :title="__('zlang::modeltype.creating', ['name' => trans_choice('zlang::auth.admin', 1)])">
    <div>
        <x-zview::error-alerts />
    </div>
    <form action="{{ route('zeus.admins.store') }}" method="post" class="w-100 xl:w-3/4 grid grid-cols-2 gap-4">
        @csrf
        <div class="p-3">
            <label for="">
                <span class="text-gray-700">@lang('Username') :</span>
            </label>
            <input type="text" class="solid-input w-full" name="name">
        </div>
        <div class="p-3">
            <label for="email">
                <span class="text-gray-700">@lang('Email') :</span>
            </label>
            <input type="text" class="solid-input w-full" name="email" id="email">
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
            <input type="text" class="solid-input w-full" name="first_name">
        </div>
        <div class="p-3">
            <label for="">
                <span class="text-gray-700">@lang('Lastname') :</span>
            </label>
            <input type="text" class="solid-input w-full" name="last_name">
        </div>
        <div class="p-3">
            <label for="lang">
                <span class="text-gray-700">@lang('Language') :</span>
            </label>
            <select class="solid-input w-full" name="lang">
                @foreach (['en', 'fa'] as $lang)
                    <option value="{{ $lang }}">@lang("zlang::main.lang.{$lang}")</option>
                @endforeach
            </select>
        </div>
        <div class="p-3">
            <label for="role">
                <span class="text-gray-700">@lang('Main Role') :</span>
            </label>
            <select class="solid-input w-full" name="role">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">@lang($role->title)</option>
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
                                <input type="checkbox" name="permissions[{{ $permission->id }}]" value="{{ $permission->id }}">
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
        
        // $('.checktheinput').click(function() {
        //     let checkbox = $(' input[type="checkbox"]', this)
        //     if (checkbox) {
        //         checkbox.prop("checked", !checkbox.prop("checked"));
        //     }
        // })
    </script>
    @endpush
</x-zview-layout-default>