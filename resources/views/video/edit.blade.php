@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<h2>Edit {{$video->title}}</h2>	
			<hr>
			<form action="{{route('updateVideo',['video_id' => $video->id])}}" method="post" class="col-lg-7" enctype="multipart/form-data">

			{!! csrf_field() !!}

			@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif 
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" id="title" class="form-control" value="{{$video->title}}">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="description" class="form-control">{{$video->description}}</textarea>
			</div>
			<div class="form-group">
				<label for="image">Thumbnail</label>
				@if(Storage::disk('images')->has($video->image))
                    <div class="video-image-thumb">
                        <div class="video-image-mask">
                            <img class="video-image" src="{{url('/thumbnail/'.$video->image)}}"/>    
                        </div>
                    </div>
                                
                @endif
				<input type="file" name="image" id="image" class="form-control">
			</div> 
			<div class="form-group">
				
				<label for="video">Video File</label>
				<video controls id="video-player">
					<source src="{{route('fileVideo',['filename' => $video->video_path])}}"> </source>
				</video>
				<input type="file" name="video" id="video" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">
				Modify Video
			</button>
		</form>

		</div>

	</div>
@endsection