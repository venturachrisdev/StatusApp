@extends('layout.main')

@section('title', '404 Page Not Found')

@section('content')

	<div class="text-center container-fluid">
		<h2>Oops, Something goes wrong.</h2>
		<p>Error 404: Page not found.</p>
		<p>
			<strong><a href="{{ route('status.index') }}">Go Home</a></strong>
		</p>

	</div>

@endsection