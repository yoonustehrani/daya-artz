<div class="w-full bg-white p-4 mt-5 shadow-md">
    <p class="text-2xl italic">+ Rows</p>
    <table class="w-full table-auto text-left mt-4 awesome-table overflow-auto">
        <thead class="text-ghost-white-lighter">
            <th>#</th>
            <th>Field</th>
            <th>Title</th>
            <th>Type</th>
            <th><i class="fas fa-database"></i> details</th>
            <th class="text-center"><i class="fas fa-eye"></i> Visibility</th>
            <th class="text-center"><i class="fas fa-code"></i></th>
        </thead>
        <tbody class="row-green">
        @foreach ($columns as $col)
            <tr class="row">
                <th>{{ $loop->index + 1 }}</th>
                <td>{{ $col['name'] }}</td>
                <td>
                    <x-zview::forms.text-input :value="\Str::ucfirst(str_replace('_', ' ', $col['name']))" name="fields[{{ $col['name'] }}][title]" placeholder="Field Title"/>
                </td>
                <td>
                    <select class="solid-select w-full ml-2 mt-1" name="fields[{{ $col['name'] }}][type]">
                    @foreach (\ZeusPanel::getDataTypes() as $type => $type_name)
                        <option value="{{ $type }}" {{ $col['input_type'] == $type ? 'selected' : '' }}>{{ $type_name }}</option>
                    @endforeach
                    </select>
                    <div class="w-full ml-2 mt-1">
                        <label for="fields[{{ $col['name'] }}][required]_id">
                            <span class="text-gray-700 italic">Required :</span>
                        </label>
                        <select class="solid-select" name="fields[{{ $col['name'] }}][required]" id="fields[{{ $col['name'] }}][required]_id">
                            @foreach (['off','create', 'edit', 'both'] as $item)
                                <option value="{{ $item }}">{{ ucfirst($item) }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <input type="checkbox" name="fields[{{ $col['name'] }}][dynamic]" id="checkbox_{{ $col['name'] }}_dynamic" class="mt-2 ml-2">
                    <label for="checkbox_{{ $col['name'] }}_dynamic">dynamic</label> --}}
                </td>
                <td class="text-sm text-left italic">
                    @if ($col['primary'])
                        <span><i class="fas fa-key text-blue-500"></i> primary</span><br>
                    @endif
                    @if ($col['autoincrement'])
                        <span><i class="fas fa-cog text-yellow-500"></i> auto</span><br>
                    @endif
                    @if ($col['notnull'])
                        <span><i class="fas fa-exclamation-triangle text-salsa"></i> required</span><br>
                    @endif
                    @if ($col['unique'])
                        <span><i class="fas fa-fingerprint text-spring-green-dark"></i> unique</span>
                    @endif
                </td>
                <td class="grid grid-cols-1 md:grid-cols-2 grid-flow-row place-content-center place-items-start">
                @foreach (\ZeusPanel::getVisibilities() as $v)
                    <div>
                        <label for="checkbox_{{ $col['name'] . '_' . $v }}" class="flex items-center cursor-pointer relative mb-4">
                            <input type="checkbox" name="fields[{{ $col['name'] }}][visibility][{{ $v }}]" {{ $col['visibilities'][$v] ? 'checked' : '' }}
                            id="checkbox_{{ $col['name'] . '_' . $v }}" class="sr-only">
                            <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                            <span class="ml-1 text-gray-900 text-sm font-medium">{{ $v }}</span>
                        </label>
                    </div>
                @endforeach
                </td>
                <td class="text-center">
                    <i class="fas fa-list-ul p-3 btn cursor-pointer"></i>
                </td>
            </tr>
            <tr class="extra hidden border-2 border-t-0"> 
                <td colspan="3">
                    <div class="ml-2">
                        <label for="json_details">
                            <span class="text-gray-700 italic">Details in json :</span>
                        </label>
                        <textarea name="fields[{{ $col['name'] }}][details]" id="{{ $col['name'] }}_json_details" class="jsontext mt-3 w-full bg-blue-yonder-dark rounded-md p-3 text-yellow-300" rows="3" 
                        placeholder="// {}">{{ isset($col['details']) ? json_encode($col['details']) : '' }}</textarea>
                    </div>
                </td> 
                <td>
                    <x-zview::forms.text-input :value="null" name="fields[{{ $col['name'] }}][placeholder]" label="Placeholder" placeholder="Placeholder for this field"/>
                </td>
                <td>
                    <x-zview::forms.text-input :value="null" name="fields[{{ $col['name'] }}][default_value]" label="Default" placeholder="Default Value"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>