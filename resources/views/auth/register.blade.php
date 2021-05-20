@extends('layouts.main')
@section('title', 'Inscrever-se no Twitter')

@section('content')
    
@if ($errors->any())
    <div class="error-content">
        <div class="text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24">
                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/>
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

<div x-data="app()" x-cloak
    class="register-main-content">
    <div class="max-w-3xl mx-auto px-8">

        <div x-show.transition="step === 'complete'" class="pt-28">
            <div class="analyse-box">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="analyse-icon" fill="currentColor">
                        <path d="M21.169 19.754c.522-.79.831-1.735.831-2.754 0-2.761-2.238-5-5-5s-5 2.239-5 5 2.238 5 5 5c1.019 0 1.964-.309 2.755-.832l2.831 2.832 1.414-1.414-2.831-2.832zm-4.169.246c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3zm-4.89 2h-7.11l2.599-3h2.696c.345 1.152.976 2.18 1.815 3zm-2.11-5h-10v-17h22v12.11c-.574-.586-1.251-1.068-2-1.425v-8.685h-18v13h8.295c-.19.634-.295 1.305-.295 2zm-4-4h-2v-6h2v6zm3 0h-2v-9h2v9zm3 0h-2v-4h2v4z"/>
                    </svg>

                    <h2 class="text-2xl mb-4 text-center font-bold">Analisando dados!</h2>

                    <div class="mb-8 text-center">
                        Obrigado por usar nosso aplicativo! <br/>
                        Se estiver tudo ok, nós iremos te enviar um e-mail assim que possível para verificar a sua conta. <br/>
                        Não se preocupe, você será redirecionado automaticamente. <br/>
                        <progress value="0" max="5" id="progressBar" class="progress-bar"></progress>
                    </div>

                    <button @click="step = 1"
                        class="back-button">Voltar</button>
                </div>
            </div>
        </div>

        <div x-show.transition="step != 'complete'">
            <form method="POST" id="register-form" action="{{ route('register') }}">
                @csrf
                <!-- Top Navigation -->
                <div class="py-4">
                    <button x-show="step > 1" @click="step--" type="button" class="close-button">X</button>
                    <div class="register-header-box">
                        <div class="steps-counter" x-text="`Etapa: ${step} de 3`"></div>

                        <svg viewBox="0 0 24 24" aria-hidden="true" class="fill-current text-gray-300" width="32"
                            height="32">
                            <g>
                                <path
                                    d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z">
                                </path>
                            </g>
                        </svg>

                        <button x-show="step < 3" @click="step++" class="next-button" id="next-button" type="button">Avançar</button>
                        <button @click="step = 'complete'" x-show="step === 3" type="button" id="complete-button"
                            class="next-button" onclick="countdownTimer();">Concluir</button>
                    </div>
                </div>
                <!-- /Top Navigation -->

                <!-- Step Content -->
                <div class="py-2">
                        <div x-show.transition.in="step === 1">
                            <h2 class="text-2xl text-gray-300 font-bold">
                                Criar sua conta
                            </h2>

                            <div class="register-group mt-8">
                                <input type="text" name="name" placeholder=" " autofocus
                                    class="register-input" value="{{ old('name') }}"/>
                                <label for="name" class="float-label">Nome</label>
                            </div>

                            <div class="register-group">
                                <input type="email" name="email" id="set-mail" placeholder=" "
                                    class="register-input" value=""/>
                                <label class="float-label" id="label">Email</label>
                            </div>

                            <button id="button-change-phone" type="button" class="change-button">
                                Usar o celular
                            </button>

                            <button id="button-change-mail" type="button" class="change-button hidden">
                                Usar o e-mail
                            </button>

                            <div class="birthdate">
                                <strong>Data de nascimento</strong>
                                <p class="text-sm text-gray-500">
                                    Isso não será exibido publicamente. Confirme sua própria idade, mesmo se esta conta
                                    for
                                    de empresa, de um animal de estimação ou outros.
                                </p>
                                <div class="register-select-group">
                                    <div class="register-group md:w-2/4 w-full">
                                        <select name="birth_month" class="register-input cursor-pointer">
                                            <option disabled selected></option>
                                                @php
                                                for ($m = 1; $m <= 12; ++$m) {
                                                    $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                                    $month_value = date('m', mktime(0, 0, 0, $m, 1));
                                                @endphp
                                                    <option value="{{ $month_value }}">{{ $month_label }}</option>
                                                @php
                                                }
                                            @endphp
                                        </select>
                                        <label class="float-label" id="label">Mês</label>
                                    </div>
                                    <div class="register-group md:w-1/4 w-full">
                                        <select name="birth_day" class="register-input cursor-pointer">
                                            <option disabled selected></option>
                                            @php
                                            $start_date = 1;

                                            $end_date = 31;

                                                for ($d = $start_date; $d <= $end_date; $d++) {
                                                    @endphp
                                                        <option value={{ $d }}>{{ $d }}</option>
                                                    @php
                                                }
                                            @endphp
                                        </select>
                                        <label class="float-label" id="label">Dia</label>
                                    </div>
                                    <div class="register-group md:w-1/4 w-full">
                                        <select name="birth_year" class="register-input cursor-pointer">
                                            <option disabled selected></option>
                                            @php
                                                $year = date('Y');

                                                $min = $year - 120;

                                                $max = $year;

                                                for ($y = $max; $y >= $min; $y--) {
                                                    @endphp
                                                        <option value={{ $y }}>{{ $y }}</option>
                                                    @php
                                                }
                                            @endphp
                                        </select>
                                        <label class="float-label" id="label">Ano</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-show.transition.in="step === 2">
                            <div class="mb-5">
                                <label for="password" class="font-bold mb-1 block">Escolha uma senha</label>
                                <div class="mt-2 mb-4">
                                    Por favor, crie uma senha segura incluindo todos os critérios abaixo:

                                    <ul class="list-disc text-sm ml-4 mt-2">
                                        <li>letras minúsculas</li>
                                        <li>números</li>
                                        <li>letras maiúsculas</li>
                                        <li>caracteres especiais</li>
                                    </ul>
                                </div>

                                <div class="relative">
                                    <div class="register-group">
                                    <input :type="togglePassword ? 'text' : 'password'"
                                        @keydown="checkPasswordStrength()" x-model="password"
                                        class="register-input" name="password"
                                        placeholder=" ">
                                        <label class="float-label" id="label">Sua senha</label>
                                    </div>

                                    <div class="register-eye"
                                        @click="togglePassword = !togglePassword">
                                        <svg :class="{'hidden': !togglePassword, 'block': togglePassword }"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                            viewBox=" 0 0 24 24">
                                            <path
                                                d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z" />
                                        </svg>

                                        <svg :class="{'hidden': togglePassword, 'block': !togglePassword }"
                                            xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"
                                            viewBox=" 0 0 24 24">
                                            <path
                                                d="M12,9c-1.642,0-3,1.359-3,3c0,1.642,1.358,3,3,3c1.641,0,3-1.358,3-3C15,10.359,13.641,9,12,9z" />
                                            <path
                                                d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,17c-5.351,0-7.424-3.846-7.926-5C4.578,10.842,6.652,7,12,7 c5.351,0,7.424,3.846,7.926,5C19.422,13.158,17.348,17,12,17z" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="flex items-center mt-4 h-3">
                                    <div class="w-2/3 flex justify-between h-2">
                                        <div :class="{ 'bg-red-400': passwordStrengthText == 'Muito fraca!' ||  passwordStrengthText == 'Pode melhorar...' || passwordStrengthText == 'Senha forte!' }"
                                            class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div>
                                        <div :class="{ 'bg-yellow-400': passwordStrengthText == 'Pode melhorar...' || passwordStrengthText == 'Senha forte!' }"
                                            class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div>
                                        <div :class="{ 'bg-green-400': passwordStrengthText == 'Senha forte!' }"
                                            class="h-2 rounded-full w-1/3 bg-gray-300"></div>
                                    </div>
                                    <div x-text="passwordStrengthText" class="font-medium text-sm ml-3 leading-none"></div>
                                </div>

                                <div class="register-group mt-8">
                                    <input type="password" name="password_confirmation" placeholder=" " required
                                        class="register-input" />
                                    <label class="float-label" id="label">Confirmar senha</label>
                                </div>
                            </div>
                        </div>

                        <div x-show.transition.in="step === 3">
                            <div class="register-group">
                                <input type="text" name="username" placeholder=" " required
                                    class="register-input" id="twitter-user" />
                                <label class="float-label" id="label">Nome de usuário</label>
                            </div>
                        </div>
                </div>
                <!-- / Step Content -->
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>
        body {
            background: rgb(36,45,52);
        }
    </style>
@endpush