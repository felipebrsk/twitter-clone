@extends('auth.layouts.auth')
@section('title', 'Entrar no Twitter')

@section('content')
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
    <div class="flex mx-auto max-w-sm flex-col space-y-4">
        <div class="p-4">
            <svg viewBox="0 0 24 24" class="w-10 h-10" fill="currentColor">
                <g>
                    <path
                        d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                    </path>
                </g>
            </svg>
        </div>
        <span class="text-4xl">
            Entrar no Twitter
        </span>

        <form action="{{ route('login') }}" method="POST" class="p-6">
            @csrf
            <div class="register-group">
                <input type="text" name="credentials" placeholder=" " autofocus class="register-input"
                    value="{{ old('credentials') }}" />
                <label for="credentials" class="float-label sm:text-base text-sm sm:mt-1 mt-1.5">Celular, e-mail ou nome de
                    usuário</label>
            </div>

            <div class="register-group">
                <input type="password" name="password" placeholder=" " class="register-input"
                    value="{{ old('password') }}" />
                <label for="password" class="float-label">Senha</label>
            </div>

            <button type="submit" class="auth-register-button w-full">Entrar</button>
        </form>

        <div class="flex px-8 justify-center text-sm sm:space-x-4 space-x-12 break-words items-center text-center">
            <a href="{{ route('password.request') }}" class="forgot-register">Esqueceu sua senha?</a>
            <span>
                &bull;
            </span>
            <a href="{{ route('register') }}" class="forgot-register">Inscrever-se no Twitter</a>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        body {
            background: black;
            color: rgb(209, 206, 206);
            font-family: "Lato", sans-serif;
        }

    </style>
@endpush
