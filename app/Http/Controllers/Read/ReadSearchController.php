<?php

namespace App\Http\Controllers\Read;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReadSearchController extends Controller
{

    /**
     * 提交搜索请求
     * @param Request $request
     */
    public function submit(Request $request){

    }

    /**
     * 搜索关键词提示
     * @param Request $request
     */
    public function hint(Request $request){

    }


    /**
     * 临时的搜索页面
     * @param Request $request
     */
    public function search(Request $request){
        return view('search');
    }

}
