@extends('tpl.templet')
{{--title--}}
@section('title',$videos->title)
{{--css--}}
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{url('styles/reset.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('styles/core.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('styles/willesPlay.css')}}"/>

@stop
{{--article--}}
@section('content')
<div id="willesPlay">
    <div class="playHeader">
        <div class="videoName">{{$videos->title}}</div>
    </div>
    <div class="playContent">
        <video width="100%" height="100%" id="playVideo">
            <source src="{{$videos->url}}"type="video/mp4"></source>
            当前浏览器不支持video直接播放
        </video>
        <div class="playTip glyphicon glyphicon-play"></div>
    </div>
    <div class="playControll">
        <div class="playPause playIcon"></div>
        <div class="timebar">
            <span class="currentTime">0:00:00</span>
            <div class="progress">
                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
            </div>
            <span class="duration">JeRG</span>
        </div>
        <div class="otherControl">
            <span class="volume glyphicon glyphicon-volume-down"></span>
            <span class="fullScreen glyphicon glyphicon-fullscreen"></span>
            <div class="volumeBar">
                <div class="volumewrap">
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 8px;height: 40%;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <span class=" glyphicon glyphicon-edit"></span>
        <span >发表看法：</span>
    </div>
    <div class="panel-body">
        <!--PC和WAP自适应版-->
        <div class="well bg-success">
            <div id="SOHUCS" sid="adsad" ></div>
            <script type="text/javascript">
                (function(){
                    var appid = 'cyt5HWs9G';
                    var conf = 'prod_5897a85ae66a7ecbb2fa5570e2cdee1f';
                    var width = window.innerWidth || document.documentElement.clientWidth;
                    if (width < 960) {
                        window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("http://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>
        </div>
    </div>
</div>
@stop
@section('js')
    @parent
    <script src="{{url('scripts/willesPlay.js')}}" type="text/javascript" charset="utf-8"></script>
@stop