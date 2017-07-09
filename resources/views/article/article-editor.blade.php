@extends('tpl.templet')
@section('title','文章发布')
{{--CSS--}}
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{url('styles/simditor.css')}}" />
@stop
{{--article--}}
@section('content')
         <form action="{{url('/article/put')}}" method="post" class="row panel panel-primary" enctype="multipart/form-data">
             {{ csrf_field() }}
            <div class="panel-heading">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-xs-3">
                            <h3>标签：</h3>
                            <input  type="text" placeholder="标签(10)" class="form-control" name="lable" minlength="2" maxlength="10">
                        </div>
                        <div class="col-xs-9">
                            <h3>标题：</h3>
                            <input class="form-control" type="text"  placeholder="文章的标题（字数：35）" name="title" minlength="2" maxlength="35">
                        </div>
                    </div>
                    <h3>简介：</h3>
                    <input class="form-control" type="text"  placeholder="文章的简介（字数：50；用于首页" name="summary" minlength="6"  maxlength="50">
                    <h3>缩略图(260x260)：</h3>
                    <input type="file" accept="image/jpeg,image/png" name="headimg">
                </div>
            </div>
            <div class="panel-info text-right">
                <span class="glyphicon glyphicon-user text-info">作者：</span>
                <span><input type="text" name="writer" placeholder="作者" class="input-sm" minlength="2" maxlength="10"></span>
            </div>
            <div class="panel-info" >
                <textarea id="editor"  autofocus></textarea>
            </div>
             <a class="btn btn-success btn-block" onclick="$('#body').html(null).append(editor.getValue())">查看效果</a>
             <hr>
             <input type="hidden"  name="content" id="content">
             <div id="body" class="panel-body "></div>
             <hr>
            <div class="panel-info text-right">
                <span class=" glyphicon glyphicon-folder-close text-info">选择分类：</span>
                <span class="text-info">
                    <select name="class">
                        <option value="常用代码">常用代码</option>
                        <option value="常见问题">常见问题</option>
                        <option value="项目资源">项目资源</option>
                    </select></span>
            </div>
            <div class="panel-info ">
                <span class="glyphicon glyphicon-tags text-info " >关键字</span>
                <input class="form-control" placeholder="添加关键字,以逗号隔开，类似于：（轮播图，编辑器插件，图片）" name="keyword" minlength="1">
                <span class="glyphicon glyphicon-tags text-info ">下载地址</span>
                <input type="text" class="form-control" value="http://" name="url" minlength="1">
            </div>
            <div class="panel-footer text-right">
                <input type="submit" class="btn btn-danger" value="发布文章" id="sub">
            </div>
         </form>
@stop
{{--jiaoben--}}
@section('js')
    @parent
    <script  src="{{url('scripts/editor.js')}}"></script>
    <script  src="{{url('scripts/module.min.js')}}"></script>
    <script  src="{{url('scripts/hotkeys.min.js')}}"></script>
    <script  src="{{url('scripts/uploader.min.js')}}"></script>
    <script  src="{{url('scripts/simditor.min.js')}}"></script>
    <script>
        var editor = new Simditor({
            textarea: $('#editor'),
            placeholder: '编辑你的文章内容，让你的文章美观点吧！',
            toolbar:['title', 'bold', 'italic', 'underline', 'strikethrough',
                'fontScale', 'color','ol', 'ul', 'code', 'table', 'link', 'hr','alignment']});
        $('#sub').click(function () {
            $(this).hide()
            if(editor.getValue() == ''){
                $(this).show()
                return false
            }else {
                $('#content').val(editor.getValue());
            }

        });
    </script>
@stop
