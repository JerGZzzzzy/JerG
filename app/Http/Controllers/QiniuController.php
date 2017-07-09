<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;
class QiniuController extends Controller
{
    //
    public function show($id){
        $data = DB::table('url')->where('id',$id)->first();
        return view('article.article-video',['videos'=>$data]);
    }
    public function getVideo(Request $request){
       DB::table('url')->truncate();
       $accessKey = '9Txv6LfrdmXv8R5Er84n-lMdFqOZtJ_kVnYFhD1I';
       $secretKey = '3fQf9aj2XYPjexNDi_1O2MB17TsCE1asGxN5vChh';
       $auth = new Auth($accessKey, $secretKey);
       $bucketMgr = new BucketManager($auth);
    // 要列取的空间名称
        $bucket = 'video';
    // 要列取文件的公共前缀
        $url = "http://oslv33usu.bkt.clouddn.com/";
        list($iterms) = $bucketMgr->listFiles($bucket);
        if (empty($iterms)) {
            return 'error';
        } else {
            foreach ($iterms as $list){
                $authUrl = $auth->privateDownloadUrl($url.$list['key']);
                DB::table('url')->insert([
                    'title'=>$list['key'],
                    'url'=>$authUrl,
                ]);
            }
            $datas = DB::table('url')->get();
            return view('article.article-video-list',['data'=>$datas]);
        }
    }
    public function getImage(Request $request){
        DB::table('images')->truncate();
        $accessKey = '9Txv6LfrdmXv8R5Er84n-lMdFqOZtJ_kVnYFhD1I';
        $secretKey = '3fQf9aj2XYPjexNDi_1O2MB17TsCE1asGxN5vChh';
        $auth = new Auth($accessKey, $secretKey);
        $bucketMgr = new BucketManager($auth);
        // 要列取的空间名称
        $bucket = 'images';
        // 要列取文件的公共前缀
        $url = "http://oslvpazki.bkt.clouddn.com/";
        list($iterms) = $bucketMgr->listFiles($bucket);
        if (empty($iterms)) {
            return 'error';
        } else {
            foreach ($iterms as $list){
                $authUrl = $auth->privateDownloadUrl($url.$list['key']);
                DB::table('images')->insert([
                    'src'=>$authUrl,
                ]);
            }
            $datas = DB::table('images')->get();
            return view('article.article-image',['images'=>$datas]);
        }
    }
}
