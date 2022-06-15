<x-zview-layout-default :title="__('Form Answer', ['id' =>$answer->id])">
    <h1 class="title mb-4">
        @lang('Form Answer', ['id' =>$answer->id])
        -
        (<a class="text-blue-400" href="{{ route('zeus.forms.show', ['id' => $answer->form_id]) }}">@lang('Form')</a>)
    </h1>
    <ul class="w-full md:w-1/2 my-4 bg-white shadow-md text-right list-inside list-disc p-3">
        <li><span class="font-bold">@lang('Name'):</span> {{ $answer->name }}</li>
        <li><span class="font-bold">IP:</span> {{ $answer->ip }}</li>
    </ul>
    @foreach ($answer->inputs as $input)
    <div class="w-full xl:w-2/3 text-right [direction:rtl] border-2 border-gray-600 shadow-md p-4 my-2">
        <p class="font-bold text-lg">{{ $loop->index + 1}}. {{ $input->label }}</p>
        <p class="p-2 mt-3">+ {{ in_array($input->type, ['text', 'textarea']) ? $input->answer_value : __("zlang::form.{$input->answer_value}") }}</p>
    </div>
    @endforeach
</x-zview-layout-default>