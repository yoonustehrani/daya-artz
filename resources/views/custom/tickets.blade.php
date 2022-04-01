<x-zview-layout-default :title="__('Tickets')">
    <h1 class="title">@lang('Tickets')</h1>

    @push('scripts')
        <script>alert('hello')</script>
    @endpush
</x-zview-layout-default>