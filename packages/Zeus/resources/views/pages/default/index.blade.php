<x-zview-layout-default :title="__('zlang::modeltype.browse', ['name' => __($modeltype->name_plural)])">
    @php
        $setting = [
            'order_dir' => request()->query('order_dir') === 'asc' ? 'desc' : 'asc',
        ];
        function orderable($row) {
            return ! in_array($row->type, ['file']);
        }
    @endphp
    @unless ($trash)
        <h1 class="title">@lang('zlang::modeltype.browse', ['name' => __($modeltype->name_plural)])
            @can('create-zeus-model', [$modeltype->getModel(), $modeltype->slug])
            <a class="btn bg-blue-yonder text-ghost-white text-sm" href="{{ $modeltype->get_route('create') }}">
                <i class="fas fa-plus mr-2"></i>
                @lang('zlang::modeltype.create', ['name' => __($modeltype->name_singular)])
            </a>
            @endcan
            @if ($modeltype->soft_delete)
            <a class="btn bg-red-ryb text-ghost-white text-sm" href="{{ $modeltype->get_route('trash') }}"><i class="fas fa-trash mr-2"></i>Trash</a>
            @endif
        </h1>
        @isset($related)
            <p class="mt-4 ml-2 text-lg">
                <i class="fas fa-link"></i>
                @lang('zlang::modeltype.related-to')
                <a class="text-blue-400 underline underline-offset-4" href="{{ $related->__path__ }}">{{ $related->as_text ?: $related->getKey() }}</a>
            </p>
        @endisset
    @else
        <h1 class="title">Trash(@lang($modeltype->name_plural))
            <a class="btn bg-blue-yonder text-ghost-white text-sm" href="{{ $modeltype->get_route('index') }}">Back to list</a>
        </h1>
    @endunless
    <div class="w-full p-4">
        <x-zview::search :modeltype="$modeltype"/>
        <x-zview::query-filters />
        <div class="w-full overflow-y-auto">
            <table class="w-full table-auto text-center mt-5 awesome-table text-sm">
                <thead class="text-white">
                    <th scope="col"><i class="fas fa-hashtag"></i></th>
                    @foreach ($modeltype->rows as $row)
                    <th scope="col">
                        @if (orderable($row))
                        <a href="{{ request()->fullUrlWithQuery(['order_by' => $row->field, 'order_dir' => $setting['order_dir']]) }}">
                            @if (request()->query('order_by') === $row->field)
                            <i class="fas fa-{{ request()->query('order_dir') === 'asc' ? 'sort-amount-down' : 'sort-amount-up-alt' }}"></i>
                            @endif
                            @lang($row->title)
                        </a>
                        @else
                        <p>@lang($row->title) @if ($row->relation) <i class="fas fa-link inline"></i> @endif</p>
                        @endif
                    </th>
                    @endforeach
                    <th scope="col"><i class="fas fa-server mr-2"></i>Actions</th>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">
                            <div class="flex justify-center">
                                <span class="bg-mango-light rounded-full h-8 w-8 flex items-center justify-center">{{ $loop->index + 1 }}</span>
                            </div>
                        </td>
                        @foreach ($modeltype->rows as $row)
                            @if ($row->relation)
                                <x-zview-index-relation :row="$row" :item="$item" :modeltype="$modeltype" :slug="$modeltype->slug"/>
                            @else
                                <x-zview-index-data :row="$row" :value="$item->{$row->field}"/>
                            @endif
                        @endforeach
                        <td class="grid grid-rows-2 lg:grid-rows-1 grid-flow-col gap-4 xl:gap-2 justify-items-center">
                            @includeWhen(! $trash, 'zview::pages.default.includes.index-actions')
                            @includeWhen($trash, 'zview::pages.default.includes.trash-actions')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if ($modeltype->pagination)
        <div class="w-full p-3 mt-5">
            {!! $data->links() !!}
        </div>
        @elseif($data->count() > 0)
        <p class="w-full md:w-2/4 mt-5 font-semibol">
            <i class="fas fa-exclamation-triangle fa-2x text-salsa float-left mx-2"></i>
            @lang('zlang::main.messages.pagination-limit')
            <a class="underline" href="{{ route('zeus.modeltypes.edit', ['modeltype' => $modeltype->getKey()]) }}">{{ $modeltype->name_singular }} modeltype</a>.
        </p>
        @endif
    </div>
</x-zview-layout-default>