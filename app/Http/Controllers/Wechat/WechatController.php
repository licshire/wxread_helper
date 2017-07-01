<?php

namespace App\Http\Controllers\Wechat;

use Faker\Provider\bn_BD\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use App\Http\Utils\Sms;

class WechatController extends Controller
{
    public function serve(Request $request){
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        Log::info($wechat->server->serve());
        $wechat->server->setMessageHandler(function($message){
            switch ($message->MsgType) {
                case 'event':
                    if($message->Event == 'scancode_waitmsg'){
                        //https://api.douban.com/v2/book/isbn/9787550266094 查书号的api
                        Log::info(json_encode($message['ScanCodeInfo']['ScanResult']));
                        return $message['ScanCodeInfo']['ScanResult'];
                    }else{
                        return '收到事件消息';
                    }

                    break;
                case 'text':
                    return '收到文字消息';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });

        Log::info('return response.');

        return $wechat->server->serve();
    }


    public function demo(Request $request)
    {
        //生成菜单
//        $app = app('wechat');
//        $menu = $app->menu;
//        $buttons = [
//            [
//                "type"=>"view",
//                "name"=>"进入课堂",
//                "url"=>"http://read.no13bus.com/wechat/test"
//            ],
//        ];
//        $menu->destroy();
//        $menu->add(config('wechat.menu'));
//        return "OK";

        // $wechat 则为容器中 EasyWeChat\Foundation\Application 的实例
        //$wechatServer = EasyWeChat::server(); // 服务端
        //$wechatUser = EasyWeChat::user(); // 用户服务
//        Sms::send('18310970216', 'SMS_74510046', ['code'=>'1111', 'product'=>'dushu']);
        Sms::send('18310970216', 'SMS_8951452', ['vcode'=>'1111']);
        var_dump(222);


    }

    /*
     * 重新生成微信菜单
     */
    public function menu(Request $request){
        $app = app('wechat');
        $menu = $app->menu;
        $buttons = [
            [
                "type"=>"view",
                "name"=>"进入课堂",
                "url"=>"http://read.no13bus.com/wechat/test"
            ],
        ];
        $menu->destroy();
        $menu->add(config('wechat.menu'));
        return "OK";
    }

    public function test(Request $request){
        return "test...";
    }
}
