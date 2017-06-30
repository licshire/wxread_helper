<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use EasyWeChat\Foundation\Application;
use NotificationChannels\Dayusms\DayusmsMessage;



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
        // ... 其它同理
//        define("TOP_SDK_WORK_DIR", "/tmp/");
//        $topClient = new \TopClient(
//            'LTAICjvEXLFwNeJO',
//            'aWGmBwkRq22vNHgnDIGsIkvA0jxODn'
//        );
//        $smsRequest = new \AlibabaAliqinFcSmsNumSendRequest();
//        $smsRequest->setSmsType('normal');
//        $smsRequest->setSmsFreeSignName('微读小助');
//        //$smsRequest->setExtend('1');
//        $smsRequest->setSmsTemplateCode('SMS_74510046');
//        $smsRequest->setRecNum('18310970216');
//        if(!empty($params)){
//            $smsRequest->setSmsParam(json_encode(['code'=>'11111', 'product'=>'读书']));
//        }
//        $response = $topClient->execute($smsRequest);
//        var_dump($response);

        //此处需要替换成自己的AK信息
        $accessKeyId = "LTAICjvEXLFwNeJO";
        $accessKeySecret = "aWGmBwkRq22vNHgnDIGsIkvA0jxODn";
        //短信API产品名
        $product = "微读小助";
        //短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";
        //暂时不支持多Region
        $region = "cn-hangzhou";

        //初始化访问的acsCleint
        $profile = \DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
        \DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
        $acsClient= new \DefaultAcsClient($profile);

        $request = new \Dysmsapi\Request\V20170525\SendSmsRequest;
        //必填-短信接收号码
        $request->setPhoneNumbers("18310970216");
        //必填-短信签名
        $request->setSignName("微读小助");
        //必填-短信模板Code
        $request->setTemplateCode("SMS_74510046");
        //选填-假如模板中存在变量需要替换则为必填(JSON格式)
        $request->setTemplateParam(json_encode(['code'=>'11111', 'product'=>'读书']));
        //选填-发送短信流水号
        //$request->setOutId("1234");

        //发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);
        var_dump($acsResponse);


    }

    public function test(Request $request){
        return "test...";
    }
}
