@extends('layout.main')

@section('title', 'Log In')

@section('content')
	@foreach($errors->all() as $message)
	 	<div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ul>{{ $message }}</ul>
        </div>
	@endforeach
	<h3 class="text-center header-padding">Log In</h3>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form role="form" action="{{ route('login.authenticate') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="email" name="email" placeholder="example@mail.com" class="form-control" value="{{ old('email') }}" required></input>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" required></input>
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block" type="submit">Log In</button>
			</div>
		</form>
	</div>
	<div class="col-md-4"></div>
@endsection