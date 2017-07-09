<!doctype html>
<html lang="ch-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{url('images/logo.png')}}">
    @section('css')
        <link rel="stylesheet"  href="{{url('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet"  href="{{url('styles/public.css')}}">
        <link rel="stylesheet"  href="{{url('styles/article.css')}}">
    @show
    <title>自由Code-@yield('title')</title>
</head>
<body>
<header class="header">
    <nav class=" navbar  navbar-default ">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand " href="/" >
                    自由Code
                </a>
                <button type="button" class="navbar-toggle"
                        data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
                    <li ><a href="{{url('/list/code')}}"><span class="glyphicon glyphicon-book"></span> 常用代码</a></li>
                    <li ><a href="{{url('/list/issue')}}"><span class="glyphicon glyphicon-new-window"></span> 常见问题</a></li>
                    <li ><a href="{{url('/list/resource')}}"><span class="glyphicon glyphicon-cloud"></span> 项目资源</a></li>
                    <li ><a href="{{url('/videolist')}}"><span class="glyphicon glyphicon-facetime-video"></span> 随缘视频</a></li>
                    <li ><a href="{{url('/image')}}"><span class="glyphicon glyphicon-picture"></span> 图片素材</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
{{--轮播图--}}
    <section class="container">
        @yield('carouser')
    </section>
    <section class="container" >
        <section class="row">
            <aside class="col-md-4">
                <div class="well">
                    <a href="{{url('/article/editor')}}" class="btn btn-block btn-danger btn-lg">
                        发布文章
                    </a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class=" glyphicon glyphicon-search "></span>
                        <span >全站搜索</span>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('/article/search')}}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="通过关键字查询">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><span class=" glyphicon glyphicon-search"></span>So</button></span>
                            </div>
                        </form>
                    </div>
                </div>
                {{--fixed--}}
                <nav id="fixed">
                    {{--热门--}}
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-fire "></span>
                            <span >热门文章</span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group" id="hot">
                            </ul>
                        </div>
                    </div>
                    {{--New--}}
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-fire "></span>
                            <span >最新推荐</span>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group" id="new">
                            </ul>
                        </div>
                    </div>
                </nav>
            </aside>
            {{--文章区--}}
            <article class="col-md-8">
                @section('content')
                @show
            </article>
        </section>
    </section>
{{--页脚--}}
<footer>
    <hr>
    <p class="text-center">本站的内容皆有网友提供，本站不承担任何责任！</p>
    <p class="text-center">自由Code-自由传播平台;作者：JerGZzzzzy</p>
    <p class="text-center">Emil:342828303@qq.com</p>
</footer>
@section('js')
    <script src="{{url('scripts/jquery-2.0.2.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        $(document).scroll(function () {
            if($(document).scrollTop()){
                $('.header').addClass('navbar-fixed-top');
            }else {
                $('.header').removeClass('navbar-fixed-top');

            }
        });
        // 滚动固定
        function fixeds($this) {
            var w = $this.width();
            var h = $this.height();
            var l = $this.offset().left;
            var fixed_top = $this.offset().top;
            $(document).scroll(function () {
                if($(document).innerWidth()<='1024'){
                    return
                }
                if($(document).scrollTop()>=fixed_top){
                    $this.css({
                        position:'fixed',
                        width:w+'px',
                        height:h+'px',
                        top:'60px',
                        left:l+'px'
                    });
                }else{
                    $this.css({
                        position:'static',
                        width:'auto',
                        height:'auto'}
                    );
                }
            });
        };
        $(document).rel(function () {
            $('#fixed').css({position:'static'})
        });
        fixeds($('#fixed'));
    </script>
    <script>
        $.post('{{url('/new')}}',{_token:'{{ session('_token') }}'},function (data) {
            if(data == ''){
                $('#new').append('<p class="text-success text-center">还没有最新的文章哟</p>');
            }
            $.each(data,function (key,val) {
                text = ' <li class="list-group-item"><a href="/article/'+val.id+'.html">'+val.title+'</a> <span class="label label-primary">New</span></li>'
                $('#new').append(text);
            })
        });
        $.post('{{url('/hot')}}',{_token:'{{ session('_token') }}'},function (data) {
            if(data == ''){
                $('#hot').append('<p class="text-danger text-center">还没有最热的文章哟</p>');
            }

            $.each(data,function (key,val) {
                text = ' <li class="list-group-item"><a href="/article/'+val.id+'.html">'+val.title+'</a> <span class="label label-danger">Hot</span></li>'
                $('#hot').append(text);
            })
        });
    </script>
@show
</body>
</html>



