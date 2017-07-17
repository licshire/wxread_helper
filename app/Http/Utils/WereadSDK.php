<?php
/**
 * Created by PhpStorm.
 * User: no13bus
 * Date: 17/6/18
 * Time: 下午10:32
 * 微信阅读分析得到的接口sdk
 */

namespace App\Http\Utils;

use App\Http\Utils\RestClient;
use League\Flysystem\Exception;
use Redis;

class WereadSDK
{

    const DOMAIN = 'https://i.weread.qq.com';
    const SUGGEST_URL = self::DOMAIN.'/store/suggest?count=10&keyword=%s';
    const SEARCH_LIST_URL = self::DOMAIN.'/store/search?author=&authorVids=&count=20&fromBookId=&keyword=%s&maxIdx=0&outer=1&type=0&v=1';
    const BOOK_DETAIL = self::DOMAIN.'/book/info?bookId=%s&myzy=1';
    const GUEST_LOGIN_IN = self::DOMAIN.'/guestLogin';
    const DEVICE_ID = "c538ebb1b1a46842db813ed857f58bef";

    const HEADER_KEY = 'read_headers';



    private static function postData($url){
        $rest = new RestClient;
        $headers_json = json_decode(self::getToken(), true);
        $headers = array_map(function($a, $b){return $a.":".$b;}, array_keys($headers_json), $headers_json);
        $resp = $rest->post($url, null, $headers);
        if(empty($resp)){
            throw new Exception($url . "|获取信息失败");
        }
        $resp_arr = json_decode($resp, true);
        if(!empty($resp_arr['errcode'])){
            throw new Exception($resp_arr['errmsg']);
        }
        return $resp_arr;
    }
    public static function getToken(){
        $result = Redis::get(self::HEADER_KEY);
        if(empty($result)){
            $rest = new RestClient;
            $data = ["deviceId" => self::DEVICE_ID];
            $result = $rest->post(self::GUEST_LOGIN_IN, $data, null);
            if(empty($result)){
                throw new \Exception("获取token失败");
            }
            //headers存入到redis里面去. 失效时间为1小时
            Redis::setex(self::HEADER_KEY, 3600, $result);
        }
        return $result;



//        {
//            "vid": 110502484,
//            "skey": "0XzQKMx1",
//            "accessToken": "0XzQKMx1",
//            "openId": "G_110502484_oCN_CRO5Tcm3TuLZhL7F"
//        }
    }


    /**
     * 获取书籍的详细信息
     * @param $book_id
     */
    public static function getBookDetail($book_id){
        $url = sprintf(self::BOOK_DETAIL, $book_id);
        return self::postData($url);
    }


    /**
     * 根据关键字获取微信读书的搜索结果列表
     * @param $keyword
     */
    public static function getSearchList($keyword){
        $url = sprintf(self::SEARCH_LIST_URL, $keyword);
        //数组中有一个key是hasMore 如果是0 则表示数据已经没有了, 如果是1 则表示分页还没完成
        return self::postData($url);
    }

    public static function getSuggest($keyword){
        $url = sprintf(self::SUGGEST_URL, $keyword);
        return self::postData($url);
    }

}