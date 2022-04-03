<div class="p-0 lg:col-span-2">
    <p class="bg-blue-yonder text-lg font-bold text-ghost-white p-3 rounded-r-xl rounded-tl-lg">@lang($row->title) :</p>
    @php
        $item_rows = $relation->getRelatedRows('create')->filter(fn($r) => ! in_array($r->field, $attrs['except']));
    @endphp
    {{-- <div class="px-0 py-5 grid grid-cols-1 lg:grid-cols-2 grid-flow-row place-content-center gap-4 bg-white">
        @foreach ($item_rows as $item)
        <x-zview-form-field :row="$item" :nameprefix="$relation->local_method.'[0]'"/>
        @endforeach
    </div> --}}
    <div zeus-relations>
        
    </div>
    <div zeus-create-inline-relation data-create-row="{{ route('api.zeus.'.$modeltype->slug.'.relations.create', ['row' => $row->getKey()]) }}"></div>
</div>