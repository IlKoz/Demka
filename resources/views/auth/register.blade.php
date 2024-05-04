@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="login" class="col-md-4 col-form-label text-md-end">{{ __('Логин') }}</label>

                            <div class="col-md-6">
                                <input id="login" 
								type="text" 
								class="form-control 
								@error('login') is-invalid 
								@enderror" 
								name="login" 
								value="{{ old('login') }}" 
								required 
								autocomplete="login" 
								autofocus
								placeholder="Введите логин (от 6 символов)"
								pattern="[a-zA-Z0-9]{6,}">

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ФИО') }}</label>

                            <div class="col-md-6">
                                <input id="name" 
								type="text" 
								class="form-control 
								@error('name') is-invalid 
								@enderror" 
								name="name" 
								value="{{ old('name') }}" 
								required 
								autocomplete="name" 
								autofocus
								placeholder="Иванов Иван Иванович"
								pattern="[А-Яа-яЁё]+\s[А-Яа-яЁё]+\s[А-Яа-яЁё]+">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Номер телефона') }}</label>

                            <div class="col-md-6">
                                <input id="phone" 
								type="text" 
								class="form-control 
								@error('phone') is-invalid 
								@enderror" 
								name="phone" 
								value="{{ old('phone') }}" 
								required 
								autocomplete="phone" 
								autofocus
								placeholder="+7(XXX)-XXX-XX-XX"
								pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" 
								type="email" 
								class="form-control 
								@error('email') is-invalid 
								@enderror" 
								name="email" 
								value="{{ old('email') }}" 
								required 
								autocomplete="email"
								placeholder="Введите E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" 
								type="password" 
								class="form-control 
								@error('password') is-invalid 
								@enderror" 
								name="password" 
								required 
								autocomplete="new-password"
								placeholder="Введите пароль (от 6 символов)"
								pattern=".{6,}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="asd" id="remember" required>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Соглашаюсь с правилами регистрации') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Подтверждение пароля') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Зарегистрироваться') }}
                                </button>

								<a class="btn btn-link p-0" href="{{ route('login') }}">
									{{ __('Уже зарегистрированны?') }}
								</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
