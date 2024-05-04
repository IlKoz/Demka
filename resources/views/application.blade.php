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
        <div class="col-md-8 mb-4">
			<div class="card shadow">
				<div class="card-body">
					<div class="d-flex justify-content-center">
						<p class="fw-bold mb-0">{{ $statement->user->name }}</p>
					</div>
					<hr class="my-2">
					<div class="d-flex justify-content-between">
						<p class="fw-bold">{{ $statement->title }}</p>				
						@if ($statement->status == 'new')
							<p class="text-primary">Новое</p>
						@elseif ($statement->status == 'confirmed')
							<p class="text-success">Одобрено</p>
						@elseif ($statement->status == 'dismissed')
							<p class="text-danger">Отклонено</p>
						@endif
					</div>
					<div class="d-flex justify-content-between">
						<p style="max-width: 70%">{{ $statement->description }}</p>
						<p class="fw-light d-flex align-items-end">{{ $statement->created_at->diffForHumans() }}</p>
					</div>
					@if ($statement->image !== null)
					<div class="d-flex justify-content-center">
						<img src="{{ asset('storage/' . $statement->image) }}" alt="img" width="50%" class="rounded border">
					</div>
					@endif
					@if (auth()->user()->role == "admin" && $statement->status == 'new')
					<hr class="my-2">
					<div class="d-flex justify-content-center">
						<a href="{{ route('admin.confirmed', $statement->id) }}" class="btn btn-outline-success me-3">Одобрить заявление</a>
						<a href="{{ route('admin.dismissed', $statement->id) }}" class="btn btn-outline-danger me-3">Отклонить заявление</a>
					</div>
					@endif
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
