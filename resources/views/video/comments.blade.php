<hr>
<h4>Comment</h4>
<hr>
@if(session('message'))
                <div class="alert alert-success">
                    {{ session('message')}}
                </div>
@endif

@if(Auth::check())
<form class="col-md-4" method="post" action="{{url('/comment')}}">
	
	{!! csrf_field()!!}
	<input class="" type="hidden" name="video_id" value="{{$video->id}}" required/>
	<p>
		<textarea class="form-control" name="body" required></textarea>
	</p>
	<input type="submit" value="Comment" name="" class="btn btn-success">
</form>
<div class="clearfix">
	
</div>
<hr>
@endif

@if(isset($video->comments))

	<div id="comment-list">
		@foreach ($video->comments as $comment)
			<div class="comment-item col-md-12 pull-left">
				<div class="panel panel-default comment-data">
					<div class="panel-heading">
						<div class="panel-title">
							<p>Comment by <strong>{{$comment->user->name.' '.$comment->user->surname}}</strong> created {{\FormatTime::LongTimeFilter($comment->created_at)}}</p>
						</div>
					</div>
					<div class="panel-body">
						{{$comment->body}}
						@if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $video->user_id))
							<div class="pull-right">
								<!-- Button HTML (launch modal on Bootstrap) -->
								<a href="#deleteModal{{$comment->id}}" role="button" class="btn btn-sm btn-primary" data-toggle="modal">Delete</a>
								  
								<!-- Modal / Ventana / Overlay on HTML -->
								<div id="deleteModal{{$comment->id}}" class="modal fade">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								                <h4 class="modal-title">Are you sure?</h4>
								            </div>
								            <div class="modal-body">
								                <p>Are you sure to delele this comment?</p>
								                <p class="text-warning"><small>{{$comment->body}}</small></p>
								            </div>
								            <div class="modal-footer">
								                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								                <a href="{{url('/delete-comment/'.$comment->id)}}" type="button" class="btn btn-danger">Delete</a>
								            </div>
								        </div>
								    </div>
								</div>
							</div>
						@endif
					</div>
				</div>
				
			</div>
		@endforeach
	</div>
@endif