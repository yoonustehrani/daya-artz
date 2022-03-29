<x-zview-layout-default :title="__('zlang::modeltype.editing', ['name' => __($modeltype->name_singular)])">
<h1 class="title">@lang('zlang::modeltype.editing', ['name' => __($modeltype->name_singular)]) #{{ $data->getKey() }}</h1>
<form action="{{ route('zeus.'. $modeltype->slug .'.update', ['id' => $data->getKey()]) }}" method="post">
    @csrf
    @method('PUT')
    @foreach ($modeltype->rows->groupBy('group') as $group_title => $rows)
    <div class="mt-4 p-0 w-full lg:w-3/4 {{ $group_title ? 'shadow-sm' : '' }}">
        @if ($group_title)
            <p class="bg-blue-yonder text-lg font-bold text-ghost-white p-3 rounded-r-xl rounded-tl-lg">{{ $group_title }}</p>
        @endif
        <div class="{{ $group_title ? 'px-3' : 'px-0' }} py-5 grid grid-cols-1 lg:grid-cols-2 grid-flow-row place-content-center gap-4">
            @foreach ($rows as $row)
                @if ($row->relation)
                    <x-zview-relation-form-field :row="$row" :data="$data" :modeltype="$modeltype"/>
                @else
                    <x-zview-form-field :row="$row" :value="$data->{$row->field}"/>
                @endif
            @endforeach
        </div>
    </div>
    @endforeach
    @foreach (\ZeusPanel::getExtensions() as $ext)
        @php
            $ext = \ZeusPanel::getExtension($ext)->setMethod('edit')->setModelType($modeltype)
        @endphp
        @if ($ext->shouldBeInjected())
            @component($ext->inject(), ['extension' => $ext, 'data' => $data]) @endcomponent
        @endif
    @endforeach
    <div class="p-3 mt-14 w-full lg:w-3/4 flex items-center justify-center">
        <button type="submit" class="btn bg-emerald-500 text-white">@lang('Update')</button>
    </div>
</form>
</x-zview-layout-default>