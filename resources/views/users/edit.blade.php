@extends('layout.main')


@section('title', 'Edit Profile')

@section('content')

	<h3 class="page-header">
		Edit Profile
	</h3>

	<form role="form" action="{{ route('user.update') }}"  method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}

		<div class="form-group">
			<label class="label" for="fullname">Fullname:</label>
			<input type="text" class="form-control" name="fullname" id="fullname" value="{{ $user->name }}"></input>
		</div>
		<div class="form-group">
			<label class="label" for="email">Email:</label>
			<input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}></input>
		</div>
		<div class="form-group">
			<label class="label" for="old-password">Old Password:</label>
			<input type="password" class="form-control" name="old-password" id="old-password"></input>
			<label class="label" for="password">New Password:</label>
			<input type="password" class="form-control" name="password" id="password"></input>
			<label class="label" for="fullname">Repeat Password:</label>
			<input type="password" class="form-control" name="repeatpassword" id="repeatpassword"></input>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-danger btn-"><i class="fa fa-pencil off-side"></i>Update Profile</input>
		</div>
	</form>

@endsection