@extends('layouts.main')
@section('title', $title)

@section('content')
    <div
        class="flex justify-between items-center border-b border-l border-r px-4 py-3 sticky top-0 w-full border-gray-700 bg-black text-white z-50">
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
                <h2 class="mb-0 text-xl font-bold text-white">{{ $user->name }}</h2>
                <p class="mb-0 w-48 text-xs text-gray-400">{{ $user->username }}</p>
            </div>
        </div>
    </div>
    @foreach ($user->follows as $following)
        <div class="border-l border-r border-b @if ($loop->last) mb-24 @endif border-dim-200 bg-gray-800 bg-opacity-0 hover:bg-opacity-25 cursor-pointer
            transition duration-350 ease-in-out pb-4">
            <div class="flex justify-between flex-shrink-0 p-4 pb-0">
                <a href="{{ route('profile.show', $following->following->username) }}" class="flex-shrink-0 group block">
                    <div class="flex items-center">
                        <div>
                            @if ($following->following->picture != null)
                                <img src="{{ asset('img/profiles/' . $following->following->picture) }}"
                                    alt="{{ $following->following->username }}"
                                    class="w-10 h-10 inline-block rounded-full">
                            @else
                                <img class="inline-block h-10 w-10 rounded-full"
                                    src="{{ asset('img/profiles/default-user.png') }}"
                                    alt="{{ $following->following->username }}" />
                            @endif
                        </div>
                        <div class="ml-3">
                            <p class="flex items-center text-base leading-6 font-medium text-white">
                                <b class="hover:underline">{{ $following->following->name }}</b>
                                @if ($following->following->verified === 1)
                                    <svg viewBox="0 0 24 24" aria-label="Verified account" fill="currentColor"
                                        class="w-4 h-4 ml-1">
                                        <g>
                                            <path
                                                d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                            </path>
                                        </g>
                                    </svg>
                                @endif
                            </p>
                            <span
                                class="ml-1 text-sm leading-5 font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150">
                                {{ '@' . $following->following->username }}
                            </span>
                        </div>
                    </div>
                </a>
                <div class="pull-right" data-followingId="{{ $following->following->id }}"
                    data-followingName="{{ $following->following->username }}">
                    @if ($following->following->id != Auth::id())
                        @auth
                            @php
                                $i = Auth::user()
                                    ->follows()
                                    ->count();
                                
                                $k = 1;
                            @endphp
                            @foreach (Auth::user()->follows as $authFollows)
                                @if ($authFollows->following_id === $following->following->id)
                                    <button
                                        class="flex justify-center unfollow-btn whitespace-nowrap focus:outline-none items-center hover:shadow-lg font-bold text-white py-1.5 px-4 rounded-full mr-0 w-full"
                                        style="background: rgb(29,161,242);">
                                        Seguindo
                                    </button>
                                    @break
                                @elseif ($i == $k)
                                    <button
                                        class="flex justify-center follow-btn whitespace-nowrap focus:outline-none border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg font-bold py-1 px-3 rounded-full mr-0 w-full">
                                        Seguir
                                    </button>
                                @endif
                                @php
                                    $k++;
                                @endphp
                            @endforeach
                            @if ($i == 0)
                                <button
                                    class="flex justify-center follow-btn whitespace-nowrap focus:outline-none border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg font-bold py-1 px-3 rounded-full mr-0 w-full">
                                    Seguir
                                </button>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
            <div class="pl-16">
                <a href="{{ route('profile.show', $following->following->username) }}">
                    <p class="w-full max-w-lg font-medium text-gray-300 flex-shrink px-1 text-sm">
                        {!! nl2br(e($following->following->bio)) !!}
                    </p>
                </a>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <script>
        // Axios request to follow action
        $('.follow-btn').on('click', function(e) {
            e.preventDefault();

            const followingId = e.target.parentNode.dataset['followingid'];
            const followingName = e.target.parentNode.dataset['followingname'];

            const data = {
                follower_id: {{ Auth::id() }},
                following_id: followingId,
                following_name: followingName,
            };

            axios.post('{{ route('follow.store') }}', data).then(response => {
                console.log(response);
                $(this).css('background', 'rgb(29,161,242)').css('color', 'white');
                $(this)[0].innerHTML = 'Seguindo';
            });
        });

        // Axios request to follow action
        // $('#unfollow-btn').on('click', function(e) {
        //     e.preventDefault();

        //     const followingId = e.target.parentNode.dataset['followingid'];
        //     const followingName = e.target.parentNode.dataset['followingname'];

        //     const data = {
        //         follower_id: {{ Auth::id() }},
        //         following_id: followingId,
        //         following_name: followingName,
        //     };

        //     axios.post('/follow/', data).then(response => {
        //         $(this).css('background', 'rgb(29,161,242)').css('color', 'white');
        //         $(this)[0].innerHTML = 'Seguindo';
        //     });
        // });

    </script>
@endpush
