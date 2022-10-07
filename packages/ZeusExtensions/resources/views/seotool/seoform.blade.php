@php
    $seo_data = isset($data) ? $data->seo_settings()->first() : [];
    $seo_data = optional($seo_data);
@endphp
<div class="p-3 w-100">
    <div class="w-100 p-3 bg-white shadow-md">
        <p class="title">@lang('SEO Settings')</p>
        <div class="p-2 mt-3">
            <p class="text-2xl">@lang('Google Preview')</p>
            <div class="m-3">
                {{-- <p class="text-sm">{{ asset('/') }} <span class="text-gray-600"> › breadcrumb</span></p> --}}
                <p class="text-xl"><a class="text-blue-600" id="seo_page_title" href="#page_link"></a></p>
                <p class="text-gray-700 text-sm" id="seo_meta_description" style="width: 600px; max-width: 100%; word-break: break-word;"></p>
            </div>
            <div class="w-full xl:w-1/3">
                <div class="mt-3 w-full">
                    <label for="_{{ $extension->getName() }}_meta_description">
                        <span class="text-gray-700">@lang('Meta Description') : 120~156</span>
                    </label>
                    <textarea name="{{ $extension->getName() }}[meta_description]" rows="2"
                        class="solid-input w-full mt-1 ml-2"
                        id="_{{ $extension->getName() }}_meta_description"
                    >{{ old($extension->getName().'.meta_description') ?: $seo_data->description}}</textarea>
                </div>
                <div class="mt-3 w-full full-input">
                    <label for="_{{ $extension->getName() }}_primary_keyword">
                        <span class="text-gray-700">@lang('Primary keyphrase') :</span>
                    </label>
                    <input type="text" class="solid-input mt-1 ml-2" 
                        name="{{ $extension->getName() }}[primary_keyword]"
                        id="_{{ $extension->getName() }}_primary_keyword"
                        value="{{ old($extension->getName().'.primary_keyword') ?: $seo_data->primary_keyword }}">
                </div>
                <div class="mt-3 w-full full-input">
                    <label for="_{{ $extension->getName() }}_meta_robots">
                        <span class="text-gray-700">@lang('Robots') :</span>
                    </label>
                    <select name="{{ $extension->getName() }}[meta_robots][]" multiple class="w-full solid-input" id="_{{ $extension->getName() }}_meta_robots">
                        @foreach ($extension::META_ROBOTS as $robot)
                            <option @if(is_array($seo_data->robots) && in_array($robot, $seo_data->robots)) selected @endif value="{{ $robot }}">{{ \Str::ucfirst($robot) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(() => {
            $("textarea#_{{ $extension->getName() }}_meta_description").on('keyup', function(e) {
                let {value} = e.target
                $('#seo_meta_description').text(value)
                if (value.length < 120 || value.length > 156) {
                    e.target.style.borderColor = 'red'
                } else {
                    e.target.style.borderColor = 'green'
                }
            })
            $('input[name="title"]').on('change', function(e) {
                $('#seo_page_title').text(e.target.value)
            })
        })
    </script>
    @endpush
</div>