@extends('tpl.templet')
@section('title','后台显示文章列表')
@section('content')
    @forelse($data as $article)
        <div class="well">
            <p>{{$article->title}}
                <span style="float: right">
                    <a href="{{url("/admin/del/$article->id")}}" class="btn btn-danger">删除文章</a>
                </span>
            </p>
        </div>
    @endforeach
@stop

@section('js')
@parent

@stop