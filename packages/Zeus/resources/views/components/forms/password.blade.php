<div class="p-3 lg:col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-3">
    <label for="id_{{ $row->field }}" class="lg:col-span-2">
        <span class="text-gray-700 italic">@lang($row->title) {{ __('and') }} {{ __("Confirmation") }} : </span>
    </label>
    <div>
        <input type="password" class="ml-2 simple-input w-full password-input" name="{{ $row->field }}" id="id_{{ $row->field }}" placeholder="{{ $row->placeholder }}" {{ $required }}>
        <span class="float-right flex w-10 h-8 bg-transparent items-center justify-center -mt-9 mr-1 hover:cursor-pointer z-10 sticky show-password">
            <i class="fas fa-eye-slash"></i>
        </span>
    </div>
    <div>
        <input type="password" class="ml-2 simple-input w-full password-input" name="{{ $row->field }}_confirmation" id="id_{{ $row->field }}_c" placeholder="@lang('zlang::main.confirmation', ['field' => __($row->title)])" {{ $required }}>
        <span class="float-right flex w-10 h-8 bg-transparent items-center justify-center -mt-9 mr-1 hover:cursor-pointer z-10 sticky show-password">
            <i class="fas fa-eye-slash"></i>
        </span>
    </div>
    @error($attrs['name'])
    <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
        @foreach ($errors->get($attrs['name']) as $err)
        <li>{{ $err }}</li>
        @endforeach
    </ul>
    @enderror
</div>