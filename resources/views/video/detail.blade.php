@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
		<h2>{{$video->title}}</h2>
		<hr/>

		<div class="col-md-8">
			<!-- video -->
			@if($video->video_path)
			<video controls id="video-player">
				<source src="{{route('fileVideo',['filename' => $video->video_path])}}"> </source>
				
			</video>
			@else
				<h1>There is not video</h1>
			@endif
			<!-- description -->
			<div class="panel panel-default video-data">
				<div class="panel-heading">
					<div class="panel-title">
						<p>Uploaded by <strong><a href="{{route('channel',['user_id'=>$video->user->id])}}">{{$video->user->name.' '.$video->user->surname}}</a></strong> created {{\FormatTime::LongTimeFilter($video->created_at)}}</p>
					</div>
				</div>
				<div class="panel-body">
					{{$video->description}}
				</div>
			</div>

			<!-- comments -->
			
				@include('video.comments')
				
		</div>
		
	</div>

@endsection