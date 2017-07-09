<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //发布文章
    public function editor(){
        return view('article.article-editor');
    }
    //发布接受API
    public function put(Request $request){
        if($request->hasFile('headimg')){
            $file = $request->file('headimg');
            if($file->isValid()) {
                //类型
                $type = $file->getClientMimeType();
                //临时路径
                $src = $file->getRealPath();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //文件名
                $filepath = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filepath,file_get_contents($src));

                if($bool){
                    $data = $request->all();
                    $bool = DB::table('article')->insert([
                        'class'=>$data['class'],
                        'writer'=>$data['writer'],
                        'title'=>$data['title'],
                        'lable'=>$data['lable'],
                        'summary'=>$data['summary'],
                        'content'=>$data['content'],
                        'headimg'=>$filepath,
                        'createtime'=>time(),
                        'keyword'=>$data['keyword'],
                        'url'=>$data['url']
                    ]);
                    if($bool){
                        return redirect('/');
                    }
                }else{
                    return "<script>alert('文件上传失败');history.back();</script>";
                }
            }else{
                return "<script>alert('文件上传失败');history.back();</script>";
            }
        }else{
            $data = $request->all();
            $bool = DB::table('article')->insert([
                'class'=>$data['class'],
                'writer'=>$data['writer'],
                'title'=>$data['title'],
                'lable'=>$data['lable'],
                'summary'=>$data['summary'],
                'content'=>$data['content'],
                'headimg'=>'22.jpg',
                'createtime'=>time(),
                'keyword'=>$data['keyword'],
                'url'=>$data['url']
            ]);
            if($bool){
                return redirect('/');
            }
        }
    }
    //显示文章
    public function show($id=1){
        DB::table('article')->where('id',$id)->increment('borwse');
        $data = DB::table('article')->where('id',$id)->first();
        return view('article.article',['data'=>$data]);
    }
    public function search(Request $request){
        $keyword = $request->input('search');
        $articleList = DB::table('article')->orderBy('id','desc')->where('keyword','like',"%$keyword%")->simplePaginate(5);
        return view('index.index',['articles'=>$articleList]);
    }

}
