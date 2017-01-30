@extends('layout.main')

@section('title', $user->name . '\'s Profile')

@section('content')

	<div class="col-sm-12">

	<h2>{{ $user->name }}</h2>
	<p>{{ $user->email }}</p>
	@if($user->id == Auth::user()->id)
		<a href="{{ route('admin.logout') }}">Logout</a> |
		<a href="{{ route('user.edit', $user->id) }}">Edit Profile</a> |
		<a href="{{ route('user.destroy')}}" onclick="prompt('Are you sure?');">Deactivate Accout</a>
	@endif
	</div>


	<div class="col-sm-6 right-field">
		<h3>Status</h3>
		@if(count($status_s))
				@foreach($status_s as $status)
					<h4>"{{ $status->content }}"</h4>
					<span><a href="{{ route('status.show', $status->id) }}">Comment</a></span>
					<hr>
				@endforeach
		@else
			<p>No status yet.</p>
		@endif

	</div>

	<div class="col-sm-6">
		<h3>Comments</h3>
		@if(count($comments))
			@foreach($comments as $comment)
				<p>"{{ $comment->content }}" in a <a href="{{ route('status.show', $comment->status->id) }}">{{ $comment->status->user->name }}'s Post</a></p>
				<hr>
			@endforeach
		@else
			<p>No comments yet.</p>
		@endif
	</div>

@endsection