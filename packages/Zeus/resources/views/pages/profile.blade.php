<x-zview-layout-default title="{{ __('zlang::auth.profile') }}">
    <h1 class="title mb-4">@lang('zlang::auth.profile')</h1>
    <div class="container flex justify-between flex-wrap flex-row items-stretch">
        <div class="w-full lg:w-1/4 p-2">
            <div class="bg-white shadow-md rounded p-4 h-full flex flex-col justify-center items-center">
                @if ($user->avatar)
                <img src="{{ asset($user->avatar) }}" alt="profile-photo" class="aspect-square w-36 rounded-full mb-5 p-0.5 border-2 border-sky-900">
                @endif
                <span class="text-icon mb-2 text-gray-800"><i class="fas fa-user text-gray-800 mr-2"></i> {{ $user->name }}</span>
                <span class="text-icon mb-5 text-gray-800"><i class="fas fa-envelope text-gray-800 mr-2"></i> {{ $user->email }}</span>
                <form action="{{ route('zeus.auth.profile.update.avatar') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" id="id_avatar" name="avatar" value="{{ $user->avatar }}">
                    <div class="flex">
                        <div 
                            class="react-file-picker m-2"
                            data-upload="{{ route('api.zeus.files.store') }}"
                            data-search="{{ route('api.zeus.files.index') }}"
                            data-set-to="id_avatar"
                        ></div>
                        <div class="flex align-middle p-3">
                            <button class="rounded-full text-white bg-sky-400 w-fit px-4 py-2 hover:bg-sky-600 duration-500">update photo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full full-input lg:w-3/4 p-2">
            <div class="bg-white shadow-md rounded p-4 h-full">
                <h2 class="font-bold text-xl mb-4">@lang('Authentication')</h2>
                <form action="{{ route('zeus.auth.profile.update.auth') }}" method="post" class="container flex flex-wrap justify-start items-start">
                    @csrf
                    @method('PATCH')
                    <div class="w-fit md:w-2/5 mb-5 md:mx-4">
                        <p class="text-gray-500 text-md mb-2">@lang('Username')</p>
                        <input type="text" name="name" class="simple-input ml-3" value="{{ $user->name }}">
                        @error('name')
                        <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
                            @foreach ($errors->get('name') as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        @enderror
                    </div>
                    <div class="w-fit md:w-2/5 mb-5 md:mx-4">
                        <p class="text-gray-500 text-md mb-2">@lang('Email')</p>
                        <input type="email" name="email" class="simple-input ml-3" value="{{ $user->email }}">
                        @error('email')
                        <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
                            @foreach ($errors->get('email') as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        @enderror
                    </div>
                    <div class="w-fit md:w-2/5 mb-5 md:mx-4">
                        <p class="text-gray-500 text-md mb-2">@lang('Password')</p>
                        <input type="password" name="password" class="simple-input ml-3">
                        @error('password')
                        <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
                            @foreach ($errors->get('password') as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        @enderror
                    </div>
                    <div class="w-fit md:w-2/5 mb-5 md:mx-4">
                        <p class="text-gray-500 text-md mb-2">@lang("Confirmation")</p>
                        <input type="password" name="password_confirmation" class="simple-input ml-3">
                        @error('first_name')
                        <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
                            @foreach ($errors->get('first_name') as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        @enderror
                    </div>
                    <div class="w-full mt-2 text-center md:text-left">
                        <button type="submit" class="rounded text-white bg-sky-400 w-fit px-8 py-2 hover:bg-sky-600 duration-500">apply</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full full-input lg:w-1/2 p-2">
            <div class="bg-white shadow-md rounded p-4 h-full">
                <h2 class="font-bold text-xl mb-4">Personal</h2>
                <form action="{{ route('zeus.auth.profile.update') }}" method="post" class="container flex flex-wrap justify-start items-start">
                    @csrf
                    @method('PATCH')
                    <div class="w-fit md:w-2/5 mb-5 md:mx-4">
                        <p class="text-gray-500 text-md mb-2">@lang('First Name')</p>
                        <input type="text" name="first_name" class="simple-input ml-3" value="{{ $user->first_name }}">
                        @error('first_name')
                        <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
                            @foreach ($errors->get('first_name') as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        @enderror
                    </div>
                    <div class="w-fit md:w-2/5 mb-5 md:mx-4">
                        <p class="text-gray-500 text-md mb-2">@lang('Last Name')</p>
                        <input type="text" name="last_name" class="simple-input ml-3" value="{{ $user->last_name }}">
                        @error('last_name')
                        <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
                            @foreach ($errors->get('last_name') as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        @enderror
                    </div>
                    <div class="w-full md:w-2/5 mb-5 md:mx-4">
                        <p class="text-gray-500 text-md mb-2">@lang('Language')</p>
                        <select name="lang" id="lang" class="simple-select ml-3">
                            @foreach (['fa' => 'فارسی', 'en' => 'English'] as $lang => $lang_title)
                                <option @if($lang === $user->lang) selected @endif value="{{ $lang }}">{{ $lang_title }}</option>
                            @endforeach
                        </select>
                        @error('lang')
                        <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
                            @foreach ($errors->get('lang') as $err)
                            <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        @enderror
                    </div>
                    <div class="w-full mt-5 xl:mt-2 text-center">
                        <button type="submit" class="rounded text-white bg-sky-400 w-fit px-8 py-2 hover:bg-sky-600 duration-500">apply</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full lg:w-1/2 p-2">
            <div class="bg-white shadow-md rounded p-4 h-full">
                <h2 class="font-bold text-xl mb-4">Email Verification</h2>
                <div class="w-full">
                    <p class="text-gray-500 text-md mb-2">email verified date</p>
                    <span class="text-black ml-3 font-bold mb-5">{{ $user->email_verified_at??"not verified yet" }}</span>
                    @if ($user->email_verified_at)
                    <div class="w-full mt-2 text-center"><span class="text-icon text-black text-lg bg-cyan-50 px-4 py-2 rounded mx-auto w-fit">verified <i class="far fa-check text-xl text-teal-400 ml-2"></i></span></div>
                    @else
                    <div class="w-full mt-2 text-center"><button class="rounded text-white bg-sky-400 w-fit px-8 py-2 hover:bg-sky-600 duration-500">send email</button></div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-zview-layout-default>