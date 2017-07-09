@extends('tpl.templet')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-user "></span>
            <span id="user-title">会员登录</span>
        </div>
        <div class="panel-body">
            <form action="{{url('/login')}}" method="post" class="form-group">
                {{ csrf_field() }}
                <ul class="list-unstyled ">
                    <li class="text-danger">账号规则：[A-z0-9]{6,25}</li>
                    <li class="input-group">
                        <span class="input-group-addon"> 会 员 名 : </span>
                        <input type="text" class="form-control" name="user">
                    </li>
                    <li class="text-danger">密码规则：[A-z0-9]{6,25}</li>
                    <li class="input-group">
                        <span class="input-group-addon">登录密码:</span>
                        <input type="password" class="form-control" name="pass">
                    </li>
                    <li class="text-right">
                        <a href="#">忘记密码？</a>
                    </li>
                    <li class="input-group-btn ">
                        <button type="submit" class="btn btn-info">
                            <img src="" alt="">立即登录</button>
                        <a href="{{url('user/register')}}"  class="btn btn-link">立即注册-></a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@stop
@section('js')

@stop