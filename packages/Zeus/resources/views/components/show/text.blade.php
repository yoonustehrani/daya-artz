<div class="p-1">
    <p class="text-md font-semibold text-gray-500 inline mr-2">@lang($row->title)</p>
    <p class="inline p-2 bg-gray-100 bg-opacity-50 leading-loose rounded-md whitespace-pre-wrap break-words {{ $attrs['copy'] ? 'copiable' : '' }}">{{ $value ?: 'unset' }}</p>
</div> 
