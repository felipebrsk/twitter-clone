@extends('layouts.main')
@section('title', 'Página Inicial')

@section('content')
    <div class="mx-auto h-screen">
        <div class="flex flex-row justify-center">
            <!-- Left -->
            <div class="w-16 xl:w-275 h-screen hide-mobile">
                <div class="flex flex-col h-screen xl:pr-3 fixed overflow-y-auto w-16 xs:w-88 xl:w-275">
                    <!-- Logo -->
                    <a class="flex xl:mr-0 mr-3 xl:ml-4 ml-0 my-2 justify-center xl:justify-start" href="#">
                        <svg viewBox="0 0 24 24" class="w-8 h-8 text-white" fill="currentColor">
                            <g>
                                <path
                                    d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                </path>
                            </g>
                        </svg>
                    </a>
                    <!-- /Logo -->

                    <!-- Nav -->
                    <nav class="mt-5 px-2 items-start flex flex-col xl:block text-white active-nav">
                        <a href="{{ route('home') }}"
                            class="flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6">
                                </path>
                            </svg>
                            <span class="hidden xl:block ml-4 font-bold text-md">Página inicial</span>
                        </a>
                        <a href="#"
                            class="mt-1 flex items-center px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                            </svg>
                            <span class="hidden xl:block ml-4 font-bold text-md">Explorar</span>
                        </a>
                        <a href="#"
                            class="mt-1 flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                                <span class="count"
                                    data-count="{{ count(Auth::user()->unreadNotifications) }}">{{ count(Auth::user()->unreadNotifications) }}</span>
                            <span class="hidden xl:block ml-4 font-bold text-md">Notificações</span>
                        </a>
                        <a href="#"
                            class="mt-1 flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="hidden xl:block ml-4 font-bold text-md">Mensagens</span>
                        </a>
                        <a href="#"
                            class="mt-1 flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                            <span class="hidden xl:block ml-4 font-bold text-md">Itens salvos</span>
                        </a>
                        <a href="#"
                            class="mt-1 flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span class="hidden xl:block ml-4 font-bold text-md">Listas</span>
                        </a>
                        <a href="#"
                            class="mt-1 flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="hidden xl:block ml-4 font-bold text-md">Perfil</span>
                        </a>
                        <a href="#"
                            class="mt-1 flex items-center px-2 py-2 text-base leading-6 font-medium rounded-full hover:bg-gray-800 hover:text-blue-300 transition-colors">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="hidden xl:block ml-4 font-bold text-md">Mais</span>
                        </a>

                        <a href="#"
                            class="w-10 h-10 xl:w-auto flex items-center justify-center bg-blue-400 mt-4 hover:bg-blue-500 py-3 rounded-full font-bold font-sm transition duration-350 ease-in-out text-white mb-10">
                            <svg fill="currentColor" viewBox="0 0 24 24" class="block xl:hidden h-6 w-6">
                                <path
                                    d="M8.8 7.2H5.6V3.9c0-.4-.3-.8-.8-.8s-.7.4-.7.8v3.3H.8c-.4 0-.8.3-.8.8s.3.8.8.8h3.3v3.3c0 .4.3.8.8.8s.8-.3.8-.8V8.7H9c.4 0 .8-.3.8-.8s-.5-.7-1-.7zm15-4.9v-.1h-.1c-.1 0-9.2 1.2-14.4 11.7-3.8 7.6-3.6 9.9-3.3 9.9.3.1 3.4-6.5 6.7-9.2 5.2-1.1 6.6-3.6 6.6-3.6s-1.5.2-2.1.2c-.8 0-1.4-.2-1.7-.3 1.3-1.2 2.4-1.5 3.5-1.7.9-.2 1.8-.4 3-1.2 2.2-1.6 1.9-5.5 1.8-5.7z">
                                </path>
                            </svg>
                            <span class="hidden xl:block ml-4 font-bold text-md">Tweet</span>
                        </a>
                    </nav>
                    <!-- /Nav -->

                    <!-- User Menu -->
                    <!-- Single button -->
                    <div
                        class="dropup w-14 xl:w-full mx-auto mt-auto flex flex-row justify-between mb-5 rounded-full xl:hover:bg-gray-900 xl:p-2 p-0.5 cursor-pointer">
                        <button type="button" role="button" class="items-center text-white focus:outline-none w-full"
                            data-toggle="dropdown">
                            <div class="flex justify-between">
                                <div class="flex flex-row">
                                    @if (Auth::user()->picture != null)

                                    @else
                                        <img class="w-10 h-10 rounded-full"
                                            src="{{ asset('img/profiles/default-user.png') }}"
                                            alt="{{ Auth::user()->name }}" />
                                    @endif
                                    <div class="hidden xl:block flex-col ml-2">
                                        <h1 class="text-white font-bold text-sm">{{ Auth::user()->name }}</h1>
                                        <p class="text-gray-400 text-sm">{{ '@' . Auth::user()->username }}</p>
                                    </div>
                                </div>
                                <div class="hidden xl:block">
                                    <div class="flex items-center h-full text-white">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16"
                                            height="16" fill="currentColor" viewBox="0 0 992 992"
                                            style="enable-background:new 0 0 992 992;" xml:space="preserve">
                                            <g>
                                                <circle cx="144.3" cy="496" r="144.3" />
                                                <circle cx="496" cy="496" r="144.3" />
                                                <circle cx="847.7" cy="496" r="144.3" />
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu w-72 h-52" style="animation: fadeIn 0.7s backwards; background: black;">
                            <div class="flex justify-between items-center mb-11">
                                <div class="flex items-center px-6 mt-4">
                                    <img src="{{ asset('img/profiles/default-user.png') }}"
                                        alt="{{ Auth::user()->username }}" class="w-12 h-12 rounded-full">
                                    <div class="flex flex-col items-start">
                                        <span>{{ Auth::user()->name }}</span>
                                        <span>{{ '@' . Auth::user()->username }}</span>
                                    </div>
                                </div>
                                <div class="px-2">
                                    <svg viewBox="0 0 24 24" aria-hidden="true" width="24" height="24" class="text-blue-400"
                                        fill="currentColor">
                                        <g>
                                            <path
                                                d="M9 20c-.264 0-.52-.104-.707-.293l-4.785-4.785c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0l3.946 3.945L18.075 4.41c.32-.45.94-.558 1.395-.24.45.318.56.942.24 1.394L9.817 19.577c-.17.24-.438.395-.732.42-.028.002-.057.003-.085.003z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <a href="#">
                                <div class="border text-center py-3 hover:bg-gray-900 border-gray-500 transition-colors">
                                    Adicionar uma conta existente
                                </div>
                            </a>
                            <a href="#">
                                <div class="text-center py-3 hover:bg-gray-900 border-bottom-radius transition-colors">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /User Menu -->
                </div>
            </div>
            <!-- /Left -->

            <!-- Middle -->
            <div class="w-full sm:w-600">
                <!-- Header -->
                <div
                    class="flex justify-between items-center border-b px-4 py-3 sticky top-0 w-full border-l border-r border-gray-700 bg-black">
                    <!-- Title -->
                    <div class=" flex items-center">
                        <img src="{{ asset('img/profiles/default-user.png') }}" alt="{{ Auth::user()->username }}"
                            class="rounded-full w-6 h-6 show-mobile">
                        <h2 class="text-gray-100 font-bold font-sm">
                            Página inicial
                        </h2>
                    </div>
                    <!-- /Title -->

                    <!-- Custom Timeline -->
                    <div>
                        <svg viewBox="0 0 24 24" class="w-6 h-6 text-white" fill="currentColor">
                            <g>
                                <path
                                    d="M22.772 10.506l-5.618-2.192-2.16-6.5c-.102-.307-.39-.514-.712-.514s-.61.207-.712.513l-2.16 6.5-5.62 2.192c-.287.112-.477.39-.477.7s.19.585.478.698l5.62 2.192 2.16 6.5c.102.306.39.513.712.513s.61-.207.712-.513l2.16-6.5 5.62-2.192c.287-.112.477-.39.477-.7s-.19-.585-.478-.697zm-6.49 2.32c-.208.08-.37.25-.44.46l-1.56 4.695-1.56-4.693c-.07-.21-.23-.38-.438-.462l-4.155-1.62 4.154-1.622c.208-.08.37-.25.44-.462l1.56-4.693 1.56 4.694c.07.212.23.382.438.463l4.155 1.62-4.155 1.622zM6.663 3.812h-1.88V2.05c0-.414-.337-.75-.75-.75s-.75.336-.75.75v1.762H1.5c-.414 0-.75.336-.75.75s.336.75.75.75h1.782v1.762c0 .414.336.75.75.75s.75-.336.75-.75V5.312h1.88c.415 0 .75-.336.75-.75s-.335-.75-.75-.75zm2.535 15.622h-1.1v-1.016c0-.414-.335-.75-.75-.75s-.75.336-.75.75v1.016H5.57c-.414 0-.75.336-.75.75s.336.75.75.75H6.6v1.016c0 .414.335.75.75.75s.75-.336.75-.75v-1.016h1.098c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <!-- /Custom Timeline -->
                </div>
                <!-- /Header -->

                <!-- Post Tweet -->
                <!--middle creat tweet-->
                <form action="{{ route('tweet.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="md:block hidden border border-dim-200">
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
                                    <h3 class="text-red-800 font-semibold tracking-wider">
                                        Boa!
                                    </h3>
                                    <ul class="list-disc list-inside">
                                        <li>{{ session()->get('success_message') }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="flex">
                            <div class="m-2 w-10 py-1">
                                @if (Auth::user()->picture != null)

                                @else
                                    <img class="inline-block h-10 w-10 rounded-full"
                                        src="{{ asset('img/profiles/default-user.png') }}"
                                        alt="{{ Auth::user()->username }}">
                                @endif
                            </div>
                            <div class="flex-1 px-2 pt-2 mt-2">
                                <textarea class="bg-transparent text-gray-400 font-medium text-lg w-full focus:outline-none"
                                    rows="2" cols="50" name="body" placeholder="O que está acontecendo?"></textarea>
                            </div>
                        </div>
                        <!--middle creat tweet below icons-->
                        <div class="flex items-center">
                            <div class="w-full pl-11">
                                <div class="flex items-center">
                                    <div class="text-center px-1 py-1 m-2">
                                        <label for="tweet_picture" class="cursor-pointer status-svg">
                                            <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </label>
                                        <input type="file" name="tweet_picture" id="tweet_picture" class="hidden">
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
                                    class="bg-blue-400 mr-4 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full focus:outline-none">
                                    Tweet
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /Post Tweet -->

                <!-- Timeline -->

                <!-- Tweet -->
                @foreach ($tweets as $tweet)
                    <div
                        class="border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out pb-4 border-l border-r">
                        <div class="flex flex-shrink-0 p-4 pb-0">
                            <a href="#" class="flex-shrink-0 group block">
                                <div class="flex items-center">
                                    <div>
                                        @if ($tweet->user->picture != null)
                                            <img src="{{ asset('img/profiles/' . $tweet->user->picture) }}"
                                                alt="{{ $tweet->user->username }}">
                                        @else
                                            <img class="inline-block h-10 w-10 rounded-full"
                                                src="{{ asset('img/profiles/default-user.png') }}"
                                                alt="{{ $tweet->user->username }}" />
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                        <p class="flex items-center text-base leading-6 font-medium text-white">
                                            {{ $tweet->user->name }}
                                            @if ($tweet->user->verified === 1)
                                                <svg viewBox="0 0 24 24" aria-label="Verified account" fill="currentColor"
                                                    class="w-4 h-4 ml-1">
                                                    <g>
                                                        <path
                                                            d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            @endif
                                            <span
                                                class="ml-1 text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                                {{ '@' . $tweet->user->username }} &bull;
                                                {{ $tweet->created_at->diffForHumans() }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="pl-16">
                            <p class="text-base width-auto font-medium text-white flex-shrink px-1">
                                {{ $tweet->body }}
                            </p>

                            @if ($tweet->photo != null)
                                <div class="flex my-3 mr-2 rounded-2xl border border-gray-600">
                                    <img class="rounded-2xl object-center object-cover"
                                        src="{{ asset('img/tweets/large/' . $tweet->photo) }}"
                                        alt="{{ $tweet->photo }}" />
                                </div>
                            @endif

                            <div class="flex @if ($tweet->photo == null) mt-8 @endif">
                                <div class="w-full">
                                    <div
                                        class="flex items-center md:justify-between justify-end md:pr-16 pr-4 md:space-x-0 space-x-8">
                                        <div
                                            class="flex items-center text-white text-xs hover:text-blue-400 transition duration-350 ease-in-out">
                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                <g>
                                                    <path
                                                        d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                                    </path>
                                                </g>
                                            </svg>
                                            12.3 k
                                        </div>
                                        <div
                                            class="flex items-center text-white text-xs hover:text-green-400 transition duration-350 ease-in-out">
                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                <g>
                                                    <path
                                                        d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                                                    </path>
                                                </g>
                                            </svg>
                                            14 k
                                        </div>
                                        @php
                                            $i = Auth::user()
                                                ->likes()
                                                ->count();
                                            
                                            $c = 1;
                                            
                                            $likeCount = $tweet->likes()->count();
                                        @endphp
                                        @foreach (Auth::user()->likes as $like)
                                            @if ($like->tweet_id == $tweet->id)
                                                <div class="like-button text-red-600">
                                                    <a href="#" class="unlike flex items-center"
                                                        data-tweetId="{{ $tweet->id }}"
                                                        data-authorId="{{ $tweet->user->id }}"
                                                        data-tweetLikes="{{ $tweet->likes->count() }}">
                                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                            <g>
                                                                <path
                                                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        <p>
                                                            {{ $tweet->likes()->count() }}
                                                        </p>
                                                    </a>
                                                </div>
                                            @break
                                        @elseif ($i == $c)
                                            <div class="like-button text-white text-xs hover:text-red-600 ">
                                                <a href="#" class="like flex items-center"
                                                    data-tweetId="{{ $tweet->id }}"
                                                    data-authorId="{{ $tweet->user->id }}"
                                                    data-tweetLikes="{{ $tweet->likes->count() }}">
                                                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                        <g>
                                                            <path
                                                                d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <p>
                                                        {{ $tweet->likes()->count() }}
                                                    </p>
                                                </a>
                                            </div>
                                        @endif
                @endforeach
                @if ($i == 0)
                    <div class="like-button text-white text-xs hover:text-red-600 ">
                        <a href="#" class="like flex items-center" data-tweetId="{{ $tweet->id }}"
                            data-authorId="{{ $tweet->user->id }}" data-tweetLikes="{{ $tweet->likes->count() }}">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <g>
                                    <path
                                        d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                    </path>
                                </g>
                            </svg>
                            <p>
                                {{ $tweet->likes()->count() }}
                            </p>
                        </a>
                    </div>
                @endif
                <div class="flex items-center text-white text-xs hover:text-blue-400 transition duration-350 ease-in-out">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <g>
                            <path
                                d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z">
                            </path>
                            <path
                                d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z">
                            </path>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @endforeach
    <!-- /Tweet -->

    <!-- /Timeline -->
    </div>
    <!-- /Middle -->

    <!-- Right -->
    <div class="hidden md:block w-72 lg:w-350 h-screen ml-4">
        <div class="flex flex-col fixed overflow-y-auto w-72 lg:w-350 h-screen">
            <!-- Search -->
            <div class="relative m-2">
                <div class="absolute text-gray-600 flex items-center pl-4 h-full cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" fill="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                        </path>
                    </svg>
                </div>
                <input
                    class="w-full border-dim-400 bg-gray-900 text-gray-100 focus:bg-black focus:outline-none focus:border focus:border-blue-600 font-normal h-12 flex items-center pl-12 text-sm rounded-full border shadow"
                    placeholder="Buscar no Twitter" />
            </div>
            <!-- /Search -->

            <!-- What’s happening -->
            <div class="rounded-2xl m-2" style="background: rgb(21,24,28);">
                <h1 class="text-white text-md font-bold p-3 border-b border-dim-200">
                    O que está acontecendo
                </h1>

                <!-- Trending Topic -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <h2 class="font-bold text-md text-white">#QuePorraÉEssaBolsonaro</h2>
                    <p class="text-xs text-gray-400">29.7K Tweets</p>
                </div>
                <!-- /Trending Topic -->

                <!-- Trending Topic -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <h2 class="font-bold text-md text-white">#QuePorraÉEssaLula</h2>
                    <p class="text-xs text-gray-400">351K Tweets</p>
                </div>
                <!-- /Trending Topic -->

                <!-- Trending Topic -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <h2 class="font-bold text-md text-white">#DeuALoucaNaPresidência</h2>
                    <p class="text-xs text-gray-400">52.7K Tweets</p>
                </div>
                <!-- /Trending Topic -->

                <div
                    class="text-blue-400 text-sm font-normal p-3 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    Mostrar mais
                </div>
            </div>
            <!-- /What’s happening -->

            <!-- Who to follow -->
            <div class="rounded-2xl m-2" style="background: rgb(21,24,28);">
                <h1 class="text-white text-md font-bold p-3 border-b border-dim-200">
                    Quem seguir
                </h1>

                <!-- Twitter Account -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <div class="flex flex-row justify-between p-2">
                        <div class="flex flex-row">
                            <img class="w-10 h-10 rounded-full"
                                src="https://blogs.correiobraziliense.com.br/vicente/wp-content/uploads/sites/16/2020/04/BolsonaroVirus.jpg"
                                alt="Joe Biden" />
                            <div class="flex flex-col ml-2">
                                <h1 class="text-white font-bold text-sm hover:underline">Jair M. Bolsonaro</h1>
                                <p class="text-gray-400 text-sm">@jairbolsonaro</p>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex items-center h-full text-white">
                                <a href="#"
                                    class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400">Seguir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Twitter Account -->

                <!-- Twitter Account -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <div class="flex flex-row justify-between p-2">
                        <div class="flex flex-row">
                            <img class="w-10 h-10 rounded-full"
                                src="https://pbs.twimg.com/profile_images/1382815821148385287/evfQlSZ__400x400.jpg"
                                alt="Joe Biden" />
                            <div class="flex flex-col ml-2">
                                <h1 class="text-white font-bold text-sm hover:underline">Lula</h1>
                                <p class="text-gray-400 text-sm">@LulaOficial</p>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex items-center h-full text-white">
                                <a href="#"
                                    class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400">Seguir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Twitter Account -->

                <!-- Twitter Account -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <div class="flex flex-row justify-between p-2">
                        <div class="flex flex-row">
                            <img class="w-10 h-10 rounded-full"
                                src="https://pbs.twimg.com/profile_images/1308769664240160770/AfgzWVE7_normal.jpg"
                                alt="Joe Biden" />
                            <div class="flex flex-col ml-2">
                                <h1 class="text-white font-bold text-sm hover:underline">Joe Biden</h1>
                                <p class="text-gray-400 text-sm">@JoeBiden</p>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex items-center h-full text-white">
                                <a href="#"
                                    class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400">Seguir</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Twitter Account -->

                <div
                    class="text-blue-400 text-sm font-normal p-3 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    Mostrar mais
                </div>
            </div>
            <!-- /Who to follow -->

            <!-- Topics to follow -->
            <div class="rounded-2xl m-2" style="background: rgb(21,24,28);">
                <h1 class="text-white text-md font-bold p-3 border-b border-dim-200">
                    Tópicos para seguir
                </h1>

                <!-- Trending Topic -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-bold text-md text-white">League of Legends</h2>
                            <p class="text-xs text-gray-400">Video game</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="#"
                                class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400">Seguir</a>
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                fill="currentColor"
                                class="text-gray-600 bg-blue-200 bg-opacity-0 hover:bg-opacity-10 rounded-full"
                                clip-rule="evenodd">
                                <path
                                    d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- /Trending Topic -->

                <!-- Trending Topic -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-bold text-md text-white">Futebol</h2>
                            <p class="text-xs text-gray-400">Esporte</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="#"
                                class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400">Seguir</a>
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                fill="currentColor"
                                class="text-gray-600 bg-blue-200 bg-opacity-0 hover:bg-opacity-10 rounded-full"
                                clip-rule="evenodd">
                                <path
                                    d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- /Trending Topic -->

                <!-- Trending Topic -->
                <div
                    class="text-blue-400 text-sm font-normal p-3 border-b border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="font-bold text-md text-white">Big Brother Brasil</h2>
                            <p class="text-xs text-gray-400">Reality Show</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="#"
                                class="text-xs font-bold text-blue-400 px-4 py-1 rounded-full border-2 border-blue-400">Seguir</a>
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                fill="currentColor"
                                class="text-gray-600 bg-blue-200 bg-opacity-0 hover:bg-opacity-10 rounded-full"
                                clip-rule="evenodd">
                                <path
                                    d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- /Trending Topic -->

                <div
                    class="text-blue-400 text-sm font-normal p-3 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer transition duration-350 ease-in-out">
                    Mostrar mais
                </div>
            </div>
            <!-- /Topics to follow -->

            <footer>
                <ul class="text-xs text-gray-500 my-4 mx-2">
                    <li class="inline-block mx-2">
                        <a class="hover:underline" href="#">Termos de Serviço</a>
                    </li>
                    <li class="inline-block mx-2">
                        <a class="hover:underline" href="#">Política de Privacidade</a>
                    </li>
                    <li class="inline-block mx-2">
                        <a class="hover:underline" href="#">Política de cookies</a>
                    </li>
                    <li class="inline-block mx-2">
                        <a class="hover:underline" href="#">Informações de anúncios</a>
                    </li>
                    <li class="inline-block mx-2">
                        <a class="hover:underline" href="#">More...</a>
                    </li>
                    <li class="inline-block mx-2">© 2020 Twitter, Inc.</li>
                </ul>
            </footer>
        </div>
    </div>
    <!-- /Right -->

    <!-- Mobile Menu -->
    <div class="fixed bottom-16 right-4 show-mobile">
        <a href="#"
            class="w-20 h-20 flex items-center justify-center bg-blue-400 mt-4 hover:bg-blue-500 py-3 rounded-full font-bold font-sm transition duration-350 ease-in-out text-white">
            <svg fill="currentColor" viewBox="0 0 24 24" class="h-6 w-6">
                <path
                    d="M8.8 7.2H5.6V3.9c0-.4-.3-.8-.8-.8s-.7.4-.7.8v3.3H.8c-.4 0-.8.3-.8.8s.3.8.8.8h3.3v3.3c0 .4.3.8.8.8s.8-.3.8-.8V8.7H9c.4 0 .8-.3.8-.8s-.5-.7-1-.7zm15-4.9v-.1h-.1c-.1 0-9.2 1.2-14.4 11.7-3.8 7.6-3.6 9.9-3.3 9.9.3.1 3.4-6.5 6.7-9.2 5.2-1.1 6.6-3.6 6.6-3.6s-1.5.2-2.1.2c-.8 0-1.4-.2-1.7-.3 1.3-1.2 2.4-1.5 3.5-1.7.9-.2 1.8-.4 3-1.2 2.2-1.6 1.9-5.5 1.8-5.7z">
                </path>
            </svg>
        </a>
    </div>
    <div class="fixed bg-black text-white border border-dim-200 bottom-0 h-14 w-full show-mobile">
        <div class="flex items-center justify-between mt-2.5 px-12 active-mobile">
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
            <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="28" height="28">
                <g>
                    <path
                        d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.532-.812-4.782-2.347-6.335C15.872 2.71 14.01 1.94 12.005 1.93h-.013c-2.004.01-3.866.78-5.242 2.174-1.534 1.553-2.368 3.802-2.346 6.334.037 4.33-2.02 5.967-2.102 6.03-.26.193-.366.53-.265.838.102.308.39.515.712.515h4.92c.102 2.31 1.997 4.16 4.33 4.16s4.226-1.85 4.327-4.16h4.922c.322 0 .61-.206.71-.514.103-.307-.003-.645-.263-.838zM12 20.478c-1.505 0-2.73-1.177-2.828-2.658h5.656c-.1 1.48-1.323 2.66-2.828 2.66zM4.38 16.32c.74-1.132 1.548-3.028 1.524-5.896-.018-2.16.644-3.982 1.913-5.267C8.91 4.05 10.397 3.437 12 3.43c1.603.008 3.087.62 4.18 1.728 1.27 1.285 1.933 3.106 1.915 5.267-.024 2.868.785 4.765 1.525 5.896H4.38z">
                    </path>
                </g>
            </svg>
            <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="28" height="28">
                <g>
                    <path
                        d="M19.25 3.018H4.75C3.233 3.018 2 4.252 2 5.77v12.495c0 1.518 1.233 2.753 2.75 2.753h14.5c1.517 0 2.75-1.235 2.75-2.753V5.77c0-1.518-1.233-2.752-2.75-2.752zm-14.5 1.5h14.5c.69 0 1.25.56 1.25 1.25v.714l-8.05 5.367c-.273.18-.626.182-.9-.002L3.5 6.482v-.714c0-.69.56-1.25 1.25-1.25zm14.5 14.998H4.75c-.69 0-1.25-.56-1.25-1.25V8.24l7.24 4.83c.383.256.822.384 1.26.384.44 0 .877-.128 1.26-.383l7.24-4.83v10.022c0 .69-.56 1.25-1.25 1.25z">
                    </path>
                </g>
            </svg>
        </div>
    </div>
    <!-- /Mobile Menu -->
    </div>
    </div>
@endsection

@push('styles')
    <style>
        ::-webkit-scrollbar {
            display: flow-root;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.like').on('click', function(e) {
                e.preventDefault();

                const tweetId = e.target.parentNode.dataset['tweetid'];
                const authorId = e.target.parentNode.dataset['authorid'];
                let tweetLikes = e.target.parentNode.dataset['tweetlikes'];

                const data = {
                    user_id: {{ Auth::id() }},
                    tweet_id: tweetId,
                    author_id: authorId,
                };

                axios.post('like', data).then(response => {
                    e.currentTarget.parentNode.className = 'like-button text-red-600';
                    e.currentTarget.lastElementChild.innerHTML = ++tweetLikes;
                });
            });

            $('.unlike').on('click', function(e) {
                e.preventDefault();

                const tweetId = e.target.parentNode.dataset['tweetid'];
                let tweetLikes = e.target.parentNode.dataset['tweetlikes'];

                const data = {
                    _method: 'DELETE',
                };

                axios.post('like/' + tweetId, data).then(response => {
                    e.currentTarget.parentNode.className =
                        'like-button text-white hover:text-red-600';
                    e.currentTarget.lastElementChild.innerHTML = --tweetLikes;
                });
            });
        });

    </script>
@endpush
