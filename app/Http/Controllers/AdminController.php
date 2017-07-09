<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function articleList(){
        $data = DB::table('article')->get();
        return view('article.admin-list',['data'=>$data]);
    }
    public function del($id){
        DB::table('article')->where('id',$id)->delete();
        return redirect('/admin/list');
    }
}
