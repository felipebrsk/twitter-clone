@extends('layouts.main')
@section('title', 'Twitter. É o que está acontecendo.')

@section('content')
    <div class="bg-black text-white">
        <div class="auth-main-content">
            <div class="auth-first-box md:flex hidden">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="fill-current md:w-96 w-72">
                    <g>
                        <path
                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                        </path>
                    </g>
                </svg>
            </div>
            <div class="auth-second-box">
                <div>
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="fill-current text-gray-200" width="48" height="48">
                        <g>
                            <path
                                d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                            </path>
                        </g>
                    </svg>
                </div>
                <div class="happening-now">
                    Acontecendo agora
                </div>
                <div class="text-gray-300 text-3xl">
                    Inscreva-se no Twitter hoje mesmo.
                </div>
                <div class="auth-buttons">
                    <a href="{{ route('register') }}" class="auth-register-button">
                        Inscrever-se
                    </a>
                    <a href="{{ route('login') }}" class="auth-enter-button">
                        Entrar
                    </a>
                </div>
            </div>
            <div class="auth-first-box flex md:hidden py-12">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="fill-current md:w-96 w-52">
                    <g>
                        <path
                            d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                        </path>
                    </g>
                </svg>
            </div>
        </div>
        <footer class="auth-footer">
            <a href="#">Sobre</a>
            <a href="#">Central de Ajuda</a>
            <a href="#">Termos de Serviço</a>
            <a href="#">Política de Privacidade</a>
            <a href="#">Política de cookies</a>
            <a href="#">Informações de anúncios</a>
            <a href="#">Blog</a>
            <a href="#">Status</a>
            <a href="#">Carreiras</a>
            <a href="#">Recursos da marca</a>
            <a href="#">Publicidade</a>
            <a href="#">Marketing</a>
            <a href="#">Twitter para Empresas</a>
            <a href="#">Desenvolvedores</a>
            <a href="#">Diretório</a>
            <a href="#">Configurações</a>
            <span>© 2021 Twitter, Inc.</span>
        </footer>
    </div>
@endsection
