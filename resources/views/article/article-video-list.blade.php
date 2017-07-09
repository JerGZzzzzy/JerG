@extends('tpl.templet')
@section('title','随缘更新视频')
@section('content')
    @forelse($data as $video)
        <div class="well">
            <p>{{$video->title}}
                <span style="float: right">
                    <a href="{{url("video/$video->id.html")}}" class="btn btn-danger">在线观看</a>
                </span>
            </p>
        </div>
    @endforeach
@stop

@section('js')
@parent

@stop