<?php
/**
 * Created by PhpStorm.
 * User: no13bus
 * Date: 17/6/30
 * Time: 上午6:58
 */

use Log;
/**
 * 发送短信的工具类
 */
class Sms{

    public static function send($mobile, $sms_template, $params=null){
        define("TOP_SDK_WORK_DIR", "/tmp/");
        $topClient = new \TopClient(
            config('custom.app_key'),
            config('custom.app_secret')
        );
        $smsRequest = new \AlibabaAliqinFcSmsNumSendRequest();
        $smsRequest->setSmsType(config('custom.sms_type'));
        $smsRequest->setSmsFreeSignName('custom.sms_sign_name');
        //$smsRequest->setExtend('1');
        $smsRequest->setSmsTemplateCode($sms_template);
        $smsRequest->setRecNum($mobile);
        if(!empty($params)){
            $smsRequest->setSmsParam(json_encode($params));
        }
        $response = $topClient->execute($smsRequest);
        //打印日志
        Log::info(implode('^', [$sms_template, $mobile, json_encode($params), json_encode($response)]));
    }
}