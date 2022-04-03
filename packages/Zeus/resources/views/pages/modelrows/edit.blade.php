<x-zview-layout-default :title="__('zlang::modeltype.rows.editing', ['title' => $row->title])">
    <h1 class="title">@lang('zlang::modeltype.rows.editing', ['title' => $row->title])</h1>
    <h2 class="ml-2 underline">
        <a href="{{ route('zeus.modeltypes.edit', ['modeltype' => $modeltype->id]) }}">
            @lang('zlang::main.modeltype-title', ['title' => $modeltype->name_plural])
        </a>
    </h2>
    <form action="{{ route('zeus.modelrows.update', ['modelrow' => $row->getKey()]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mt-4 p-0 w-full lg:w-3/4">
            <div class="grid grid-cols-1 lg:grid-cols-2 grid-flow-row place-content-center gap-4">
                <div class="p-3">
                    <label for="title">
                        <span class="text-gray-700 italic">Title :</span>
                    </label>
                    <input type="text" id="title" name="title" class="w-full ml-2 mt-1 simple-input" value="{{ old('title') ?: $row->title }}">
                </div>
                <div class="p-3">
                    <label for="group">
                        <span class="text-gray-700 italic">Group :</span>
                    </label>
                    <input type="text" id="group" name="group" class="w-full ml-2 mt-1 simple-input" value="{{ old('group') ?: $row->group }}">
                </div>
                <div class="p-3">
                    <label for="parent">
                        <span class="text-gray-700 italic">Parent row :</span>
                    </label>
                    <select class="mt-1 ml-2 w-full simple-select" name="parent" id="parent">
                        <option value="">- None -</option>
                        @foreach ($modeltype->rows as $item)
                            <option @if($row->parent_id === $item->id) selected @endif value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-3">
                    <label for="type">
                        <span class="text-gray-700 italic">Type :</span>
                    </label>
                    <select class="mt-1 ml-2 w-full simple-select" id="type" name="type">
                        @foreach (\ZeusPanel::getDataTypes() as $type => $type_name)
                            <option @if($row->type === $type) selected @endif value="{{ $type }}">{{ $type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-3">
                    <label for="required">
                        <span class="text-gray-700 italic">Required :</span>
                    </label>
                    <select class="mt-1 ml-2 w-full simple-select" id="required" name="required">
                        <option value="">Off</option>
                        @foreach (\ZeusPanel::getRequiredTypes() as $type)
                            <option @if($row->required === $type) selected @endif value="{{ $type }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-3">
                    <label for="order">
                        <span class="text-gray-700 italic">Order :</span>
                    </label>
                    <input type="number" id="order" name="order" step="1" min="0" class="w-full ml-2 mt-1 simple-input" value="{{ old('order') ?: $row->order }}">
                </div>
                <div class="p-3">
                    <label for="default_value">
                        <span class="text-gray-700 italic">Default Value :</span>
                    </label>
                    <input type="text" id="default_value" name="default_value" class="w-full ml-2 mt-1 simple-input" value="{{ old('default_value') ?: $row->default_value }}">
                </div>
                <div class="p-3">
                    <label for="placeholder">
                        <span class="text-gray-700 italic">Placeholder :</span>
                    </label>
                    <input type="text" id="placeholder" name="placeholder" class="w-full ml-2 mt-1 simple-input" value="{{ old('placeholder') ?: $row->placeholder }}">
                </div>
                <div class="p-3">
                    <label for="json_details">
                        <span class="text-gray-700 italic">Details in json :</span>
                    </label>
                    <textarea name="details" id="json_details" class="jsontext mt-3 w-full bg-blue-yonder-dark rounded-md p-3 text-yellow-300" rows="12" 
                    placeholder="// {}">{{ old('details') ?: json_encode($row->details, JSON_PRETTY_PRINT) }}</textarea>
                </div>
            </div>
        </div>
        <div class="p-3 mt-14 w-full lg:w-3/4 flex items-center justify-center">
            <button type="submit" class="btn bg-emerald-500 text-white">Update</button>
        </div> 
    </form>
</x-zview-layout-default>