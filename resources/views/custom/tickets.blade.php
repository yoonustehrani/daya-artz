<x-zview-layout-default :title="__('Tickets')">
    <h1 class="title">@lang('Tickets')</h1>
    <div 
        id="react-ticket-element"
        class="h-[calc(100%-36px)] pt-4"
        data-departments="{{ route('api.zeus.custom.tickets.departments') }}"
        data-tickets="{{ route('api.zeus.custom.tickets.index', ['department' => 'departmentId']) }}"
        data-ticket="{{ route('api.zeus.custom.tickets.show', ['ticket' => 'ticketId']) }}"
        data-message="{{ route('api.zeus.custom.tickets.message', ['ticket' => 'ticketId']) }}"></div>
    @push('scripts')
        <script src="{{ asset('js/zeusTickets.js') }}"></script>
    @endpush
</x-zview-layout-default>