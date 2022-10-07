<x-zview-layout-default title="files gallery">
    <h1 class="title">@lang('Gallery')</h1>
    <div id="react-files"
        data-file="{{ route('api.zeus.files.show', ['file' => 'fileId']) }}"
        data-upload="{{ route('api.zeus.files.store') }}"
        data-search="{{ route('api.zeus.files.index') }}"></div>
    {{-- @push('scripts')
    <script>
        APP_PATH = "{{ asset('/') }}"
    </script>
    <script src="{{ asset('js/zeus/react-files.js') }}"></script>
    @endpush --}}
</x-zview-layout-default>