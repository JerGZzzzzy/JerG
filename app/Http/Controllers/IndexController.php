<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function show(){
        $articleList = DB::table('article')->orderBy('id','desc')->simplePaginate(5);
        return view('index.index',['articles'=>$articleList]);
    }
    public function showClassify($classify){
        switch ($classify){
            case 'code':
                $articleList = DB::table('article')->where('class','常用代码')->orderBy('id','desc')->simplePaginate(5);
                return view('index.index',['articles'=>$articleList]);
            case 'issue':
                $articleList = DB::table('article')->where('class','常见问题')->orderBy('id','desc')->simplePaginate(5);
                return view('index.index',['articles'=>$articleList]);
            case 'resource':
                $articleList = DB::table('article')->where('class','项目资源')->orderBy('id','desc')->simplePaginate(5);
                return view('index.index',['articles'=>$articleList]);
            default:
                $articleList = DB::table('article')->orderBy('id','desc')->simplePaginate(5);
                return view('index.index',['articles'=>$articleList]);
                break;
        }
    }
    public function getNew(){
        $datas = DB::table('article')->where('borwse','<=',300)->orderBy('id','desc')->limit(6)->get();
        return response()->json($datas);
    }
    public function getHot(){
        $datas = DB::table('article')->where('borwse','>',300)->orderBy('id','desc')->limit(6)->get();
         return response()->json($datas);
    }
}
