@extends('tpl.templet')
    {{--title--}}
@section('title',$data->title)
{{--css--}}
@section('css')
    @parent
@stop
{{--article--}}
@section('content')
    <article>
        <article class="row panel panel-primary">
            <div class="panel-heading" style="font-size: 20px;">
                <strong class="label label-danger">{{$data->lable}}</strong>
                <strong >{{$data->title}}</strong>
            </div>
            <div class="panel-info text-right">
                <span class="glyphicon glyphicon-time text-info"></span>
                <time class="text-info">{{date('Y-m-d',$data->createtime)}}</time>
                <span class="glyphicon glyphicon-user text-info"></span>
                <span>{{$data->writer}}</span>
            </div>
            <div class="panel-body">
                {!! $data->content !!}
            </div>
            <div class="panel-info text-right">
                <span class="glyphicon glyphicon-eye-open text-info"></span>
                <span class="text-info">{{$data->borwse}}</span>
                <span class=" glyphicon glyphicon-folder-close text-info"></span>
                <span class="text-info">{{$data->class}}</span>

            <div class="panel-info ">
                <div class="bdsharebuttonbox ">
                    <a href="#" class="bds_more" data-cmd="more"></a>
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                </div>
                <script>
                    window._bd_share_config={
                        "common":{"bdSnsKey":{},
                            "bdText":"",
                            "bdMini":"2",
                            "bdPic":"",
                            "bdStyle":"0",
                            "bdSize":"16"},
                        "share":{}};
                    with(document)0[(getElementsByTagName('head')[0]||body)
                        .appendChild(createElement('script'))
                        .src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='
                        +~(-new Date()/36e5)];
                </script>
            </div>
            <div class="panel-footer text-right">
                <a href="{{$data->url}}" class="btn btn-info  ">获取地址</a>
            </div>
        </article>
    </article>

    <div class="panel panel-info">
        <div class="panel-heading">
            <span class=" glyphicon glyphicon-edit"></span>
            <span >发表看法：</span>
        </div>
        <div class="panel-body">
            <!--PC和WAP自适应版-->
            <div class="well bg-success">
                <div id="SOHUCS" sid="{{$data->id}}" ></div>
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
@stop