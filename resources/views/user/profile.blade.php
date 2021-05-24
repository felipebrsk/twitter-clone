@extends('layouts.main')
@section('title', $title)

@section('content')
    <main role="main" class="sm:mb-0 mb-24">
        <div
            class="border-b border-l border-r border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 transition duration-350 ease-in-out pb-4 text-white">
            <!--Content (Center)-->
            <!-- Nav back-->
            <div
                class="flex justify-between items-center border-b px-4 py-3 sticky top-0 w-full border-gray-700 bg-black text-white">
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
                        <p class="mb-0 w-48 text-xs text-gray-400">{{ $user->tweets->count() }} Tweets</p>
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
                                        <form action="{{ route('profile.update', $user->username) }}" method="post"
                                            id="pictureform" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="file" name="profile-picture" accept="image/*" id="profile-picture"
                                                class="hidden">
                                            <label for="profile-picture" class="cursor-pointer">
                                                <img class="md rounded-full relative border-4 border-black w-36 h-36 object-cover object-center"
                                                    src="{{ asset('img/profiles/default-user.png') }}"
                                                    alt="{{ $user->username }}">
                                            </label>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Follow Button -->
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
                                                        viewBox="0 0 24 24" fill="currentColor" stroke="rgba(96, 165, 250)"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                                                                        <label for="changepicture" class="cursor-pointer">
                                                                            <img class="md rounded-full relative border-4 border-black w-36 h-36 object-cover object-center"
                                                                                src="{{ asset('img/profiles/' . $user->picture) }}"
                                                                                alt="{{ $user->username }}">
                                                                        </label>
                                                                    @else
                                                                        <input type="file" name="profile-picture"
                                                                            accept="image/*" id="changepicture"
                                                                            class="hidden">
                                                                        <label for="changepicture" class="cursor-pointer">
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
                                                <textarea name="bio" placeholder=" " class="register-input" rows="3">{{ isset($user->bio) ? $user->bio : old('bio') }}</textarea>
                                                <label for="bio" class="float-label">Bio</label>
                                            </div>
                                            <div class="register-group">
                                                <input type="text" name="location" placeholder=" " class="register-input"
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
                                                    Data de nascimento &bull; <a href="#" class="text-blue-400 hover:underline">Editar</a>
                                                </p>
                                                <p class="text-gray-200 font-bold">
                                                    {{ date('d', strtotime($user->birthdate)) }} de {{ date('M', strtotime($user->birthdate)) }} de {{ date('Y', strtotime($user->birthdate)) }}
                                                </p>
                                            </div>
                                        </form>
                                        <!-- End of Edit profile Modal -->
                                    </div>
                                </dialog>
                                <!-- /Edit profile Modal -->
                            </div>
                        </div>
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
                            <p class="mt-1">
                                {{ $user->bio }}
                            </p>
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
                                    @if ($user->site != null)
                                        <a href="{{ $site }}" target="_blank" class="text-blue-400 ml-1">
                                            {{ $user->site }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="pt-3 flex justify-start items-start w-full">
                            <div class="text-center pr-3 flex items-center border-r border-gray-800">
                                <div class="font-bold text-gray-200">
                                    520
                                </div>
                                <div class="text-gray-600 ml-1">
                                    Seguindo
                                </div>
                            </div>
                            <div class="text-center flex items-center ml-3">
                                <div class="font-bold text-gray-200">
                                    23,4m
                                </div>
                                <div class="text-gray-600 ml-1">
                                    Seguidores
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between sm:px-8 px-0 text-white mt-8 overflow-auto">
                            <div class="text-blue-400 border-b-4 border-blue-400 font-bold">
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

    <script>
        //breakdown the labels into single character spans
        $(".flp label").each(function() {
            var sop = '<span class="ch">'; //span opening
            var scl = '</span>'; //span closing
            //split the label into single letters and inject span tags around them
            $(this).html(sop + $(this).html().split("").join(scl + sop) + scl);
            //to prevent space-only spans from collapsing
            $(".ch:contains(' ')").html("&nbsp;");
        })

        var d;
        //animation time
        $(".flp input").focus(function() {
            //calculate movement for .ch = half of input height
            var tm = $(this).outerHeight() / 2 * -1 + "px";
            //label = next sibling of input
            //to prevent multiple animation trigger by mistake we will use .stop() before animating any character and clear any animation queued by .delay()
            $(this).next().addClass("focussed").children().stop(true).each(function(i) {
                d = i * 50; //delay
                $(this).delay(d).animate({
                    top: tm
                }, 200, 'easeOutBack');
            })
        })
        $(".flp input").blur(function() {
            //animate the label down if content of the input is empty
            if ($(this).val() == "") {
                $(this).next().removeClass("focussed").children().stop(true).each(function(i) {
                    d = i * 50;
                    $(this).delay(d).animate({
                        top: 0
                    }, 500, 'easeInOutBack');
                })
            }
        })

    </script>
@endpush