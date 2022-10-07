<td class="truncate text-sm">
    @if ($row->type === 'datetime')
        <span>{{ $value->diffForHumans() }}</span>
        <br>
        <span>
        {{ jalali_date_should_be_used() ? jdate($value)->format('%Y/%m/%d') : $value->format('Y-m-d') }}
        {{ $value->format('H:i:s') }}
        </span>
    @else
        <span>{{ $value->format('Y-m-d') }}</span>
    @endif 
</td>