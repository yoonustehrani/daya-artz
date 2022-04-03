<table class="w-full table-auto text-left mt-4 awesome-table"> 
    <thead class="text-ghost-white-lighter text-center">
        <th>#</th>
        <th>Field</th>
        <th>Title</th>
        <th>Type</th>
        <th><i class="fas fa-eye"></i> Visibility</th>
        {{-- <th><i class="fas fa-database"></i> details</th> --}}
        <th><i class="fas fa-code"></i></th>
    </thead>
    @foreach ($rows->sortBy('order') as $index => $row)
    <tbody wire:key="user-field-{{ $row->id }}" class="row-green text-center">
        <tr class="row">
            <th>{{ $index + 1 }}</th>
            <td>{{ $row->field }}</td>
            <td>
                <input type="text" class="solid-input ml-2 mt-1" wire:model.defer="rows.{{ $index }}.title">
                <span class="error">
                    @error('rows.'.$index.'.title') {{ $message }} @enderror
                </span>
            </td>
            <td>
                <div>
                    <select class="solid-select w-full ml-2 mt-1" wire:model.defer="rows.{{ $index }}.type">
                        @foreach (\ZeusPanel::getDataTypes() as $type => $type_name)
                            <option value="{{ $type }}">{{ $type_name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <div class="w-full">
                        <label>
                            <span>Required: </span>
                        </label>
                        <select class="solid-select w-auto mt-1" wire:model.defer="rows.{{ $index }}.required">
                            <option value="">Off</option>
                            @foreach (\ZeusPanel::getRequiredTypes() as $type)
                                <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <br>
                    <input type="checkbox" wire:model.defer="rows.{{ $index }}.dynamic" id="checkbox_{{ $row->field }}_dynamic" class="mt-2 ml-2">
                    <label for="checkbox_{{ $row->field }}_dynamic">dynamic</label> --}}
                </div>
            </td>
            <td>
                <div class="grid grid-cols-1 xl:grid-cols-2 grid-flow-row place-content-center place-items-start gap-5">
                    @foreach ($v_options as $v)
                    <div>
                        <label for="checkbox_{{ $row->field . '_' . $v }}" class="flex items-start justify-start cursor-pointer relative">
                            <input type="checkbox" wire:model.defer="rows.{{ $index }}.{{ $v }}" id="checkbox_{{ $row->field . '_' . $v }}" class="sr-only">
                            <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                            <span class="ml-1 text-gray-900 text-sm font-medium">{{ $v }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </td>
            <td>
                <div class="flex items-center justify-center gap-2">
                    <div class="grid grid-cols-1">
                        @if (! $loop->first)
                            <i class="cursor-pointer mb-2 fas fa-angle-up" wire:click="move_up('{{ $row->id }}')"></i>
                        @endif
                        @if (! $loop->last)
                            <i class="cursor-pointer fas fa-angle-down" wire:click="move_down('{{ $row->id }}')"></i>
                        @endif
                    </div>
                    <span>{{ $row->order }}</span>
                    <button type="button" class="toggle-next-tr btn-sm inline bg-gray-700 text-white">
                        <i class="fas fa-list-ul"></i>
                    </button>
                    @if ($row->model_relation_id)
                        <button type="button" class="btn-sm inline bg-pink-500 text-white">
                            <i class="fas fa-link"></i>
                        </button>
                    @else
                        <button type="button" class="btn-sm inline bg-gray-200/50 text-pink-500">
                            <i class="fas fa-unlink"></i>
                        </button>
                    @endunless
                    <a href="{{ route('zeus.modelrows.edit', ['modelrow' => $row->id]) }}" class="btn-sm inline bg-emerald-500 text-white">
                        <i class="fas fa-cog"></i>
                    </a>
                    <button type="button" wire:click="remove_row('{{ $row->id }}')" class="btn-sm inline bg-salsa text-white">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        <tr class="extra hidden">
            <td><i class="fas fa-arrow-right"></i></td>
            {{-- <td colspan="2">
                <div class="ml-2">
                    <label for="{{ $row->field }}_json_details">
                        <span class="text-gray-700 italic">Details in json :</span>
                    </label>
                    <textarea wire:model.defer="rows.{{ $index }}.rawdetails" 
                    id="{{ $row->field }}_json_details" 
                    class="jsontext mt-3 w-full bg-blue-yonder-dark rounded-md p-3 text-yellow-300"
                    rows="3"
                    placeholder="// {}"></textarea>
                </div>
            </td> --}}
            <td>
                <label for="{{ $row->field }}_group">
                    <span class="text-gray-700 italic">group :</span>
                </label>
                <input type="text" class="solid-input w-auto ml-2 mt-1" wire:model.defer="rows.{{ $index }}.group" placeholder="Group" id="{{ $row->field }}_group">
            </td>
            <td>
                <label for="{{ $row->field }}_relation">
                    <span class="{{ $row->field }}_relation">Relation</span>
                    <select class="solid-select w-auto ml-2 mt-1" wire:model.defer="rows.{{ $index }}.model_relation_id">
                        <option value="">Select a relation</option>
                        @foreach ($relations as $item)
                            <option value="{{ $item->id }}">{{ $item->type }}=>{{ $item->local_method }}</option>
                        @endforeach
                    </select>
                </label>
            </td>
            <td>
                <label for="{{ $row->field }}_placeholder">
                    <span class="text-gray-700 italic">Placeholder :</span>
                </label>
                <input type="text" class="solid-input w-auto ml-2 mt-1" wire:model.defer="rows.{{ $index }}.placeholder" placeholder="Placeholder" id="{{ $row->field }}_placeholder">
            </td>
            <td>
                <label for="{{ $row->field }}_default_value">
                    <span class="text-gray-700 italic">Default Value :</span>
                </label>
                <input type="text" class="solid-input w-auto ml-2 mt-1" wire:model.defer="rows.{{ $index }}.default_value" placeholder="Default Value" id="{{ $row->field }}_default_value">
            </td>
        </tr>
        {{-- @endforeach --}}
    </tbody>       
    @endforeach
    <tbody>
    @foreach ($errors->all() as $err)
    <tr>
        <td>{{ $err }}</td>
    </tr>
    @endforeach
    </tbody>
    <tbody class="border-t border-gray-200" id="modeltype-add-row">
        <tr>
            <td>
                <i class="fas fa-plus"></i>
            </td>
            <td>
                <input type="text" class="solid-input mt-1" wire:model.defer="newrow.field" placeholder="Field">
            </td>
            <td>
                <input type="text" class="solid-input mt-1" wire:model.defer="newrow.title" placeholder="Title">
            </td>
            <td>
                <select class="solid-select w-auto mt-1" wire:model.defer="newrow.type">
                    <option>Select a type</option>
                    @foreach (\ZeusPanel::getDataTypes() as $type => $type_name)
                        <option value="{{ $type }}">{{ $type_name }}</option>
                    @endforeach
                </select>
                <br>
                <input type="checkbox" wire:model.defer="newrow.dynamic" id="checkbox__dynamic" class="mt-2 ml-2">
                <label for="checkbox__dynamic">dynamic</label>
            </td>
            <td>
                <div class="grid grid-cols-1 xl:grid-cols-2 grid-flow-row place-content-center place-items-start gap-5">
                    @foreach ($v_options as $v)
                    <div>
                        <label for="checkbox_{{ '_' . $v }}" class="flex items-start justify-start cursor-pointer relative">
                            <input type="checkbox" wire:model.defer="newrow.{{ $v }}" id="checkbox_{{ '_' . $v }}" class="sr-only">
                            <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                            <span class="ml-1 text-gray-900 text-sm font-medium">{{ $v }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </td>
            <td>
                <div class="flex items-center justify-center gap-1">
                    <button wire:click="add_row" class="btn text-sm bg-emerald-500 text-white">Add Row</button>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="7" class="text-right">
                <div class="flex flex-col justify-center items-center gap-3">
                    <div wire:loading.remove>
                        <button class="btn bg-blue-yonder text-ghost-white" type="button" wire:click="save">Save</button>
                    </div>
                    <div wire:loading.block>
                        <button class="btn bg-blue-yonder text-ghost-white" type="button" disabled>Saving ...</button>
                    </div>
                    @if (session()->has('message'))
                        <div id="livewire_flash_message" class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </td>
        </tr>
    </tbody>
</table>

