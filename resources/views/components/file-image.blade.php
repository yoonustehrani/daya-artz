<img src="{{ asset($path) }}" 
@foreach (json_decode($details) as $key => $value)
{{ $key }}="{{ $value }}"
@endforeach>