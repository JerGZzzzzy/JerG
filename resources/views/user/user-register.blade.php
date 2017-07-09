@extends('tpl.templet')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-user "></span>
            <span id="user-title">会员注册</span>
        </div>
        <div class="panel-body">
            <form action="{{url('/register')}}" method="post" class="form-group">
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
                    <li class="text-danger">邮箱规则：[\w-])+@([\w-])+(.[\w-])+/</li>
                    <li class="input-group">
                        <span class="input-group-addon">验证邮箱:</span>
                        <input type="email" class="form-control" name="email">
                    </li>
                    <hr>
                    <li class="input-group-btn ">
                        <button class="btn btn-info" >
                            <img src="" alt="">快速注册</button>
                        <a href="{{url('user/login')}}"  class="btn btn-link">快速登录-></a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@stop