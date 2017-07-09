<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//首页
Route::get('/','IndexController@show');

//栏目
Route::get('/list/{classify?}','IndexController@showClassify');
//每日视频
Route::get('/videolist','QiniuController@getVideo');
Route::get('/image','QiniuController@getImage');
//每日图片
Route::get('/video/{id}.html','QiniuController@show');

//ajax获取接口最新最热
Route::post('/new','IndexController@getNew');
Route::post('/hot','IndexController@getHot');



//发布界面
Route::get('article/editor','ArticleController@editor');
//文章详情
Route::get('article/{id}.html','ArticleController@show');
//搜索页
Route::post('article/search','ArticleController@search');
//文章发布处理接口
Route::post('article/put','ArticleController@put');

//admin
Route::get('admin/list',"AdminController@articleList");
Route::get('admin/del/{id}',"AdminController@del");
