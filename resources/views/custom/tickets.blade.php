<x-zview-layout-default :title="__('Tickets')">
    <h1 class="title">@lang('Tickets')</h1>
    <div id="react-ticket-element"></div>
    @push('scripts')
        <script src="{{ asset('js/zeusTickets.js') }}"></script>
    @endpush
</x-zview-layout-default>