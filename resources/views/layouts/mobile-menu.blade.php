<div class="fixed bottom-16 right-4 show-mobile">
    <a href="#"
        onclick="event.preventDefault(); document.getElementById('myModal-{{ Auth::user()->username . 'mobile' }}').showModal();"
        class="w-20 h-20 flex items-center justify-center bg-blue-400 mt-4 hover:bg-blue-500 py-3 rounded-full font-bold font-sm transition duration-350 ease-in-out text-white">
        <svg fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
            <path
                d="M8.8 7.2H5.6V3.9c0-.4-.3-.8-.8-.8s-.7.4-.7.8v3.3H.8c-.4 0-.8.3-.8.8s.3.8.8.8h3.3v3.3c0 .4.3.8.8.8s.8-.3.8-.8V8.7H9c.4 0 .8-.3.8-.8s-.5-.7-1-.7zm15-4.9v-.1h-.1c-.1 0-9.2 1.2-14.4 11.7-3.8 7.6-3.6 9.9-3.3 9.9.3.1 3.4-6.5 6.7-9.2 5.2-1.1 6.6-3.6 6.6-3.6s-1.5.2-2.1.2c-.8 0-1.4-.2-1.7-.3 1.3-1.2 2.4-1.5 3.5-1.7.9-.2 1.8-.4 3-1.2 2.2-1.6 1.9-5.5 1.8-5.7z">
            </path>
        </svg>
    </a>

    <!-- Tweet Modal Post -->
    <dialog id="myModal-{{ Auth::user()->username . 'mobile' }}"
        class="max-h-auto w-full p-5 bg-black rounded-md text-white">
        <div class="flex flex-col w-full h-auto ">
            <!-- Header -->
            <div class="flex w-full h-auto justify-start items-center border-b border-gray-800">
                <div onclick="document.getElementById('myModal-{{ Auth::user()->username . 'mobile' }}').close();"
                    class="flex w-1/12 h-auto justify-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" stroke="rgba(96, 165, 250)" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <!--Header End-->
            </div>
            <!-- Modal Content-->
            <div class="flex w-full h-auto py-2 px-2 justify-center items-center rounded text-center text-gray-500">
                <!-- Post Tweet -->
                <form action="{{ route('tweet.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
                    @csrf
                    <div class="block md:hidden">
                        @if ($errors->any())
                            <div class="error-content">
                                <div class="text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z" />
                                    </svg>
                                </div>
                                <div class="px-3">
                                    <h3 class="text-red-800 font-semibold tracking-wider">
                                        Ops...
                                    </h3>
                                    <ul class="list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('success_message'))
                            <div class="error-content">
                                <div class="text-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z" />
                                    </svg>
                                </div>
                                <div class="px-3">
                                    <h3 class="text-green-800 font-semibold tracking-wider">
                                        Boa!
                                    </h3>
                                    <ul class="list-disc list-inside">
                                        <li>{{ session()->get('success_message') }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="flex flex-col ">
                            <div class="m-2 w-10 py-1">
                                @if (Auth::user()->picture != null)
                                    <img src="{{ asset('img/profiles/' . Auth::user()->picture) }}"
                                        alt="{{ Auth::user()->username }}" class="w-10 h-10 rounded-full">
                                @else
                                    <img class="inline-block h-10 w-10 rounded-full"
                                        src="{{ asset('img/profiles/default-user.png') }}"
                                        alt="{{ Auth::user()->username }}">
                                @endif
                            </div>
                            <div class="px-2 pt-2 mt-2">
                                <textarea
                                    class="bg-transparent text-gray-400 font-medium text-lg w-full focus:outline-none"
                                    rows="2" cols="50" name="body"
                                    placeholder="O que está acontecendo?">{{ old('body') }}</textarea>
                            </div>
                        </div>
                        <img id="image_output_mobile" src="#" alt="Imagem" class="hidden w-full rounded mt-4" />
                        <!--middle creat tweet below icons-->
                        <div class="flex w-full flex-col items-center">
                            <div class="w-full pl-11">
                                <div class="flex items-center">
                                    <div class="text-center px-1 py-1 m-2">
                                        <label for="tweet_picture_mobile" class="cursor-pointer status-svg">
                                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </label>
                                        <input type="file" name="tweet_picture" id="tweet_picture_mobile"
                                            class="hidden">
                                    </div>

                                    <div class="text-center py-2 m-2">
                                        <a href="#" class="status-svg">
                                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                                </path>
                                                <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="text-center py-2 m-2">
                                        <a href="#" class="status-svg">
                                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="text-center py-2 m-2">
                                        <a href="#" class="status-svg">
                                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button
                                    class="bg-blue-400 mr-4 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full focus:outline-none w-full">
                                    Tweet
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /Post Tweet -->
            </div>
            <!-- End of Modal Content-->
        </div>
    </dialog>
    <!-- /Tweet Modal Post -->
</div>
<div class="fixed bg-black text-white border border-dim-200 bottom-0 h-14 w-full show-mobile">
    <div class="flex items-center justify-between mt-1 px-12 active-mobile">
        <a href="{{ route('home') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="28" height="28">
                <g>
                    <path
                        d="M22.58 7.35L12.475 1.897c-.297-.16-.654-.16-.95 0L1.425 7.35c-.486.264-.667.87-.405 1.356.18.335.525.525.88.525.16 0 .324-.038.475-.12l.734-.396 1.59 11.25c.216 1.214 1.31 2.062 2.66 2.062h9.282c1.35 0 2.444-.848 2.662-2.088l1.588-11.225.737.398c.485.263 1.092.082 1.354-.404.263-.486.08-1.093-.404-1.355zM12 15.435c-1.795 0-3.25-1.455-3.25-3.25s1.455-3.25 3.25-3.25 3.25 1.455 3.25 3.25-1.455 3.25-3.25 3.25z">
                    </path>
                </g>
            </svg>
        </a>
        <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="28" height="28">
            <g>
                <path
                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                </path>
            </g>
        </svg>
        <a href="{{ route('notification.index') }}"
            class="mt-1 flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                stroke="currentColor" viewBox="0 0 24 24">
                <path
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
            </svg>
            @if (count(Auth::user()->unreadNotifications) > 0)
                @if (count(Auth::user()->unreadNotifications) > 99))
                    <span class="count" data-count="99">99+</span>
                @else
                    <span class="count"
                        data-count="{{ count(Auth::user()->unreadNotifications) }}">{{ count(Auth::user()->unreadNotifications) }}</span>
                @endif
            @endif
            <span class="hidden xl:block ml-4 font-bold text-md">Notificações</span>
        </a>
        <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="28" height="28">
            <g>
                <path
                    d="M19.25 3.018H4.75C3.233 3.018 2 4.252 2 5.77v12.495c0 1.518 1.233 2.753 2.75 2.753h14.5c1.517 0 2.75-1.235 2.75-2.753V5.77c0-1.518-1.233-2.752-2.75-2.752zm-14.5 1.5h14.5c.69 0 1.25.56 1.25 1.25v.714l-8.05 5.367c-.273.18-.626.182-.9-.002L3.5 6.482v-.714c0-.69.56-1.25 1.25-1.25zm14.5 14.998H4.75c-.69 0-1.25-.56-1.25-1.25V8.24l7.24 4.83c.383.256.822.384 1.26.384.44 0 .877-.128 1.26-.383l7.24-4.83v10.022c0 .69-.56 1.25-1.25 1.25z">
                </path>
            </g>
        </svg>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M14 19v-.083c-1.178.685-2.542 1.083-4 1.083-4.411 0-8-3.589-8-8s3.589-8 8-8c1.458 0 2.822.398 4 1.083v-2.245c-1.226-.536-2.576-.838-4-.838-5.522 0-10 4.477-10 10s4.478 10 10 10c1.424 0 2.774-.302 4-.838v-2.162zm4-9.592l2.963 2.592-2.963 2.592v-1.592h-8v-2h8v-1.592zm-2-4.408v4h-8v6h8v4l8-7-8-7z" />
            </svg>
        </a>
    </div>
</div>

@push('scripts')
    <script>
        tweet_picture_mobile.onchange = evt => {
            const [file] = tweet_picture_mobile.files
            if (file) {
                image_output_mobile.style.display = 'block';
                image_output_mobile.src = URL.createObjectURL(file)
            }
        }

    </script>
@endpush
