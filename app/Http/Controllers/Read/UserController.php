<?php

namespace App\Http\Controllers\Read;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Utils\JsonFactory;

class UserController extends Controller
{

    /**
     * 我的页面
     * @param Request $request
     */
    public function index(Request $request){
        return view('userInfo');
    }


    public function userInfo(Request $request){
        return 'userInfo';
    }
}
