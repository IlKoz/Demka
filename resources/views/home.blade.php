@extends('layouts.app')

@section('content')
<style>
.box {
    transition: transform 0.5s ease;
}

.box:hover {
    transform: scale(1.1);
}
</style>
<div class="container">
	<h1 class="mb-2 d-flex justify-content-center">Ваши заявления:</h1>
	<div class="d-flex justify-content-center mb-4">
		<a href="{{ route('applications.create') }}" class="btn btn-outline-success">Создать заявление</a>
	</div>
    <div class="row justify-content-center">
		@foreach ($statements as $state)
        <div class="col-md-8 mb-4">
			<a href="{{ route('applications.show', $state->id) }}" class="text-decoration-none">
				<div class="card shadow box">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<p class="fw-bold">{{ $state->title }}</p>				
							@if ($state->status == 'new')
								<p class="text-primary">Новое</p>
							@elseif ($state->status == 'confirmed')
								<p class="text-success">Одобрено</p>
							@elseif ($state->status == 'dismissed')
								<p class="text-danger">Отклонено</p>
							@endif
						</div>
						<div class="d-flex justify-content-between">
							<p style="max-width: 70%">{{ $state->description }}</p>
							<p class="fw-light d-flex align-items-end">{{ $state->created_at->diffForHumans() }}</p>
						</div>
					</div>
				</div>
			</a>
        </div>
		@endforeach
    </div>
</div>
@endsection
