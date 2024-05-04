@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Создание заявления') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('applications.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Заголовок') }}</label>

                            <div class="col-md-6">
                                <input id="title" 
								type="text" 
								class="form-control 
								@error('title') is-invalid 
								@enderror" 
								name="title" 
								value="{{ old('title') }}" 
								required 
								autocomplete="title" 
								autofocus
								placeholder="Введите заголовок">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Описание') }}</label>

                            <div class="col-md-6">
                                <input id="description" 
								type="text" 
								class="form-control 
								@error('description') is-invalid 
								@enderror" 
								name="description" 
								value="{{ old('description') }}" 
								required 
								autocomplete="description" 
								autofocus
								placeholder="Введите описание">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Картинка') }}</label>

                            <div class="col-md-6">
                                <input id="image" 
								type="file" 
								class="form-control 
								@error('image') is-invalid 
								@enderror" 
								name="image" 
								value="{{ old('image') }}"  
								autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Отправить') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
