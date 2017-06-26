<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller
{
    public function serve(Request $request){
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        Log::info($wechat->server->serve());
        $wechat->server->setMessageHandler(function($message){
            switch ($message->MsgType) {
                case 'event':
                    if($message->Event == 'scancode_push'){
                        return $message->ScanCodeInfo->ScanResult;
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
        $menu->add($buttons);
        return "OK";


        // $wechat 则为容器中 EasyWeChat\Foundation\Application 的实例
        //$wechatServer = EasyWeChat::server(); // 服务端
        //$wechatUser = EasyWeChat::user(); // 用户服务
        // ... 其它同理
    }

    public function test(Request $request){
        return "test...";
    }
}
