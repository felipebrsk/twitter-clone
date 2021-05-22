@extends('layouts.main')
@section('title', 'Página Inicial')

@section('content')
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
    <form action="{{ route('tweet.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
        @csrf
        <div class="md:block hidden border-b border-l border-r border-dim-200">
            @if ($errors->any())
                <div class="error-content">
                    <div class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24">
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

                    @else
                        <img class="inline-block h-10 w-10 rounded-full"
                            src="{{ asset('img/profiles/default-user.png') }}" alt="{{ Auth::user()->username }}">
                    @endif
                </div>
                <div class="flex-1 px-2 pt-2 mt-2">
                    <textarea class="bg-transparent text-gray-400 font-medium text-lg w-full focus:outline-none" rows="2"
                        cols="50" name="body" placeholder="O que está acontecendo?">{{ old('body') }}</textarea>
                    <img id="blah" src="#" alt="Imagem" class="hidden w-full rounded" />
                </div>
            </div>
            <!--middle creat tweet below icons-->
            <div class="flex items-center">
                <div class="w-full pl-11">
                    <div class="flex items-center">
                        <div class="text-center px-1 py-1 m-2">
                            <label for="tweet_picture" class="cursor-pointer status-svg">
                                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </label>
                            <input type="file" name="tweet_picture" id="tweet_picture" class="hidden">
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
                    <button
                        class="bg-blue-400 mr-4 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full focus:outline-none">
                        Tweet
                    </button>
                </div>
            </div>
        </div>
    </form>
    <!-- /Post Tweet -->

    <!-- Tweet -->
    @foreach ($tweets as $tweet)
        <div class="border-t border-l border-r @if ($loop->last) border-b @endif border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer
            transition duration-350 ease-in-out pb-4">
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
                        {{ $tweet->body }}
                    </p>
                </a>

                @if ($tweet->photo != null)
                    <div class="flex mr-2 rounded-2xl border border-gray-600">
                        <img class="rounded-2xl object-center object-cover"
                            onclick="document.getElementById('myModal-{{ $tweet->id }}').showModal()"
                            src="{{ asset('img/tweets/medium/' . $tweet->photo) }}" alt="{{ $tweet->photo }}" />
                        <dialog id="myModal-{{ $tweet->id }}" class="max-h-auto w-11/12 md:w-4/5 p-5 bg-black rounded-md text-white">
                            <div class="flex flex-col w-full h-auto ">
                                <!-- Header -->
                                <div class="flex w-full h-auto justify-start items-center">
                                    <div onclick="document.getElementById('myModal-{{ $tweet->id }}').close();"
                                        class="flex w-1/12 h-auto justify-center cursor-pointer">
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
                                    <img src="{{ asset('img/tweets/large/' . $tweet->photo) }}" alt="{{ $tweet->photo }}" class="w-full max-w-7xl">
                                </div>
                                <!-- End of Modal Content-->
                            </div>
                            <div class="flex justify-center items-center">
                                
                            </div>
                        </dialog>
                    </div>
                @endif

                <div class="flex mt-8">
                    <div class="w-full">
                        <div class="flex items-center md:justify-between justify-end md:pr-16 pr-4 md:space-x-0 space-x-8">
                            <div
                                class="flex items-center text-white text-xs hover:text-blue-400 transition duration-350 ease-in-out">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                    <g>
                                        <path
                                            d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                        </path>
                                    </g>
                                </svg>
                                {{ $tweet->comments->count() }}
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

        // Render the image before post the tweet
        tweet_picture.onchange = evt => {
            const [file] = tweet_picture.files
            if (file) {
                blah.style.display = 'block';
                blah.src = URL.createObjectURL(file)
            }
        }

    </script>
@endpush
