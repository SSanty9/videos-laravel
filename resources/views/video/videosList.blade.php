<div id="videos-list">
    @if(count($videos) >= 1 )
        @foreach ($videos as $video)
            <div class="vide-item col-md-10 pull-left panel panel-default">
                <div class="panel-body">
                    <!-- IMAGE VIDEO-->
                    @if(Storage::disk('images')->has($video->image))
                        <div class="video-image-thumb col-md-3 pull-left">
                            <div class="video-image-mask">
                                <img class="video-image" src="{{url('/thumbnail/'.$video->image)}}"/>
                            </div>
                        </div>

                    @endif

                    <div class="data">
                        <h4 class="video-title"><a href="{{route('detailVideo',['video-id'=>$video->id])}}">{{$video->title}}</a></h4>
                        <p><a href="{{route('channel',['user_id'=>$video->user->id])}}">{{$video->user->name.' '.$video->user->surname}}</a> | {{\FormatTime::LongTimeFilter($video->created_at)}}</p>

                    </div>
                    <!-- BUTTONS VIDEO-->
                    <a href="{{route('detailVideo',['video-id'=>$video->id])}}" class="btn btn-success">Watch</a>
                    @if(Auth::check() && Auth::user()->id == $video->user->id)
                        <a href="{{route('videoEdit',['video-id'=>$video->id])}}" class="btn btn-warning">Edit</a>

                        <!-- Button HTML (launch modal on Bootstrap) -->
                        <a href="#deleteModal{{$video->id}}" role="button" class="btn btn-sm btn-primary" data-toggle="modal">Delete</a>

                        <!-- Modal / Window / Overlay on HTML -->
                        <div id="deleteModal{{$video->id}}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Are you sure?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure to delele this video?</p>
                                        <p class="text-warning"><small>{{$video->title}}</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="{{url('/delete-video/'.$video->id)}}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning"><p>There are not videos with this criteria</p></div>
    @endif
</div>
<div class="clearfix"></div>
{{$videos->links()}}