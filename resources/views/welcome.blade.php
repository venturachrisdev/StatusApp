@extends('layout.main')


@section('content')

		<div class="col-md-12">
			<form role="form" method="POST" action="{{ route('status.index')}}">
				<div class="form-group">
					{{ csrf_field() }}
					<textarea name="content" id="status" class="form-control no-resizable big-input-text" rows="3" maxlength="140" placeholder="What are you thinking?" required=""></textarea>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-danger"><i class="fa fa-paper-plane off-sides"></i>Publish</button>
				</div>
			</form>
		</div>
		<div class="col-md-12">
			@if(count($status))

				@foreach($status as $single)
					<div class="single-status">
						<p><strong><a href="{{  route('users.show', $single->user->id) }}">{{ $single->user->name }}</a></strong></p>
						<h4>{{ $single->content }}</h4>
							<span><i class="fa fa-thumbs-up off-sides"></i><strong>{{ $single->likes }}</strong> likes. | <i class="fa fa-comments-o off-sides off-right"></i><strong class="little"><a href="{{ route('status.show', $single->id) }}"> {{ count($single->comments) }} Comments</a></strong></span>
						<hr>
					</div>
				@endforeach
				<div class="col-md-12 pagination">
					{{ $status->links() }}
				</div>
			@else

				<h3>No status to show.</h3>

			@endif
	</div>
@endsection