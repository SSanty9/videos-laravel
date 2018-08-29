@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="container">
                <div class="col-md-4">
                    <h2> Search: {{$search}}</h2>
                    <br>
                </div>
                <div class="col-md-8">
                    <form action="{{url('/search/'.$search )}}" class="col-md-4 pull-right" method="get">
                        <label for="filter">Order</label>
                        <select name="filter" id="" class="form-control">
                            <option value="new">Newest</option>
                            <option value="old">Oldest</option>
                            <option value="alpha">Order from A to Z</option>
                        </select>
                        <input type="submit" value="order" class="btn-filter btn btn-sm btn-primary pull-right">
                        <br>
                    </form>
                </div>
                <div class="clearfix"></div>
                @include('video.videosList')

            </div>

        </div>
    </div>

@endsection



