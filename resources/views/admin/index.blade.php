@extends('layout.main')

@section('title', 'Dashboard')


@section('content')

	<h1>Hi {{ $user->name }}</h1>
	<a href="{{ route('admin.logout') }}">Logout</a>

@endsection