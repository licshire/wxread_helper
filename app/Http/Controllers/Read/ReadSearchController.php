<?php

namespace App\Http\Controllers\Read;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Utils\WereadSDK;

class ReadSearchController extends Controller
{

    /**
     * 提交搜索请求
     * @param Request $request
     */
    public function submit(Request $request){
        $q = $request->json('q');
        return file_get_contents(dirname(__FILE__).'/read.json');
//        return WereadSDK::getSearchList($q);
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


    /**
     * 搜索结果列表页
     * @param Request $request
     */
    public function searchList(Request $request){
        return view('searchList');
    }

}
