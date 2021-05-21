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
                            <img class="w-10 h-10 rounded-full" src="{{ asset('img/profiles/default-user.png') }}"
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
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16" height="16"
                                fill="currentColor" viewBox="0 0 992 992" style="enable-background:new 0 0 992 992;"
                                xml:space="preserve">
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
                        <img src="{{ asset('img/profiles/default-user.png') }}" alt="{{ Auth::user()->username }}"
                            class="w-12 h-12 rounded-full">
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
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="text-center py-3 hover:bg-gray-900 border-bottom-radius transition-colors">
                        Sair
                    </div>
                </a>
            </div>
        </div>
        <!-- /User Menu -->
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form>