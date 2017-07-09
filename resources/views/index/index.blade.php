@extends('tpl.templet')
@section('title','自由Code—自由的传播平台')
@section('carouser')
        @include('index.carouser')
@stop
@section('content')
    @include('article.article-list',$articles)
@stop

@section('js')
    @parent
@stop