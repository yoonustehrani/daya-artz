<div class="p-1">
    <p class="text-md font-semibold text-gray-500 my-1 inline mr-2">@lang($row->title)</p>
    <p class="inline p-2 bg-gray-100 bg-opacity-50 rounded-md {{ $attrs['copy'] ? 'copiable' : '' }}">
        <i class="far fa-calendar"></i>
        {{ jalali_date_should_be_used() ? jdate($value)->format('%e %B %Y') : $value->format('Y-m-d') }}
        @if ($row->type == 'datetime')
        <i class="mx-1 far fa-clock"></i>
        {{ $value->format('H:i:s') }}
        @endif
    </p>
    <p class="mt-3 md:mt-0 block md:inline mx-2 p-2 pill text-sm bg-gray-100 bg-opacity-50">
        {{ $value->diffForHumans() }}
    </p>
</div>
{{-- {{ 
$row->type == 'date' 
? $value->diffForHumans(['syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE])
: $value->diffForHumans() 
}} --}}