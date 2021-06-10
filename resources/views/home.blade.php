@extends('layouts.main')
@section('title', $title . ' Página Inicial')

@section('content')
    <!-- Header -->
    <div class="home-header">
        <!-- Title -->
        <div class="flex items-center">
            <a href="{{ route('profile.show', Auth::user()->username) }}">
                <img src="{{ asset('img/profiles/default-user.png') }}" alt="{{ Auth::user()->username }}"
                    class="show-mobile img-header">
            </a>
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
    <form action="{{ route('tweet.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
        @csrf
        <div class="post-tweet-home border-dim-200 @if ($errors->any()) border-t @endif">
            @if ($errors->any())
                <div class="error-content">
                    <div class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 17.292l-4.5-4.364 1.857-1.858 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.643z" />
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
                <div class="success-content">
                    <div class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24">
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
            <div class="flex">
                <div class="m-2 w-10 py-1">
                    @if (Auth::user()->picture != null)
                        <img src="{{ asset('img/profiles/' . Auth::user()->picture) }}" class="w-10 h-10 rounded-full"
                            alt="{{ Auth::user()->username }}">
                    @else
                        <img class="inline-block h-10 w-10 rounded-full"
                            src="{{ asset('img/profiles/default-user.png') }}" alt="{{ Auth::user()->username }}">
                    @endif
                </div>
                <div class="flex-1 px-2 pt-2 mt-2">
                    <textarea class="bg-transparent text-gray-400 font-medium text-lg w-full focus:outline-none" rows="2"
                        cols="50" name="body" placeholder="O que está acontecendo?">{{ old('body') }}</textarea>
                    <img id="image_output_home" src="#" alt="Imagem" class="hidden w-full rounded" />
                </div>
            </div>
            <!--middle creat tweet below icons-->
            <div class="flex items-center">
                <div class="w-full pl-11">
                    <div class="flex items-center">
                        <div class="text-center px-1 py-1 m-2">
                            <label for="tweet_picture_home" class="cursor-pointer status-svg">
                                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </label>
                            <input type="file" name="tweet_picture" id="tweet_picture_home" class="hidden" accept="image/*">
                        </div>

                        <div class="text-center py-2 m-2">
                            <a href="#" class="status-svg">
                                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                    </path>
                                    <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="text-center py-2 m-2">
                            <a href="#" class="status-svg">
                                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </a>
                        </div>

                        <div class="text-center py-2 m-2">
                            <a href="#" class="status-svg">
                                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="tweet-button">
                        Tweet
                    </button>
                </div>
            </div>
        </div>
    </form>
    <!-- /Post Tweet -->

    <!-- Tweet -->
    @foreach ($tweets as $tweet)
        <div class="tweet-content border-dim-200 @if ($loop->last) border-b mb-48 @endif">
            <div class="flex justify-between items-center flex-shrink-0 p-4 pb-0 @if ($tweet->
                is_fixed) -mt-4 @endif">
                <a href="{{ route('profile.show', $tweet->user->username) }}" class="flex-shrink-0 group block">
                    <div class="flex items-center">
                        <div>
                            @if ($tweet->user->picture != null)
                                <img src="{{ asset('img/profiles/' . $tweet->user->picture) }}"
                                    alt="{{ $tweet->user->username }}" class="w-10 h-10 inline-block rounded-full">
                            @else
                                <img class="inline-block h-10 w-10 rounded-full"
                                    src="{{ asset('img/profiles/default-user.png') }}"
                                    alt="{{ $tweet->user->username }}" />
                            @endif
                        </div>
                        <div class="ml-3">
                            <div class="tweet-head">
                                <b class="hover:underline flex items-center">
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
                                </b>
                                <span class="tweet-username">
                                    {{ '@' . $tweet->user->username }} &bull;
                                    <b class="hover:underline"
                                        title="{{ $tweet->created_at->format('d/m/Y, H:i:s') }}">{{ $tweet->created_at->diffForHumans() }}</b>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="text-left">
                    <div class="dropdown flex flex-col">
                        <button
                            class="focus:outline-none hover:bg-gray-900 hover:bg-opacity-75 focus:text-blue-600 rounded-full p-2 text-gray-400 hover:text-blue-600 transition-colors ease-in-out"
                            data-toggle="dropdown" data-target="#basic-example-3" aria-haspopup="true"
                            aria-expanded="false">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16" height="16"
                                fill="currentColor" viewBox="0 0 992 992" style="enable-background:new 0 0 992 992;"
                                xml:space="preserve">
                                <g>
                                    <circle cx="144.3" cy="496" r="144.3" />
                                    <circle cx="496" cy="496" r="144.3" />
                                    <circle cx="847.7" cy="496" r="144.3" />
                                </g>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right bg-black w-80 font-normal"
                            style="animation: fadeIn 0.4s backwards ease" role="menu">
                            @if (Auth::id() === $tweet->user->id)
                                <a href="#" class="hover:bg-gray-900 hover:bg-opacity-50 p-2 flex items-center h-12"
                                    tabindex="-1" rel="noreferrer" role="menuitem">
                                    <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="20" height="20">
                                        <g>
                                            <path
                                                d="M12 22.75C6.072 22.75 1.25 17.928 1.25 12S6.072 1.25 12 1.25 22.75 6.072 22.75 12 17.928 22.75 12 22.75zm0-20C6.9 2.75 2.75 6.9 2.75 12S6.9 21.25 12 21.25s9.25-4.15 9.25-9.25S17.1 2.75 12 2.75z">
                                            </path>
                                            <path
                                                d="M12 13.415c1.892 0 3.633.95 4.656 2.544.224.348.123.81-.226 1.035-.348.226-.812.124-1.036-.226-.747-1.162-2.016-1.855-3.395-1.855s-2.648.693-3.396 1.854c-.224.35-.688.45-1.036.225-.35-.224-.45-.688-.226-1.036 1.025-1.594 2.766-2.545 4.658-2.545zm4.216-3.957c0 .816-.662 1.478-1.478 1.478s-1.478-.66-1.478-1.478c0-.817.662-1.478 1.478-1.478s1.478.66 1.478 1.478zm-5.476 0c0 .816-.662 1.478-1.478 1.478s-1.478-.66-1.478-1.478c0-.817.662-1.478 1.478-1.478.817 0 1.478.66 1.478 1.478z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>
                                        Excluir
                                    </span>
                                </a>
                            @endif
                            <a href="#" tabindex="-1" rel="noreferrer" role="menuitem"
                                class="hover:bg-gray-900 hover:bg-opacity-50 p-2 flex items-center h-12 rounded-b-2xl border-t border-dim-200 text-gray-400">
                                <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="20" height="20"
                                    class="ml-2">
                                    <g>
                                        <path
                                            d="M23.25 3.25h-2.425V.825c0-.414-.336-.75-.75-.75s-.75.336-.75.75V3.25H16.9c-.414 0-.75.336-.75.75s.336.75.75.75h2.425v2.425c0 .414.336.75.75.75s.75-.336.75-.75V4.75h2.425c.414 0 .75-.336.75-.75s-.336-.75-.75-.75zM18.575 22H4.25C3.01 22 2 20.99 2 19.75V5.5c0-1.24 1.01-2.25 2.25-2.25h8.947c.414 0 .75.336.75.75s-.336.75-.75.75H4.25c-.413 0-.75.336-.75.75v14.25c0 .414.337.75.75.75h14.325c.413 0 .75-.336.75-.75v-8.872c0-.414.336-.75.75-.75s.75.336.75.75v8.872c0 1.24-1.01 2.25-2.25 2.25z">
                                        </path>
                                        <path
                                            d="M16.078 9.583H6.673c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h9.405c.414 0 .75.336.75.75s-.336.75-.75.75zm0 3.867H6.673c-.414 0-.75-.337-.75-.75s.336-.75.75-.75h9.405c.414 0 .75.335.75.75s-.336.75-.75.75zm-4.703 3.866H6.673c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h4.702c.414 0 .75.336.75.75s-.336.75-.75.75z">
                                        </path>
                                    </g>
                                </svg>
                                <span>
                                    Adicionar/remover {{ '@' . $tweet->user->username }} das Listas
                                </span>
                            </a>
                            <a href="#" tabindex="-1" rel="noreferrer" role="menuitem"
                                class="hover:bg-gray-900 hover:bg-opacity-50 p-2 flex items-center h-12 rounded-b-2xl border-t border-dim-200 text-gray-400">
                                <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="20" height="20"
                                    class="ml-2">
                                    <g>
                                        <path
                                            d="M23.804 11.5l-6.496-7.25c-.278-.31-.752-.334-1.06-.06-.308.277-.334.752-.058 1.06L22.238 12l-6.047 6.75c-.275.308-.25.782.06 1.06.142.127.32.19.5.19.204 0 .41-.084.558-.25l6.496-7.25c.252-.28.258-.713 0-1zm-23.606 0l6.496-7.25c.278-.31.752-.334 1.06-.06.308.277.334.752.058 1.06L1.764 12l6.047 6.75c.277.308.25.782-.057 1.06-.143.127-.322.19-.5.19-.206 0-.41-.084-.56-.25L.197 12.5c-.252-.28-.257-.713 0-1zm9.872 12c-.045 0-.09-.004-.135-.012-.407-.073-.68-.463-.605-.87l3.863-21.5c.074-.407.466-.674.87-.606.408.073.68.463.606.87l-3.864 21.5c-.065.363-.38.618-.737.618z">
                                        </path>
                                    </g>
                                </svg>
                                <span>
                                    Incorporar Tweet
                                </span>
                            </a>
                            @if (Auth::id() === $tweet->user->id)
                                <a href="#" tabindex="-1" rel="noreferrer" role="menuitem"
                                    class=" hover:bg-gray-900 hover:bg-opacity-50 text-gray-400 p-2 flex items-center h-12 rounded-b-2xl border-t border-dim-200"
                                    onclick="event.preventDefault(); document.getElementById('myModal-{{ $tweet->views }}-interactions').showModal();">
                                    <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="20" height="20"
                                        class="ml-2">
                                        <g>
                                            <path
                                                d="M12 22c-.414 0-.75-.336-.75-.75V2.75c0-.414.336-.75.75-.75s.75.336.75.75v18.5c0 .414-.336.75-.75.75zm5.14 0c-.415 0-.75-.336-.75-.75V7.89c0-.415.335-.75.75-.75s.75.335.75.75v13.36c0 .414-.337.75-.75.75zM6.86 22c-.413 0-.75-.336-.75-.75V10.973c0-.414.337-.75.75-.75s.75.336.75.75V21.25c0 .414-.335.75-.75.75z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>
                                        Ver atividade do Tweet
                                    </span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="pl-16">
                <a href="{{ route('tweet.show', $tweet->id) }}">
                    <p class="tweet-body">
                        {!! nl2br(e($tweet->body)) !!}
                    </p>
                </a>

                @if ($tweet->photo != null)
                    <div class="photo-container">
                        <img class="tweet-img" onclick="document.getElementById('myModal-{{ $tweet->id }}').showModal()"
                            src="{{ asset('img/tweets/medium/' . $tweet->photo) }}" alt="{{ $tweet->photo }}" />
                        <dialog id="myModal-{{ $tweet->id }}" class="modal-img">
                            <div class="flex flex-col w-full h-auto">
                                <!-- Header -->
                                <div class="modal-header">
                                    <div onclick="document.getElementById('myModal-{{ $tweet->id }}').close();"
                                        class="flex w-1/12 h-auto justify-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="currentColor" stroke="rgba(96, 165, 250)" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>
                                    <!--Header End-->
                                </div>
                                <!-- Modal Content-->
                                <div class="modal-content">
                                    <img src="{{ asset('img/tweets/large/' . $tweet->photo) }}"
                                        alt="{{ $tweet->photo }}" class="w-full max-w-7xl">
                                </div>
                                <!-- End of Modal Content-->
                            </div>
                        </dialog>
                    </div>
                @endif

                <div class="flex mt-8">
                    <div class="w-full">
                        <div class="tweet-actions">
                            <div class="tweet-action-icons hover:text-blue-400">
                                <a href="{{ route('tweet.show', $tweet->id) }}" class="flex items-center">
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                        <g>
                                            <path
                                                d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                            </path>
                                        </g>
                                    </svg>
                                    <p>
                                        {{ $tweet->comments->count() }}
                                    </p>
                                </a>
                            </div>
                            <div class="tweet-action-icons hover:text-green-400">
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
                                        <a href="#" class="unlike flex items-center" data-tweetId="{{ $tweet->id }}"
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
                                <div class="like-button text-gray-400 text-xs hover:text-red-600 ">
                                    <a href="#" class="like flex items-center" data-tweetId="{{ $tweet->id }}"
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

                            @php
                                $c++;
                            @endphp

    @endforeach

    @if ($i == 0)
        <div class="like-button text-gray-400 text-xs hover:text-red-600 ">
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

    <div class="tweet-action-icons hover:text-blue-400">
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
@endsection

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

                axios.post('{{ route('like.store') }}', data).then(response => {
                    e.currentTarget.parentNode.className = 'like-button text-red-600';
                    e.currentTarget.lastElementChild.innerHTML = ++tweetLikes;
                });
            });

            $('.unlike').on('click', function(e) {
                e.preventDefault();

                let tweetLikes = e.target.parentNode.dataset['tweetlikes'];

                const data = {
                    _method: 'DELETE',
                };

                axios.post('{{ route('like.destroy', isset($tweet->id)) }}', data).then(response => {
                    e.currentTarget.parentNode.className =
                        'like-button text-white hover:text-red-600';
                    e.currentTarget.lastElementChild.innerHTML = --tweetLikes;
                });
            });
        });

        // Render the image before post the tweet
        tweet_picture_home.onchange = evt => {
            const [file] = tweet_picture_home.files
            if (file) {
                image_output_home.style.display = 'block';
                image_output_home.src = URL.createObjectURL(file)
            }
        }

    </script>
@endpush
