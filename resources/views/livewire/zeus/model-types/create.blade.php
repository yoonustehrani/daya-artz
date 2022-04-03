<div class="w-full bg-white p-4 mt-5 shadow-md">
    <p class="text-2xl italic">+ Rows</p>
    <table class="w-full table-auto text-left mt-4 awesome-table overflow-auto">
        <thead class="text-ghost-white-lighter">
            <th>#</th>
            <th>Field</th>
            <th>Title</th>
            <th>Type</th>
            <th class="text-center"><i class="fas fa-eye"></i> Visibility</th>
            <th class="text-center"><i class="fas fa-code"></i></th>
        </thead>
        <tbody class="row-green">
        @foreach ($rows as $row)
            <tr class="row">
                <th>{{ $loop->index + 1 }}</th>
                <td>{{ $row['field'] }}</td>
                <td>
                    <x-zview::forms.text-input :value="$row['title']" name="fields[{{ $row['field'] }}][title]" placeholder="Field Title"/>
                </td>
                <td>
                    <select class="solid-select w-full ml-2 mt-1" name="fields[{{ $row['field'] }}][type]">
                        @foreach (\ZeusPanel::getDataTypes() as $type => $type_name)
                            <option value="{{ $type }}" {{ $row['type'] == $type ? 'selected' : '' }}>{{ $type_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <div class="grid grid-cols-1 md:grid-cols-2 grid-flow-row place-content-center place-items-start">
                    @foreach ($v_options as $v)
                        <div>
                            <label for="checkbox_{{ $row['field'] . '_' . $v }}" class="flex items-center cursor-pointer relative mb-4">
                                <input type="checkbox" name="fields[{{ $row['field'] }}][visibility][{{ $v }}]" {{ $row[$v] ? 'checked' : '' }}
                                id="checkbox_{{ $row['field'] . '_' . $v }}" class="sr-only">
                                <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                                <span class="ml-1 text-gray-900 text-sm font-medium">{{ $v }}</span>
                            </label>
                        </div>
                    @endforeach
                    </div>
                </td>
                <td>
                    <div class="flex items-center justify-center gap-1">
                        <button type="button" class="toggle-next-tr btn-sm inline bg-gray-700 text-white">
                            <i class="fas fa-list-ul"></i>
                        </button>
                        <button type="button" wire:click="remove_row('{{ $row['key'] }}')"
                        class="delete-row-btn btn-sm inline bg-salsa text-white"><i class="fas fa-trash"></i></button>
                    </div>
                </td>
            </tr>
            <tr wire:key="{{ $row['key'] }}" class="extra hidden border-2 border-t-0">
                <td colspan="3">
                    <div class="ml-2">
                        <label for="json_details">
                            <span class="text-gray-700 italic">Details in json :</span>
                        </label>
                        <textarea name="fields[{{ $row['field'] }}][details]" id="{{ $row['field'] }}_json_details" class="jsontext mt-3 w-full bg-blue-yonder-dark rounded-md p-3 text-yellow-300" rows="3" 
                        placeholder="// {}">{{ $row['details'] ? json_encode($row['details']) : null }}</textarea>
                    </div>
                </td> 
                <td>
                    <x-zview::forms.text-input name="fields[{{ $row['field'] }}][placeholder]" label="Placeholder" placeholder="Placeholder for this field"/>
                </td>
                <td>
                    <x-zview::forms.text-input name="fields[{{ $row['field'] }}][default_value]" label="Default" placeholder="Default Value"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    <div class="w-full flex items-center justify-start gap-2 my-3">
        <input type="text" wire:keydown.enter.prevent="add_row" wire:model.defer="field_name" class="mt-1 ml-2 simple-input inline">
        <button wire:click="add_row" class="btn bg-emerald-300 inline" type="button"><i class="fas fa-plus"></i> Add new</button>
    </div>
</div>
