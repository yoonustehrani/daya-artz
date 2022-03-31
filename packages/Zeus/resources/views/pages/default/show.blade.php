<x-zview-layout-default :title="__('zlang::modeltype.details', ['name' => __($modeltype->name_singular) . '('. ($data->as_text ?: $data->getKey()) .')'])">
    <div class="w-full flex justify-start gap-2 mb-8">
        <h1 class="title">@lang('zlang::modeltype.details', ['name' => __($modeltype->name_singular) . '('. ($data->as_text ?: $data->getKey()) .')'])</h1>
        <a class="btn-sm bg-blue-500 text-ghost-white" href="{{ route('zeus.'.$modeltype->slug.'.edit', ['id' => $data->getKey()]) }}"><i class="fas fa-pencil-alt"></i></a>
        <form action="{{ route('zeus.'.$modeltype->slug.'.destroy', ['id' => $data->getKey()]) }}" method="post">
            <button type="submit" class="btn-sm bg-salsa text-ghost-white">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
    @foreach ($modeltype->view_rows->groupBy('group') as $group_title => $rows)
        @if ($group_title)
        <p class="bg-gray-700 text-lg font-bold text-ghost-white p-3 rounded-t-lg w-full lg:w-3/4">{{ $group_title }}</p>
        @endif
        <div class="mb-4 py-2 px-6 w-full lg:w-3/4 bg-white shadow-md rounded-md">
            <div class="{{ $group_title ? 'px-3' : 'px-0' }} py-5 grid grid-cols-1 grid-flow-row place-content-center gap-4">
            @foreach ($rows as $row)
                <x-zview-view-data :row="$row" :data="$data" />
                @unless ($loop->last) <hr> @endunless
                {{-- @if ($row->relation)
                    @if (in_array($row->relation->type, ['belongsTo', 'hasOne', 'morphOne']))
                        <x-zview-view-data :row="$row" :data="$data" />
                        @unless ($loop->last) <hr> @endunless
                    @endif
                @else
                    <x-zview-view-data :row="$row" :data="$data" />
                    @unless ($loop->last) <hr> @endunless
                @endif --}}
            @endforeach
            </div>
        </div>
    @endforeach
    {{-- @foreach ($modeltype->multi_side as $relation)
        <p class="bg-gray-700 text-lg font-bold text-ghost-white p-3 rounded-t-lg w-full lg:w-3/4">{{ $relation->title }}</p>
        <div react-multi-side></div>
    @endforeach --}}
</x-zview-layout-default>