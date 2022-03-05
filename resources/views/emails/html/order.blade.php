@component('emails.layout')
    @slot('title')
        <p class="rtl content-title text-purple">@lang('messages.email.order')</p>
    @endslot
    @slot('header')
        <h1 class="rtl header-title text-white">@lang('messages.email.order')</h1>
    @endslot
@endcomponent