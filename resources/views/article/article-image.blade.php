@extends('tpl.templet')
@section('title','图片素材')
@section('content')
    <div class="well">
        @foreach($images as $img)
            <a href="{{$img->src}}"><img src="{{$img->src}}" alt="" class="img-thumbnail"></a>
        @endforeach
    </div>
@stop
@section('js')
    @parent
@stop