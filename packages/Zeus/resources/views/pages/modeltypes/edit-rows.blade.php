
        
        {{-- @foreach ($modeltype->rows as $row)
            <tr class="row">

            </tr> --}}
            {{-- <tr class="row">
                <th>{{ $loop->index + 1 }}</th>
                <td>{{ $row->field }}</td>
                <td>
                    <x-zview::forms.text-input :value="$row->title" name="fields[{{ $row->field }}][title]" placeholder="Field Title"/>
                </td>
                <td>
                    <div>
                        <select class="solid-select w-auto ml-2 mt-1" name="fields[{{ $row->field }}][type]">
                        @foreach (\ZeusPanel::getDataTypes() as $type => $type_name)
                            <option value="{{ $type }}" {{ $row->type == $type ? 'selected' : '' }}>{{ $type_name }}</option>
                        @endforeach
                        </select>
                        
                    </div>
                </td>
                <td class="grid grid-cols-1 md:grid-cols-2 grid-flow-row place-content-center place-items-start gap-5">
                @foreach (\ZeusPanel::getVisibilities() as $v)
                    <div>
                        <label for="checkbox_{{ $row->field . '_' . $v }}" class="flex items-start justify-start cursor-pointer relative">
                            <input type="checkbox" name="fields[{{ $row->field }}][visibility][{{ $v }}]" {{ $row->{$v} ? 'checked' : '' }}
                            id="checkbox_{{ $row->field . '_' . $v }}" class="sr-only">
                            <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                            <span class="ml-1 text-gray-900 text-sm font-medium">{{ $v }}</span>
                        </label>
                    </div>
                @endforeach
                </td>
                <td class="text-sm text-left italic pl-3 md:pl-0">
                @if (isset($columns[$row->field]))
                    @if ($columns[$row->field]['primary'])
                        <span><i class="fas fa-key text-blue-500"></i> primary</span><br>
                    @endif
                    @if ($columns[$row->field]['autoincrement'])
                        <span><i class="fas fa-cog text-yellow-500"></i> auto</span><br>
                    @endif
                    @if ($columns[$row->field]['notnull'])
                        <span><i class="fas fa-exclamation-triangle text-salsa"></i> required</span><br>
                    @endif
                    @if ($columns[$row->field]['unique'])
                        <span><i class="fas fa-fingerprint text-spring-green-dark"></i> unique</span>
                    @endif
                @endif
                </td>
                <td class="flex items-center justify-center gap-1">
                    <button type="button" class="toggle-next-tr btn-sm inline bg-gray-700 text-white">
                        <i class="fas fa-list-ul"></i>
                    </button>
                    <button type="button" class="delete-row-btn btn-sm inline bg-salsa text-white"><i class="fas fa-trash"></i></button>
                </td>
            </tr> --}}
            {{-- <tr class="extra hidden border-2 border-t-0">
                <td colspan="3">
                    <div class="ml-2">
                        <label for="json_details">
                            <span class="text-gray-700 italic">Details in json :</span>
                        </label>
                        <textarea name="fields[{{ $row->field }}][details]" id="{{ $row->field }}_json_details" class="jsontext mt-3 w-full bg-blue-yonder-dark rounded-md p-3 text-yellow-300" rows="3" 
                        placeholder="// {}">{{ $row->details ? json_encode($row->details) : '' }}</textarea>
                    </div>
                </td> 
                <td>
                    <x-zview::forms.text-input :value="$row->placeholder" name="fields[{{ $row->field }}][placeholder]" label="Placeholder" placeholder="Placeholder for this field"/>
                </td>
                <td>
                    <x-zview::forms.text-input :value="$row->default_value" name="fields[{{ $row->field }}][default_value]" label="Default" placeholder="Default Value"/>
                </td>
            </tr> --}}
        {{-- @endforeach --}}
        </tbody>
    </table>
</div>