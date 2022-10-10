<x-zview-layout-default :title="__('zlang::modeltype.creating', ['name' => __($modeltype->name_singular)])">
    <h1 class="title">@lang('zlang::modeltype.creating', ['name' => __($modeltype->name_singular)])</h1>
    <form action="{{ route('zeus.'. $modeltype->slug .'.store', request()->query()) }}" autocomplete="off" id="zeus-standard-create-form" method="POST">
        @csrf
        @foreach ($modeltype->rows->groupBy('group') as $group_title => $rows)
        <x-zview::error-alerts />
        <div class="mt-1 p-0 w-full lg:w-3/4 {{ $group_title ? 'shadow-sm' : '' }}">
            @if ($group_title)
                <p class="bg-blue-yonder text-lg font-bold text-ghost-white p-3 rounded-r-xl rounded-tl-lg">{{ $group_title }}</p>
            @endif
            <div class="{{ $group_title ? 'px-3 py-5' : 'p-0' }} grid grid-cols-1 lg:grid-cols-2 grid-flow-row place-content-center gap-4">
            @foreach ($rows as $row)
                @if ($row->model_relation_id)
                <x-zview-relation-form-field :row="$row" :modeltype="$modeltype" method="create"/>
                @else
                <x-zview-form-field :row="$row" method="create"/>
                @endif
            @endforeach
            </div>
        </div>
        @endforeach
        @foreach (\ZeusPanel::getExtensions() as $ext)
            @php
                $ext = \ZeusPanel::getExtension($ext)->setMethod('create')->setModelType($modeltype)
            @endphp
            @if ($ext->shouldBeInjected())
                @component($ext->inject(), ['extension' => $ext]) @endcomponent
            @endif
        @endforeach
        <div class="px-3 mt-14 w-full flex items-center justify-start gap-4">
            <input type="hidden" name="__submit_type" value="save">
            @if (request()->has('after'))
                <button type="button" class="btn bg-blue-yonder-dark text-white" data-zeus-submit="save-and-after">
                    <i class="fas fa-undo-alt"></i> @lang('Save and go back')
                </button>
            @endif
            <button type="button" class="btn bg-blue-yonder-dark text-white" data-zeus-submit="save">
                <i class="fas fa-save"></i> @lang('Save')
            </button>
            <button type="button" class="btn bg-blue-yonder-dark text-white" data-zeus-submit="save-and-create">
                <i class="fas fa-plus"></i> @lang('Save and create another')
            </button>
            <button type="button" class="btn bg-blue-yonder-dark text-white" data-zeus-submit="save-and-edit">
                <i class="fas fa-pencil-alt"></i> @lang('Save and continue editing')
            </button>
        </div>
    </form>
    @push('scripts')
    <script>
    $('button[data-zeus-submit]').click(function() {
        $('input[name="__submit_type"]').val(this.getAttribute('data-zeus-submit'))
        $('form#zeus-standard-create-form').submit();
    })
    </script>
    @endpush
</x-zview-layout-default>