@extends('layout.main')

@section('title', $status->user->name)


@section('content')

	<div class="single-status">
		<p><strong><a href="{{route('users.show', $status->user->id) }}">{{ $status->user->name }}</a></strong></p>
		<h4>{{ $status->content }}</h4>

		<form role="form" method="POST" action="{{ route('status.destroy') }}">
			<span><i class="fa fa-thumbs-up off-sides"></i><strong>{{ $status->likes }}</strong> likes.
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<input type="hidden" name="status_id" value="{{ $status->id }}">
			@if($status->user->id == Auth::user()->id)
				<button type="submit" class="btn btn-link"><i class="fa fa-trash off-sides"></i>Delete</button>
			@endif
			</span>
				</form>
		<hr>
	</div>

	<div class="comments-section">

		@if(count($status->comments))
			@foreach($status->comments as $comment)

				<form role="form" method="POST" action="{{ route('comments.destroy') }}">
					<p><strong><a href="{{route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a></strong>: {{ $comment->content }}</p>
					<span><i class="fa fa-thumbs-up off-sides"></i><strong>{{ $comment->likes }}</strong> likes.
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="hidden" name="comment_id" value="{{ $comment->id }}">
					<input type="hidden" name="status_id" value="{{ $status->id }}">
					@if($comment->user->id == Auth::user()->id)
						<button type="submit" class="btn btn-link"><i class="fa fa-trash off-sides"></i>Delete</button>
					@endif
				</form>


				</span>
			<hr>
			@endforeach
		@else
			<div class="header-padding">
				<h4 class="text-center">No comments yet.</h4>
			</div>
		@endif

		<form role="form" method="POST" action="{{ route('comments.create') }}">
			{{ csrf_field() }}
			<input type="hidden" name="status_id" value="{{ $status->id }}">
			<div class="form-group">
				<textarea name="content" id="content" class="form-control no-resizable" rows="3" placeholder="Comment..." maxlength="140" required></textarea>
			</div>
			<div class="pull-right">
				<button type="submit" class="btn btn-primary"><i class="fa fa-comment-o off-sides"></i>Comment</button>
			</div>
		</form>
	</div>

@endsection