@extends('layouts.main')
@section('title', $title)

@section('content')
    <main role="main" class="sm:mb-0 mb-24">
        <div
            class="border-b border-l border-r border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 transition duration-350 ease-in-out pb-4 text-white">
            <!--Content (Center)-->
            <!-- Nav back-->
            <div
                class="flex justify-between items-center border-b px-4 py-3 sticky top-0 w-full border-gray-700 bg-black text-white z-50">
                <!-- Title -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('home') }}">
                        <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="24" height="24"
                            class="text-blue-500">
                            <g>
                                <path
                                    d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                                </path>
                            </g>
                        </svg>
                    </a>
                    <div class="flex flex-col sm:pl-8 pl-0">
                        <h2 class="mb-0 text-xl font-bold text-white">{{ $user->username }}</h2>
                        <p class="mb-0 w-48 text-xs text-gray-400">
                            {{ $user->tweets->count() + $user->comments->count() + $user->replies->count() }} Tweets</p>
                    </div>
                </div>
                <!-- /Title -->
            </div>

            <!-- User card-->
            <div class="w-full">
                @if ($user->banner != null)
                    <div class="flex">
                        <div class="w-full bg-cover bg-no-repeat bg-center h-52 cursor-pointer"
                            onclick="document.getElementById('myModal-{{ $user->banner }}').showModal();"
                            style="background-image: url({{ asset('img/banners/' . $user->banner) }});">
                        </div>
                        <dialog id="myModal-{{ $user->banner }}"
                            class="max-h-auto w-11/12 md:w-2/3 p-5 bg-black rounded-md text-white">
                            <div class="flex flex-col w-full h-auto ">
                                <!-- Header -->
                                <div class="flex border-b border-gray-800 mb-2 w-full h-auto justify-start items-center">
                                    <div onclick="document.getElementById('myModal-{{ $user->banner }}').close();"
                                        class="flex w-1/12 h-auto justify-center cursor-pointer">
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
                                <div
                                    class="flex w-full h-full justify-center items-center rounded text-center text-gray-500">
                                    <img src="{{ asset('img/banners/' . $user->banner) }}" alt="{{ $user->banner }}"
                                        class="w-full">
                                </div>
                                <!-- End of Modal Content-->
                            </div>
                        </dialog>
                    </div>
                @else
                    @if (Auth::user()->id === $user->id)
                        <form action="{{ route('profile.update', $user->username) }}" method="POST" id="bannerform"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <input type="file" id="banner" name="banner" accept="image/*" class="hidden">
                            <label for="banner" class="cursor-pointer">
                                <div class="w-full bg-contain bg-no-repeat bg-center h-52"
                                    style="background-image: url({{ asset('img/upload-banner.png') }});">
                                </div>
                            </label>
                        </form>
                    @else
                        <div class="w-full bg-cover bg-no-repeat bg-center h-48"
                            style="background-image: url(https://png.pngtree.com/thumb_back/fh260/back_pic/03/64/88/7957ad99ea3cbf0.jpg);">
                        </div>
                    @endif
                @endif
                <div class="p-4 border-t border-gray-800">
                    <div class="relative flex w-full">
                        <!-- Avatar -->
                        <div class="flex flex-1">
                            <div class="-mt-24">
                                <div class="w-36 h-36 md rounded-full relative avatar">
                                    @if ($user->picture != null)
                                        <div class="flex mr-2 rounded-2xl">
                                            <img class="md rounded-full relative border-4 border-black w-36 h-36 object-cover object-center cursor-pointer"
                                                onclick="document.getElementById('myModal-{{ $user->picture }}').showModal();"
                                                src="{{ asset('img/profiles/' . $user->picture) }}"
                                                alt="{{ $user->username }}">
                                            <dialog id="myModal-{{ $user->picture }}"
                                                class="max-h-auto w-11/12 md:w-1/3 p-5 bg-black rounded-md text-white">
                                                <div class="flex flex-col w-full h-auto ">
                                                    <!-- Header -->
                                                    <div
                                                        class="flex border-b border-gray-800 mb-2 w-full h-auto justify-start items-center">
                                                        <div onclick="document.getElementById('myModal-{{ $user->picture }}').close();"
                                                            class="flex w-1/12 h-auto justify-center cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="currentColor"
                                                                stroke="rgba(96, 165, 250)" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </div>
                                                        <!--Header End-->
                                                    </div>
                                                    <!-- Modal Content-->
                                                    <div
                                                        class="flex w-full h-auto py-10 px-2 justify-center items-center rounded text-center text-gray-500">
                                                        <img src="{{ asset('img/profiles/' . $user->picture) }}"
                                                            alt="{{ $user->picture }}"
                                                            class="w-full max-w-xl rounded-full">
                                                    </div>
                                                    <!-- End of Modal Content-->
                                                </div>
                                            </dialog>
                                        </div>
                                    @else
                                        @if (Auth::user()->id === $user->id)
                                            <form action="{{ route('profile.update', $user->username) }}" method="post"
                                                id="pictureform" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <input type="file" name="profile-picture" accept="image/*"
                                                    id="profile-picture" class="hidden">
                                                <label for="profile-picture" class="cursor-pointer">
                                                    <img class="md rounded-full relative border-4 border-black w-36 h-36 object-cover object-center"
                                                        src="{{ asset('img/profiles/default-user.png') }}"
                                                        alt="{{ $user->username }}">
                                                </label>
                                            </form>
                                        @else
                                            <img class="md rounded-full relative border-4 border-black w-36 h-36 object-cover object-center"
                                                src="{{ asset('img/profiles/default-user.png') }}"
                                                alt="{{ $user->username }}">
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Follow Button -->
                        @if (Auth::user()->id === $user->id)
                            <div class="flex flex-col">
                                <div class="flex mr-2 rounded-2xl">
                                    <button onclick="document.getElementById('myModal-{{ $user->id }}').showModal();"
                                        class="flex justify-center max-h-max whitespace-nowrap focus:outline-none focus:ring max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                                        Editar perfil
                                    </button>
                                    <!-- Edit profile Modal -->
                                    <dialog id="myModal-{{ $user->id }}"
                                        class="max-h-auto w-11/12 md:w-1/3 p-5 bg-black rounded-md text-white">
                                        <div class="flex flex-col w-full h-auto">
                                            <form action="{{ route('profile.update', $user->username) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                                <!-- Header -->
                                                <div
                                                    class="flex w-full border-b border-gray-800 mb-4 h-auto justify-between items-center">
                                                    <div onclick="document.getElementById('myModal-{{ $user->id }}').close();"
                                                        class="flex w-1/12 h-auto justify-center cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="currentColor"
                                                            stroke="rgba(96, 165, 250)" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-x">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </div>
                                                    <p class="text-blue-400 font-bold">
                                                        Editar perfil
                                                    </p>
                                                    <button class="next-button">Salvar</button>
                                                    <!--Header End-->
                                                </div>
                                                <div class="w-full">
                                                    @if ($user->banner != null)
                                                        <input type="file" id="changebanner" name="banner" accept="image/*"
                                                            class="hidden">
                                                        <label for="changebanner" class="cursor-pointer">
                                                            <div class="w-full bg-cover bg-no-repeat bg-center h-52"
                                                                style="background-image: url({{ asset('img/banners/' . $user->banner) }});">
                                                            </div>
                                                        </label>
                                                    @else
                                                        <input type="file" id="changebanner" name="banner" accept="image/*"
                                                            class="hidden">
                                                        <label for="changebanner" class="cursor-pointer">
                                                            <div class="w-full bg-contain bg-no-repeat bg-center h-52"
                                                                style="background-image: url({{ asset('img/upload-banner.png') }});">
                                                            </div>
                                                        </label>
                                                    @endif
                                                    <div class="p-4 border-t border-gray-800">
                                                        <div class="relative flex w-full">
                                                            <!-- Avatar -->
                                                            <div class="flex flex-1">
                                                                <div class="-mt-24">
                                                                    <div class="w-36 h-36 md rounded-full relative avatar">
                                                                        @if ($user->picture != null)
                                                                            <input type="file" name="profile-picture"
                                                                                accept="image/*" id="changepicture"
                                                                                class="hidden">
                                                                            <label for="changepicture"
                                                                                class="cursor-pointer">
                                                                                <img class="md rounded-full relative border-4 border-black w-36 h-36 object-cover object-center"
                                                                                    src="{{ asset('img/profiles/' . $user->picture) }}"
                                                                                    alt="{{ $user->username }}">
                                                                            </label>
                                                                        @else
                                                                            <input type="file" name="profile-picture"
                                                                                accept="image/*" id="changepicture"
                                                                                class="hidden">
                                                                            <label for="changepicture"
                                                                                class="cursor-pointer">
                                                                                <img class="md rounded-full relative border-4 border-black w-36 h-36 object-cover object-center"
                                                                                    src="{{ asset('img/profiles/default-user.png') }}"
                                                                                    alt="{{ $user->username }}">
                                                                            </label>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Profile info -->
                                                    </div>
                                                </div>
                                                <div class="register-group">
                                                    <input type="text" name="name" placeholder=" " class="register-input"
                                                        value="{{ isset($user->name) ? $user->name : old('name') }}" />
                                                    <label for="name" class="float-label">Nome</label>
                                                </div>
                                                <div class="register-group">
                                                    <textarea name="bio" placeholder=" " class="register-input"
                                                        rows="3">{{ isset($user->bio) ? $user->bio : old('bio') }}</textarea>
                                                    <label for="bio" class="float-label">Bio</label>
                                                </div>
                                                <div class="register-group">
                                                    <input type="text" name="location" placeholder=" "
                                                        class="register-input"
                                                        value="{{ isset($user->location) ? $user->location : old('location') }}" />
                                                    <label for="location" class="float-label">Localização</label>
                                                </div>
                                                <div class="register-group">
                                                    <input type="text" name="site" placeholder=" " class="register-input"
                                                        value="{{ isset($user->site) ? $user->site : old('site') }}" />
                                                    <label for="site" class="float-label">Site</label>
                                                </div>
                                                <div class="flex flex-col text-gray-400 mt-4">
                                                    <p>
                                                        Data de nascimento &bull; <a href="#"
                                                            class="text-blue-400 hover:underline">Editar</a>
                                                    </p>
                                                    <p class="text-gray-200 font-bold">
                                                        {{ date('d', strtotime($user->birthdate)) }} de
                                                        {{ date('M', strtotime($user->birthdate)) }} de
                                                        {{ date('Y', strtotime($user->birthdate)) }}
                                                    </p>
                                                </div>
                                            </form>
                                            <!-- End of Edit profile Modal -->
                                        </div>
                                    </dialog>
                                    <!-- /Edit profile Modal -->
                                </div>
                            </div>
                        @else
                            <div class="flex items-center sm:space-x-2 space-x-0">
                                <button
                                    class="flex justify-center whitespace-nowrap focus:outline-none focus:ring border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg py-3 font-bold px-3 rounded-full mr-0">
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
                                <button
                                    class="flex justify-center whitespace-nowrap focus:outline-none focus:ring border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg py-3 font-bold px-3 rounded-full mr-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                                    </svg>
                                </button>
                                <button
                                    class="flex justify-center whitespace-nowrap focus:outline-none focus:ring border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg font-bold py-2 px-2 rounded-full mr-0">
                                    Seguir
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Profile info -->
                    <div class="w-full mt-3 ml-3">
                        <!-- User basic-->
                        <div>
                            <h2 class="text-xl leading-6 font-bold text-white">{{ $user->name }}
                            </h2>
                            <p class="text-sm leading-5 font-medium text-gray-600">{{ '@' . $user->username }}</p>
                        </div>
                        <!-- Description and others -->
                        <div class="mt-3 text-gray-400 leading-tight mb-2">
                            @if ($user->bio != null)
                                <p class="mt-1">
                                    {{ $user->bio }}
                                </p>
                            @endif
                            <div class="text-gray-600 mt-2 sm:flex sm:space-x-3 space-x-0 sm:space-y-0 space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z" />
                                    </svg>
                                    <div>
                                        {{ $user->location }}
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" class="h-5 w-5">
                                        <g>
                                            <path
                                                d="M7.75 11.083c-.414 0-.75-.336-.75-.75C7 7.393 9.243 5 12 5c.414 0 .75.336.75.75s-.336.75-.75.75c-1.93 0-3.5 1.72-3.5 3.833 0 .414-.336.75-.75.75z">
                                            </path>
                                            <path
                                                d="M20.75 10.333c0-5.01-3.925-9.083-8.75-9.083s-8.75 4.074-8.75 9.083c0 4.605 3.32 8.412 7.605 8.997l-1.7 1.83c-.137.145-.173.357-.093.54.08.182.26.3.46.3h4.957c.198 0 .378-.118.457-.3.08-.183.044-.395-.092-.54l-1.7-1.83c4.285-.585 7.605-4.392 7.605-8.997zM12 17.917c-3.998 0-7.25-3.402-7.25-7.584S8.002 2.75 12 2.75s7.25 3.4 7.25 7.583-3.252 7.584-7.25 7.584z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span class="leading-5 ml-1">
                                        Nascido em {{ date('d', strtotime($user->birthdate)) }} de
                                        {{ date('M', strtotime($user->birthdate)) }} de
                                        {{ date('Y', strtotime($user->birthdate)) }}
                                    </span>
                                </div>
                            </div>
                            <div class="text-gray-600 mt-2 sm:flex sm:space-x-3 space-x-0 items-center">
                                <div class="flex items-center">
                                    <svg viewBox="0 0 24 24" class="h-5 w-5 text-gray-500" fill="currentColor">
                                        <g>
                                            <path
                                                d="M19.708 2H4.292C3.028 2 2 3.028 2 4.292v15.416C2 20.972 3.028 22 4.292 22h15.416C20.972 22 22 20.972 22 19.708V4.292C22 3.028 20.972 2 19.708 2zm.792 17.708c0 .437-.355.792-.792.792H4.292c-.437 0-.792-.355-.792-.792V6.418c0-.437.354-.79.79-.792h15.42c.436 0 .79.355.79.79V19.71z">
                                            </path>
                                            <circle cx="7.032" cy="8.75" r="1.285"></circle>
                                            <circle cx="7.032" cy="13.156" r="1.285"></circle>
                                            <circle cx="16.968" cy="8.75" r="1.285"></circle>
                                            <circle cx="16.968" cy="13.156" r="1.285"></circle>
                                            <circle cx="12" cy="8.75" r="1.285"></circle>
                                            <circle cx="12" cy="13.156" r="1.285"></circle>
                                            <circle cx="7.032" cy="17.486" r="1.285"></circle>
                                            <circle cx="12" cy="17.486" r="1.285"></circle>
                                        </g>
                                    </svg>
                                    <div class="flex">
                                        <span class="leading-5 ml-1">
                                            Ingressou em {{ $user->created_at->format('M') }} de
                                            {{ $user->created_at->format('Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @if ($user->site != null)
                                <div class="text-gray-600 mt-2 sm:flex sm:space-x-3 space-x-0">
                                    <div class="flex items-center">
                                        <svg viewBox="0 0 24 24" class="h-5 w-5 text-gray-500" fill="currentColor">
                                            <g>
                                                <path
                                                    d="M11.96 14.945c-.067 0-.136-.01-.203-.027-1.13-.318-2.097-.986-2.795-1.932-.832-1.125-1.176-2.508-.968-3.893s.942-2.605 2.068-3.438l3.53-2.608c2.322-1.716 5.61-1.224 7.33 1.1.83 1.127 1.175 2.51.967 3.895s-.943 2.605-2.07 3.438l-1.48 1.094c-.333.246-.804.175-1.05-.158-.246-.334-.176-.804.158-1.05l1.48-1.095c.803-.592 1.327-1.463 1.476-2.45.148-.988-.098-1.975-.69-2.778-1.225-1.656-3.572-2.01-5.23-.784l-3.53 2.608c-.802.593-1.326 1.464-1.475 2.45-.15.99.097 1.975.69 2.778.498.675 1.187 1.15 1.992 1.377.4.114.633.528.52.928-.092.33-.394.547-.722.547z">
                                                </path>
                                                <path
                                                    d="M7.27 22.054c-1.61 0-3.197-.735-4.225-2.125-.832-1.127-1.176-2.51-.968-3.894s.943-2.605 2.07-3.438l1.478-1.094c.334-.245.805-.175 1.05.158s.177.804-.157 1.05l-1.48 1.095c-.803.593-1.326 1.464-1.475 2.45-.148.99.097 1.975.69 2.778 1.225 1.657 3.57 2.01 5.23.785l3.528-2.608c1.658-1.225 2.01-3.57.785-5.23-.498-.674-1.187-1.15-1.992-1.376-.4-.113-.633-.527-.52-.927.112-.4.528-.63.926-.522 1.13.318 2.096.986 2.794 1.932 1.717 2.324 1.224 5.612-1.1 7.33l-3.53 2.608c-.933.693-2.023 1.026-3.105 1.026z">
                                                </path>
                                            </g>
                                        </svg>
                                        <a href="{{ $user->site }}" target="_blank" class="text-blue-400 ml-1">
                                            {{ $user->site }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="pt-3 flex justify-start items-start w-full">
                            <a href="#" class="hover:underline">
                                <div class="text-center pr-3 flex items-center border-r border-gray-800">
                                    <div class="font-bold text-gray-200">
                                        520
                                    </div>
                                    <div class="text-gray-600 ml-1">
                                        Seguindo
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="hover:underline">
                                <div class="text-center flex items-center ml-3">
                                    <div class="font-bold text-gray-200">
                                        23,4m
                                    </div>
                                    <div class="text-gray-600 ml-1">
                                        Seguidores
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="flex items-center justify-between sm:px-8 -mb-8 px-0 text-white mt-8 overflow-auto">
                            <div class="text-blue-400 border-b-4 border-blue-400 font-bold py-2">
                                <a href="#">
                                    Tweets
                                </a>
                            </div>
                            <div class="hover:text-blue-400 font-medium text-gray-300 transition-colors">
                                <a href="#">
                                    Tweets e respostas
                                </a>
                            </div>
                            <div class="hover:text-blue-400 font-medium text-gray-300 transition-colors">
                                <a href="#">
                                    Mídia
                                </a>
                            </div>
                            <div class="hover:text-blue-400 font-medium text-gray-300 transition-colors">
                                <a href="#">
                                    Curtidas
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @foreach ($user->tweets as $tweet)
        <div class="border-l border-r border-t @if ($loop->last) border-b mb-24 @endif border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer
            transition duration-350 ease-in-out pb-4">
            <div class="flex flex-shrink-0 p-4 pb-0">
                <a href="#" class="flex-shrink-0 group block">
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
                            <p class="flex items-center text-base leading-6 font-medium text-white">
                                <b class="hover:underline">{{ $tweet->user->name }}</b>
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
                                    <b class="hover:underline"
                                        title="{{ $tweet->created_at->format('d/m/Y, H:i:s') }}">{{ $tweet->created_at->diffForHumans() }}</b>
                                </span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="pl-16">
                <a href="{{ route('tweet.show', $tweet->id) }}">
                    <p class="text-base width-auto font-medium text-white flex-shrink px-1">
                        {!! nl2br(e($tweet->body)) !!}
                    </p>
                </a>

                @if ($tweet->photo != null)
                    <div class="flex mr-2 rounded-2xl border border-gray-600 max-w-lg">
                        <img class="rounded-2xl object-center object-cover cursor-pointer"
                            onclick="document.getElementById('myModal-{{ $tweet->id }}').showModal()"
                            src="{{ asset('img/tweets/medium/' . $tweet->photo) }}" alt="{{ $tweet->photo }}" />
                        <dialog id="myModal-{{ $tweet->id }}"
                            class="max-h-auto w-11/12 md:w-4/5 p-5 bg-black rounded-md text-white">
                            <div class="flex flex-col w-full h-auto ">
                                <!-- Header -->
                                <div class="flex w-full h-auto justify-start items-center">
                                    <div onclick="document.getElementById('myModal-{{ $tweet->id }}').close();"
                                        class="flex w-1/12 h-auto justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="currentColor" stroke="#FFF" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>
                                    <!--Header End-->
                                </div>
                                <!-- Modal Content-->
                                <div
                                    class="flex w-full h-auto py-10 px-2 justify-center items-center rounded text-center text-gray-500">
                                    <img src="{{ asset('img/tweets/large/' . $tweet->photo) }}"
                                        alt="{{ $tweet->photo }}" class="w-full max-w-7xl cursor-default">
                                </div>
                                <!-- End of Modal Content-->
                            </div>
                        </dialog>
                    </div>
                @endif

                <div class="flex mt-8">
                    <div class="w-full">
                        <div class="flex items-center md:justify-between justify-end md:pr-16 pr-4 md:space-x-0 space-x-8">
                            <div
                                class="flex items-center text-white text-xs hover:text-blue-400 transition duration-350 ease-in-out">
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
                                <div class="like-button text-white text-xs hover:text-red-600 ">
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
@endsection

@push('scripts')
    <script>
        $('#banner').on('change', function() {
            $('#bannerform').submit();
        });
        $('#profile-picture').on('change', function() {
            $('#pictureform').submit();
        });

    </script>
@endpush
