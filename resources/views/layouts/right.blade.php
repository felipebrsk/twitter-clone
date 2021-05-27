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
            <div class="right-content border-dim-200">
                <h2 class="font-bold text-md text-white">#LoremIpsum</h2>
                <p class="text-xs text-gray-400">29.7K Tweets</p>
            </div>
            <!-- /Trending Topic -->

            <!-- Trending Topic -->
            <div class="right-content border-dim-200">
                <h2 class="font-bold text-md text-white">#Laravel</h2>
                <p class="text-xs text-gray-400">351K Tweets</p>
            </div>
            <!-- /Trending Topic -->

            <!-- Trending Topic -->
            <div class="right-content border-dim-200">
                <h2 class="font-bold text-md text-white">#HelloWorld</h2>
                <p class="text-xs text-gray-400">52.7K Tweets</p>
            </div>
            <!-- /Trending Topic -->

            <div
                class="show-more-button">
                Mostrar mais
            </div>
        </div>
        <!-- /What’s happening -->

        <!-- Who to follow -->
        <div class="rounded-2xl m-2" style="background: rgb(21,24,28);">
            <h1 class="text-white text-md font-bold p-3 border-b border-dim-200">
                Quem seguir
            </h1>
            @php
                $users = \App\Models\User::with('follows')
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
                    
                $myFollows = Auth::user()->follows;
            @endphp
            <!-- Twitter Account -->
            @foreach ($users as $j => $user)
                @if ($user->id != Auth::id())
                    <div class="right-content border-dim-200">
                        <div class="flex flex-row justify-between p-2">
                            <div class="flex flex-row">
                                @if ($user->picture != null)
                                    <img src="{{ asset('img/profiles/' . $user->picture) }}"
                                        alt="{{ $user->username }}" class="profile-pictures">
                                @else
                                    <img class="inline-block profile-pictures"
                                        src="{{ asset('img/profiles/default-user.png') }}"
                                        alt="{{ $user->username }}" />
                                @endif
                                <div class="flex flex-col ml-2">
                                    <a href="{{ route('profile.show', $user->username) }}">
                                        <h2 class="text-white font-bold text-sm hover:underline">{{ $user->name }}</h2>
                                        <p class="text-gray-400 text-sm">{{ '@' .  $user->username }}</p>
                                    </a>
                                </div>
                            </div>
                            <div class="">
                                <div class="flex items-center h-full text-white">
                                    <div class="pull-right" data-followingId="{{ $user->id }}"
                                        data-followingName="{{ $user->username }}">

                                        @php
                                            $i = Auth::user()
                                                ->follows()
                                                ->count();

                                            $c = 1;
                                        @endphp

                                        @foreach ($myFollows as $follow)
                                            @if ($follow->following->id == $user->id)
                                            <button data-followId="{{ $follow->id }}" data-followingName="{{ $follow->following->username }}"
                                                class="already-following-button unfollow-button-left"
                                                style="background: rgb(29,161,242);">
                                                    Seguindo
                                            </button>
                                                @break
                                            @elseif ($i == $c)
                                                <button
                                                    class="follow-button-right">
                                                    Seguir
                                                </button>
                                            @endif
                                            @php
                                                $c++;
                                            @endphp
                                        @endforeach
                                        @if ($i == 0)
                                            <button
                                                class="follow-button-right">
                                                Seguir
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <!-- /Twitter Account -->

            <div
                class="show-more-button">
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
            <div class="right-content border-dim-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-md text-white">League of Legends</h2>
                        <p class="text-xs text-gray-400">Video game</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="#"
                            class="follow-button">Seguir</a>
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
            <div class="right-content border-dim-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-md text-white">Futebol</h2>
                        <p class="text-xs text-gray-400">Esporte</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="#"
                            class="follow-button">Seguir</a>
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
            <div class="right-content border-dim-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-md text-white">Big Brother Brasil</h2>
                        <p class="text-xs text-gray-400">Reality Show</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="#"
                            class="follow-button">Seguir</a>
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
                class="show-more-button">
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

@push('scripts')
    <script>
        $(document).ready(function() {
            // Axios request to follow action
            $('.follow-button-right').on('click', function(e) {
                e.preventDefault();

                const followingId = e.target.parentNode.dataset['followingid'];
                const followingName = e.target.parentNode.dataset['followingname'];

                const data = {
                    follower_id: {{ Auth::id() }},
                    following_id: followingId,
                    following_name: followingName,
                };

                axios.post('{{ route('follow.store') }}', data).then(response => {
                    $(this).css('background', 'rgb(29,161,242)').css('color', 'white');
                    $(this)[0].innerHTML = 'Seguindo';
                });
            });

            // Axios request to follow action
            $('.unfollow-button-left').on('click', function(e) {
                e.preventDefault();

                const followId = e.target.dataset['followid'];
                const followingName = e.target.dataset['followingname'];

                const data = {
                    _method: 'DELETE',
                    following_name: followingName,
                };

                axios.post('/follow/' + followId, data).then(response => {
                    $(this).removeClass('already-following-button unfollow-button-left');
                    $(this).css('background', 'none');
                    $(this).addClass('follow-button');
                    e.currentTarget.innerHTML = 'Seguir';
                });
            });
        });

    </script>
@endpush
