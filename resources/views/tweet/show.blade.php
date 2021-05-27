@extends('layouts.main')
@section('title', $title)

@section('content')
    @php
    $likeCount = $tweet->likes()->count();
    @endphp
    <div class="show-header">
        <!-- Title -->
        <div class="flex items-center space-x-6">
            <a href="{{ url()->previous() }}">
                <svg viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" width="24" height="24"
                    class="text-blue-500">
                    <g>
                        <path
                            d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                        </path>
                    </g>
                </svg>
            </a>
            <h2 class="text-gray-400 font-black text-xl">
                Tweet
            </h2>
        </div>
        <!-- /Title -->
    </div>

    <div class="border-dim-200 tweet-content border-b">
        <div class="flex flex-shrink-0 p-4 pb-0">
            <a href="{{ route('profile.show', $tweet->user->username) }}" class="flex-shrink-0 group block">
                <div class="flex items-center">
                    <div>
                        @if ($tweet->user->picture != null)
                            <img src="{{ asset('img/profiles/' . $tweet->user->picture) }}"
                                class="inline-block profile-pictures" alt="{{ $tweet->user->username }}">
                        @else
                            <img class="inline-block profile-pictures" src="{{ asset('img/profiles/default-user.png') }}"
                                alt="{{ $tweet->user->username }}" />
                        @endif
                    </div>
                    <div class="ml-3">
                        <div class="text-white">
                            <div class="flex justify-between items-center">
                                <div>
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
                                </div>
                                <a href="#">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12" height="12"
                                        fill="currentColor" viewBox="0 0 992 992" class="text-white">
                                        <g>
                                            <circle cx="144.3" cy="496" r="144.3" />
                                            <circle cx="496" cy="496" r="144.3" />
                                            <circle cx="847.7" cy="496" r="144.3" />
                                            <circle cx="847.7" cy="496" r="144.3" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="tweet-username ml-0">
                            {{ '@' . $tweet->user->username }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="px-4 mt-4">
            <p class="tweet-body sm:max-w-xl max-w-sm">
                {!! nl2br(e($tweet->body)) !!}
            </p>

            @if ($tweet->photo != null)
                <div class="photo-container max-w-full">
                    <img class="tweet-img" onclick="document.getElementById('myModal-{{ $tweet->photo }}').showModal()"
                        src="{{ asset('img/tweets/medium/' . $tweet->photo) }}" alt="{{ $tweet->photo }}" />
                    <dialog id="myModal-{{ $tweet->photo }}" class="modal-img">
                        <div class="flex flex-col w-full h-auto ">
                            <!-- Header -->
                            <div class="modal-header">
                                <div onclick="document.getElementById('myModal-{{ $tweet->photo }}').close();"
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
                            <div class="modal-content">
                                <img src="{{ asset('img/tweets/large/' . $tweet->photo) }}" alt="{{ $tweet->photo }}"
                                    class="w-full max-w-7xl">
                            </div>
                            <!-- End of Modal Content-->
                        </div>
                    </dialog>
                </div>
            @endif

            <div class="tweet-createdat">
                <a href="{{ route('tweet.show', $tweet->id) }}" class="hover:underline">
                    {{ $tweet->created_at->format('H:i A') }} &bull; {{ $tweet->created_at->format('d') }} de
                    {{ $tweet->created_at->format('M') }} de {{ $tweet->created_at->format('Y') }}
                </a> &nbsp;&bull; Twitter Web App
            </div>

            <div class="tweet-interaction-content border-dim-200">
                <div class="tweet-interactions">
                    <div class="interact">
                        <strong class="font-bold text-white">14</strong> Retweets
                    </div>
                    <div class="interact">
                        <strong class="font-bold text-white likeCount">{{ $likeCount }}</strong> Curtidas
                    </div>
                </div>
            </div>

            <div class="flex mt-4">
                <div class="w-full">
                    <div class="tweet-actions-modal">
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('myModal-{{ $tweet->id }}').showModal();">
                            <div class="tweet-action-icons hover:text-blue-400">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                    <g>
                                        <path
                                            d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                        </path>
                                    </g>
                                </svg>
                                {{ $tweet->comments->count() }}
                            </div>
                        </a>

                        <!-- Comment modal -->
                        <dialog id="myModal-{{ $tweet->id }}" class="modal-comment">
                            <div class="flex flex-col w-full h-auto">
                                <!-- Header -->
                                <div class="modal-header border-b border-dim-200">
                                    <div onclick="document.getElementById('myModal-{{ $tweet->id }}').close();"
                                        class="flex w-1/12 h-auto cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="currentColor" stroke="rgba(96, 165, 250)" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>
                                    <!--Header End-->
                                </div>
                                <!-- Modal Comment Content-->
                                <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                    <input type="hidden" name="author_id" value="{{ $tweet->user->id }}">
                                    @csrf
                                    <div class="modal-comment-content">
                                        <div class="flex items-center">
                                            <div>
                                                @if ($tweet->user->picture != null)
                                                    <img src="{{ asset('img/profiles/' . $tweet->user->picture) }}"
                                                        alt="{{ $tweet->user->username }}" class="profile-pictures">
                                                @else
                                                    <img class="inline-block profile-pictures"
                                                        src="{{ asset('img/profiles/default-user.png') }}"
                                                        alt="{{ $tweet->user->username }}" />
                                                @endif
                                            </div>
                                            <div class="ml-3 flex flex-col">
                                                <p class="tweet-head">
                                                    <a href="#">
                                                        <b class="hover:underline">{{ $tweet->user->name }}</b>
                                                    </a>
                                                    @if ($tweet->user->verified === 1)
                                                        <svg viewBox="0 0 24 24" aria-label="Verified account"
                                                            fill="currentColor" class="w-4 h-4 ml-1">
                                                            <g>
                                                                <path
                                                                    d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    @endif
                                                    <span class="tweet-username">
                                                        {{ '@' . $tweet->user->username }} &bull;
                                                        <b class="hover:underline"
                                                            title="{{ $tweet->created_at->format('d/m/Y, H:i:s') }}">{{ $tweet->created_at->diffForHumans() }}</b>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="border-l border-dim-200 h-full absolute ml-5" style="z-index: -1"></div>
                                        <div class="text-white" style="padding-left: 53px;">
                                            <p>
                                                {{ Str::limit($tweet->body, 255, '...') }}
                                            </p>
                                            @if ($tweet->photo != null)
                                                <div class="photo-container">
                                                    <img class="tweet-img"
                                                        onclick="document.getElementById('myModal-{{ $tweet->photo }}').showModal()"
                                                        src="{{ asset('img/tweets/medium/' . $tweet->photo) }}"
                                                        alt="{{ $tweet->photo }}" />
                                                    <dialog id="myModal-{{ $tweet->photo }}" class="modal-img">
                                                        <div class="flex flex-col w-full h-auto ">
                                                            <!-- Header -->
                                                            <div class="modal-header">
                                                                <div onclick="document.getElementById('myModal-{{ $tweet->photo }}').close();"
                                                                    class="flex w-1/12 h-auto justify-center cursor-pointer">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="currentColor"
                                                                        stroke="#FFF" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-x">
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
                                        </div>
                                        <div class="text-gray-400 pl-12 mt-2">
                                            Respondendo a
                                            <a href="{{ route('profile.show', $tweet->user->username) }}"
                                                class="font-normal text-blue-400 hover:underline">{{ '@' . $tweet->user->username }}</a>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="mt-4">
                                                @if (Auth::user()->picture != null)
                                                    <img src="{{ asset('img/profiles/' . Auth::user()->picture) }}"
                                                        alt="{{ Auth::user()->username }}" class="profile-pictures">
                                                @else
                                                    <img class="inline-block profile-pictures"
                                                        src="{{ asset('img/profiles/default-user.png') }}"
                                                        alt="{{ Auth::user()->username }}" />
                                                @endif
                                            </div>
                                            <textarea name="comment" class="modal-comment-textarea border-dim-200"
                                                placeholder="Tweete sua resposta...">{{ old('comment') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="flex justify-end items-center">
                                        <div class="px-1 py-1 m-2 ml-8">
                                            <label for="comment_picture" class="cursor-pointer status-svg">
                                                <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </label>
                                            <input type="file" name="comment_picture" id="comment_picture" class="hidden">
                                        </div>
                                        <button type="submit" class="answer-button">Responder</button>
                                    </div>
                                </form>
                                <!-- End of Modal Comment Content-->
                            </div>
                        </dialog>
                        <!-- End of omment modal -->

                        <div class="tweet-action-icons hover:text-green-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <g>
                                    <path
                                        d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                                    </path>
                                </g>
                            </svg>
                        </div>

                        @php
                            $i = Auth::user()
                                ->likes()
                                ->count();
                            
                            $c = 1;
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
                                    </a>
                                </div>
                            @break
                            
                        @elseif ($i == $c)
                            <div class="like-button text-xs hover:text-red-600 ">
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
                                </a>
                            </div>
                        @endif

                        @php
                            $c++;
                        @endphp

                        @endforeach

                        @if ($i == 0)
                            <div class="like-button text-xs hover:text-red-600 ">
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

    @foreach ($tweet->comments as $comment)
        <div class="tweet-content border-dim-200 p-4 @if ($loop->last) border-b mb-48 @endif">
            <a href="{{ route('profile.show', $comment->user->username) }}" class="flex-shrink-0 group block">
                <div class="flex items-center">
                    <div>
                        @if ($comment->user->picture != null)
                            <img src="{{ asset('img/profiles/' . $comment->user->picture) }}"
                                alt="{{ $comment->user->username }}" class="profile-pictures">
                        @else
                            <img class="inline-block profile-pictures" src="{{ asset('img/profiles/default-user.png') }}"
                                alt="{{ $comment->user->username }}" />
                        @endif
                    </div>
                    <div class="ml-3 flex flex-col">
                        <p class="tweet-head">
                            <b class="hover:underline">{{ $comment->user->name }}</b>

                            @if ($comment->user->verified === 1)
                                <svg viewBox="0 0 24 24" aria-label="Conta verificada" fill="currentColor"
                                    class="w-4 h-4 ml-1">
                                    <g>
                                        <path
                                            d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                        </path>
                                    </g>
                                </svg>
                            @endif

                            <span class="tweet-username">
                                {{ '@' . $comment->user->username }} &bull;
                                <b class="hover:underline"
                                    title="{{ $comment->created_at->format('d/m/Y, H:i:s') }}">{{ $comment->created_at->diffForHumans() }}</b>
                            </span>
                        </p>
                        <a href="#">
                            <p class="text-gray-500">
                                Em resposta a <a href="{{ route('profile.show', $tweet->user->username) }}"
                                    class="text-blue-500 hover:underline text-sm font-normal">{{ '@' . $tweet->user->username }}</a>
                            </p>
                        </a>
                    </div>
                </div>
                <div style="padding-left: 53px;" class="text-gray-300">
                    {{ $comment->comment }}
                </div>
                
                @if ($comment->photo)
                    <div class="mt-3">
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('myModal-{{ $comment->photo }}').showModal();">
                            <img src="{{ asset('img/tweets/large/' . $comment->photo) }}" alt="Picture"
                                class="object-cover rounded-lg">
                        </a>
                    </div>
                    <dialog id="myModal-{{ $comment->photo }}" class="modal-img">
                        <div class="flex flex-col w-full h-auto ">
                            <!-- Header -->
                            <div class="modal-header">
                                <div onclick="document.getElementById('myModal-{{ $comment->photo }}').close();"
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
                            <div class="modal-content">
                                <img src="{{ asset('img/tweets/large/' . $comment->photo) }}"
                                    alt="{{ $comment->photo }}" class="w-full max-w-7xl">
                            </div>
                            <!-- End of Modal Content-->
                        </div>
                    </dialog>
                @endif

                <div class="flex mt-8 pr-8" style="padding-left: 53px;">
                    <div class="w-full">
                        <div class="comments-icons">
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('myModal-{{ $comment->id }}').showModal();">
                                <div class="tweet-action-icons hover:text-blue-400">
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                        <g>
                                            <path
                                                d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                            </path>
                                        </g>
                                    </svg>
                                    {{ $comment->replies->count() }}
                                </div>
                            </a>

                            <!-- Comment modal -->
                            <dialog id="myModal-{{ $comment->id }}" class="modal-comment">
                                <div class="flex flex-col w-full h-auto">
                                    <!-- Header -->
                                    <div class="flex w-full h-auto justify-start items-center border-b border-dim-200">
                                        <div onclick="document.getElementById('myModal-{{ $comment->id }}').close();"
                                            class="flex w-1/12 h-auto cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="currentColor" stroke="rgba(96, 165, 250)"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </div>
                                        <!--Header End-->
                                    </div>
                                    <!-- Modal Comment Content-->
                                    <form action="{{ route('reply.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="tweet_author" value="{{ $comment->tweet->user_id }}">
                                        <input type="hidden" name="author_id" value="{{ $comment->user->id }}">
                                        @csrf
                                        <div class="modal-comment-content">
                                            <div class="flex items-center">
                                                <div>
                                                    @if ($comment->user->picture != null)
                                                        <img src="{{ asset('img/profiles/' . $comment->user->picture) }}"
                                                            alt="{{ $comment->user->username }}"
                                                            class="profile-pictures">
                                                    @else
                                                        <img class="inline-block profile-pictures"
                                                            src="{{ asset('img/profiles/default-user.png') }}"
                                                            alt="{{ $comment->user->username }}" />
                                                    @endif
                                                </div>
                                                <div class="ml-3 flex flex-col">
                                                    <p class="tweet-head">
                                                        <a href="#">
                                                            <b class="hover:underline">{{ $comment->user->name }}</b>
                                                        </a>
                                                        @if ($comment->user->verified === 1)
                                                            <svg viewBox="0 0 24 24" aria-label="Verified account"
                                                                fill="currentColor" class="w-4 h-4 ml-1">
                                                                <g>
                                                                    <path
                                                                        d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        @endif
                                                        <span class="tweet-username">
                                                            {{ '@' . $comment->user->username }} &bull;
                                                            <b class="hover:underline"
                                                                title="{{ $comment->created_at->format('d/m/Y, H:i:s') }}">{{ $comment->created_at->diffForHumans() }}</b>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="border-l border-dim-200 h-full absolute ml-5" style="z-index: -1">
                                            </div>
                                            <div class="text-white" style="padding-left: 53px;">
                                                <p>
                                                    {{ Str::limit($comment->comment, 255, '...') }}
                                                </p>

                                                @if ($comment->photo != null)
                                                    <div class="photo-container">
                                                        <img class="rounded-2xl object-center object-cover cursor-pointer"
                                                            onclick="document.getElementById('myModal-{{ $comment->photo }}').showModal()"
                                                            src="{{ asset('img/tweets/medium/' . $comment->photo) }}"
                                                            alt="{{ $comment->photo }}" />
                                                        <dialog id="myModal-{{ $comment->photo }}" class="modal-img">
                                                            <div class="flex flex-col w-full h-auto ">
                                                                <!-- Header -->
                                                                <div class="flex w-full h-auto justify-start items-center">
                                                                    <div onclick="document.getElementById('myModal-{{ $comment->photo }}').close();"
                                                                        class="flex w-1/12 h-auto justify-center cursor-pointer">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24"
                                                                            fill="currentColor" stroke="#FFF"
                                                                            stroke-width="2" stroke-linecap="round"
                                                                            stroke-linejoin="round"
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
                                                                    <img src="{{ asset('img/tweets/large/' . $comment->photo) }}"
                                                                        alt="{{ $comment->photo }}"
                                                                        class="w-full max-w-7xl">
                                                                </div>
                                                                <!-- End of Modal Content-->
                                                            </div>
                                                            <div class="flex justify-center items-center">

                                                            </div>
                                                        </dialog>
                                                    </div>
                                                @endif
                                                
                                            </div>
                                            <div class="text-gray-400 pl-12 mt-2">
                                                Respondendo a
                                                <a href="{{ route('profile.show', $comment->user->username) }}"
                                                    class="font-normal text-blue-400 hover:underline">{{ '@' . $comment->user->username }}</a>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="mt-4">
                                                    @if (Auth::user()->picture != null)
                                                        <img src="{{ asset('img/profiles/' . Auth::user()->picture) }}"
                                                            alt="{{ Auth::user()->username }}"
                                                            class="profile-pictures">
                                                    @else
                                                        <img class="inline-block profile-pictures"
                                                            src="{{ asset('img/profiles/default-user.png') }}"
                                                            alt="{{ Auth::user()->username }}" />
                                                    @endif
                                                </div>
                                                <textarea name="reply" class="modal-comment-textarea border-dim-200"
                                                    placeholder="Tweete sua resposta...">{{ old('reply') }}</textarea>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="answer-button">Responder</button>
                                    </form>
                                    <!-- End of Modal Comment Content-->
                                </div>
                                <div class="flex justify-center items-center">

                                </div>
                            </dialog>
                            <!-- End of omment modal -->

                            <a href="#">
                                <div
                                    class="tweet-action-icons hover:text-green-400">
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                        <g>
                                            <path
                                                d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                                            </path>
                                        </g>
                                    </svg>
                                    200
                                </div>
                            </a>
                            @php
                                $o = Auth::user()->likesComments->count();
                                
                                $j = 1;
                            @endphp

                            @foreach (Auth::user()->likesComments as $likeComment)

                                @if ($likeComment->comment_id == $comment->id)
                                    <div class="like-button text-red-600">
                                        <a href="#" class="unlike-comment flex items-center"
                                            data-commentId="{{ $comment->id }}"
                                            data-authorId="{{ $comment->user->id }}"
                                            data-commentLikes="{{ $comment->likes->count() }}"
                                            data-tweetId="{{ $comment->tweet->id }}">
                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                <g>
                                                    <path
                                                        d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <p>
                                                {{ $comment->likes->count() }}
                                            </p>
                                        </a>
                                    </div>
                                @break

                            @elseif ($o == $j)
                                <div class="like-button text-xs hover:text-red-600 ">
                                    <a href="#" class="like-comment flex items-center"
                                        data-commentId="{{ $comment->id }}" data-authorId="{{ $comment->user->id }}"
                                        data-commentLikes="{{ $comment->likes->count() }}"
                                        data-tweetId="{{ $comment->tweet->id }}">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                            <g>
                                                <path
                                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                </path>
                                            </g>
                                        </svg>
                                        <p>
                                            {{ $comment->likes->count() }}
                                        </p>
                                    </a>
                                </div>
                            @endif

                            @php
                                $j++;
                            @endphp

                            @endforeach

                            @if ($o == 0)
                                <div class="like-button text-xs hover:text-red-600 ">
                                    <a href="#" class="like-comment flex items-center" data-commentId="{{ $comment->id }}"
                                        data-authorId="{{ $comment->user->id }}" data-commentLikes="{{ $comment->likes->count() }}"
                                        data-tweetId="{{ $comment->tweet->id }}">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                            <g>
                                                <path
                                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                </path>
                                            </g>
                                        </svg>
                                        <p>
                                            {{ $comment->likes->count() }}
                                        </p>
                                    </a>
                                </div>
                            @endif

                            <a href="#">
                                <div class="flex items-center text-xs hover:text-blue-400 transition duration-350 ease-in-out">
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
                            </a>
                        </div>
                    </div>
                </div>
            </a>

    @if (count($comment->replies) > 0)
        @foreach ($comment->replies as $reply)
            <a href="{{ route('profile.show', $reply->user->username) }}" class="flex-shrink-0 group block mt-2">
                <div class="flex items-center">
                    <div>
                        @if ($reply->user->picture != null)
                            <img src="{{ asset('img/profiles/' . $reply->user->picture) }}"
                                alt="{{ $reply->user->username }}" class="profile-pictures">
                        @else
                            <img class="inline-block profile-pictures"
                                src="{{ asset('img/profiles/default-user.png') }}"
                                alt="{{ $reply->user->username }}" />
                        @endif
                    </div>
                    <div class="ml-3 flex flex-col">
                        <p class="tweet-head">
                            <b class="hover:underline">{{ $reply->user->name }}</b>

                            @if ($reply->user->verified === 1)
                                <svg viewBox="0 0 24 24" aria-label="Verified account" fill="currentColor"
                                    class="w-4 h-4 ml-1">
                                    <g>
                                        <path
                                            d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                        </path>
                                    </g>
                                </svg>
                            @endif

                            <span class="tweet-username">
                                {{ '@' . $reply->user->username }} &bull;
                                <b class="hover:underline"
                                    title="{{ $reply->created_at->format('d/m/Y, H:i:s') }}">{{ $reply->created_at->diffForHumans() }}</b>
                            </span>
                        </p>
                        <a href="#">
                            <p class="text-gray-500">
                                Em resposta a <a href="{{ route('profile.show', $comment->user->username) }}"
                                    class="text-blue-500 hover:underline text-sm font-normal">{{ '@' . $comment->user->username }}</a>
                            </p>
                        </a>
                    </div>
                </div>
                <div style="padding-left: 53px;" class="text-gray-300">
                    {{ $reply->reply }}
                </div>
                <div class="flex mt-8 pr-8" style="padding-left: 53px;">
                    <div class="w-full">
                        <div class="flex items-center justify-between text-gray-400">
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('myModal-{{ $reply->id }}').showModal();">
                                <div
                                    class="flex items-center text-xs hover:text-blue-400 transition duration-350 ease-in-out">
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                        <g>
                                            <path
                                                d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </a>

                            <!-- Comment modal -->
                            <dialog id="myModal-{{ $reply->id }}" class="modal-comment">
                                <div class="flex flex-col w-full h-auto">
                                    <!-- Header -->
                                    <div class="reply-modal border-dim-200">
                                        <div onclick="document.getElementById('myModal-{{ $reply->id }}').close();"
                                            class="flex w-1/12 h-auto cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="currentColor" stroke="rgba(96, 165, 250)"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </div>
                                        <!--Header End-->
                                    </div>
                                    <!-- Modal Comment Content-->
                                    <form action="{{ route('reply.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                        <input type="hidden" name="comment_id" value="{{ $reply->id }}">
                                        @csrf
                                        <div class="modal-comment-content">
                                            <div class="flex items-center">
                                                <div>
                                                    @if ($reply->user->picture != null)
                                                        <img src="{{ asset('img/profiles/' . $reply->user->picture) }}"
                                                            alt="{{ $reply->user->username }}" class="profile-pictures">
                                                    @else
                                                        <img class="inline-block profile-pictures"
                                                            src="{{ asset('img/profiles/default-user.png') }}"
                                                            alt="{{ $reply->user->username }}" />
                                                    @endif
                                                </div>
                                                <div class="ml-3 flex flex-col">
                                                    <p class="tweet-head">
                                                        <a href="#">
                                                            <b class="hover:underline">{{ $reply->user->name }}</b>
                                                        </a>

                                                        @if ($reply->user->verified === 1)
                                                            <svg viewBox="0 0 24 24" aria-label="Verified account"
                                                                fill="currentColor" class="w-4 h-4 ml-1">
                                                                <g>
                                                                    <path
                                                                        d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        @endif

                                                        <span class="tweet-username">
                                                            {{ '@' . $reply->user->username }} &bull;
                                                            <b class="hover:underline"
                                                                title="{{ $reply->created_at->format('d/m/Y, H:i:s') }}">{{ $reply->created_at->diffForHumans() }}</b>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="border-l border-dim-200 h-full absolute ml-5" style="z-index: -1">
                                            </div>
                                            <div class="text-white" style="padding-left: 53px;">
                                                <p>
                                                    {{ Str::limit($reply->reply, 255, '...') }}
                                                </p>
                                            </div>
                                            <div class="text-gray-400 pl-12 mt-2">
                                                Respondendo a
                                                <a href="{{ route('profile.show', $reply->user->username) }}"
                                                    class="font-normal text-blue-400 hover:underline">{{ '@' . $reply->user->username }}</a>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="mt-4">
                                                    @if (Auth::user()->picture != null)
                                                        <img src="{{ asset('img/profiles/' . Auth::user()->picture) }}"
                                                            alt="{{ Auth::user()->username }}" class="profile-pictures">
                                                    @else
                                                        <img class="inline-block profile-pictures"
                                                            src="{{ asset('img/profiles/default-user.png') }}"
                                                            alt="{{ Auth::user()->username }}" />
                                                    @endif
                                                </div>
                                                <textarea name="reply" class="modal-comment-textarea border-dim-200"
                                                    placeholder="Tweete sua resposta...">{{ old('reply') }}</textarea>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="answer-button">Responder</button>
                                    </form>
                                    <!-- End of Modal Comment Content-->
                                </div>
                                <div class="flex justify-center items-center">

                                </div>
                            </dialog>
                            <!-- End of omment modal -->
                            <a href="#">
                                <div
                                    class="tweet-action-icons hover:text-green-400">
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                        <g>
                                            <path
                                                d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                                            </path>
                                        </g>
                                    </svg>
                                    200
                                </div>
                            </a>

                            @php
                                $q = Auth::user()->likesReplies->count();
                                
                                $m = 1;
                            @endphp

                            @foreach (Auth::user()->likesReplies as $likeReply)

                                @if ($likeReply->reply_id == $reply->id)
                                    <div class="like-button text-red-600">
                                        <a href="#" class="unlike-reply flex items-center"
                                            data-replyId="{{ $reply->id }}" data-authorId="{{ $reply->user->id }}"
                                            data-replyLikes="{{ $reply->likes->count() }}"
                                            data-tweetId="{{ $tweet->id }}"
                                            data-tweetAuthor="{{ $tweet->user->id }}">
                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                <g>
                                                    <path
                                                        d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <p>
                                                {{ $reply->likes->count() }}
                                            </p>
                                        </a>
                                    </div>
                                @break

                            @elseif ($q == $m)
                                <div class="like-button text-xs hover:text-red-600 ">
                                    <a href="#" class="like-reply flex items-center" data-replyId="{{ $reply->id }}"
                                        data-authorId="{{ $reply->user->id }}"
                                        data-replyLikes="{{ $reply->likes->count() }}"
                                        data-tweetId="{{ $tweet->id }}" data-tweetAuthor="{{ $tweet->user->id }}">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                            <g>
                                                <path
                                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                </path>
                                            </g>
                                        </svg>
                                        <p>
                                            {{ $reply->likes->count() }}
                                        </p>
                                    </a>
                                </div>
                            @endif

                            @php
                                $m++;
                            @endphp

                            @endforeach

                            @if ($q == 0)
                                <div class="like-button text-xs hover:text-red-600 ">
                                    <a href="#" class="like-reply flex items-center" data-replyId="{{ $reply->id }}"
                                        data-authorId="{{ $reply->user->id }}" data-replyLikes="{{ $reply->likes->count() }}"
                                        data-tweetId="{{ $tweet->id }}" data-tweetAuthor="{{ $tweet->user->id }}">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                            <g>
                                                <path
                                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                </path>
                                            </g>
                                        </svg>
                                        <p>
                                            {{ $reply->likes->count() }}
                                        </p>
                                    </a>
                                </div>
                            @endif

                                <a href="#">
                                    <div class="flex items-center text-xs hover:text-blue-400 transition duration-350 ease-in-out">
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
                                </a>
                            </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    @endforeach
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
                    $('.likeCount')[0].innerHTML = ++tweetLikes;
                });
            });

            $('.unlike').on('click', function(e) {
                e.preventDefault();

                const tweetId = e.target.parentNode.dataset['tweetid'];
                let tweetLikes = e.target.parentNode.dataset['tweetlikes'];

                const data = {
                    _method: 'DELETE',
                };

                axios.post('{{ route('like.destroy', $tweet->id) }}', data).then(response => {
                    e.currentTarget.parentNode.className =
                        'like-button text-white hover:text-red-600';
                    $('.likeCount')[0].innerHTML = --tweetLikes;
                });
            });

            $('.like-comment').on('click', function(e) {
                e.preventDefault();

                const tweetId = e.target.parentNode.dataset['tweetid'];
                const commentId = e.target.parentNode.dataset['commentid'];
                const authorId = e.target.parentNode.dataset['authorid'];
                let commentLikes = e.target.parentNode.dataset['commentlikes'];

                const data = {
                    user_id: {{ Auth::id() }},
                    comment_id: commentId,
                    author_id: authorId,
                    tweet_id: tweetId,
                };

                axios.post('{{ route('like-comment.store') }}', data).then(response => {
                    e.currentTarget.parentNode.className = 'like-button text-red-600';
                    e.currentTarget.lastElementChild.innerHTML = ++commentLikes;
                });
            });

            $('.unlike-comment').on('click', function(e) {
                e.preventDefault();

                const commentId = e.target.parentNode.dataset['commentid'];
                let commentLikes = e.target.parentNode.dataset['commentlikes'];

                const data = {
                    _method: 'DELETE',
                };

                axios.post('/like-comment/' + commentId, data).then(response => {
                    e.currentTarget.parentNode.className =
                        'like-button text-white hover:text-red-600';
                    e.currentTarget.lastElementChild.innerHTML = --commentLikes;
                });
            });

            $('.like-reply').on('click', function(e) {
                e.preventDefault();

                const replyId = e.target.parentNode.dataset['replyid'];
                const tweetAuthor = e.target.parentNode.dataset['tweetauthor'];
                const tweetId = e.target.parentNode.dataset['tweetid'];
                const authorId = e.target.parentNode.dataset['authorid'];
                let replyLikes = e.target.parentNode.dataset['replylikes'];

                const data = {
                    user_id: {{ Auth::id() }},
                    reply_id: replyId,
                    author_id: authorId,
                    tweet_id: tweetId,
                    tweet_author: tweetAuthor,
                };

                axios.post('{{ route('like-reply.store') }}', data).then(response => {
                    e.currentTarget.parentNode.className = 'like-button text-red-600';
                    e.currentTarget.lastElementChild.innerHTML = ++replyLikes;
                });
            });

            $('.unlike-reply').on('click', function(e) {
                e.preventDefault();

                const replyId = e.target.parentNode.dataset['replyid'];
                let replyLikes = e.target.parentNode.dataset['replylikes'];

                const data = {
                    _method: 'DELETE',
                };

                axios.post('/like-reply/' + replyId, data).then(response => {
                    e.currentTarget.parentNode.className =
                        'like-button text-white hover:text-red-600';
                    e.currentTarget.lastElementChild.innerHTML = --replyLikes;
                });
            });
        });

    </script>
@endpush
