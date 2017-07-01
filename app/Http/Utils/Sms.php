<?php
/**
 * Created by PhpStorm.
 * User: no13bus
 * Date: 17/6/30
 * Time: 上午6:58
 */
namespace App\Http\Utils;


use Log;
/**
 * 发送短信的工具类
 */
class Sms{

    public static function send($mobile, $sms_template, $params=null){
        //签名1
//        include_once dirname(__FILE__).'/AliSmsSdk/load.php';
//        $accessKeyId = config('custom.app_key');
//        $accessKeySecret = config('custom.app_secret');
//        //短信API产品名
//        $product = "Dysmsapi";
//        //短信API产品域名
//        $domain = "dysmsapi.aliyuncs.com";
//        //暂时不支持多Region
//        $region = "cn-hangzhou";
//
//        //初始化访问的acsCleint
//        $profile = \DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
//        \DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
//        $acsClient= new \DefaultAcsClient($profile);
//
//        $request = new \Dysmsapi\Request\V20170525\SendSmsRequest;
//        //必填-短信接收号码
//        $request->setPhoneNumbers($mobile);
//        //必填-短信签名
//        $request->setSignName(config('custom.sms_sign_name'));
//        //必填-短信模板Code
//        $request->setTemplateCode($sms_template);
//        //选填-假如模板中存在变量需要替换则为必填(JSON格式)
//        if(!empty($params)){
//            $request->setTemplateParam(json_encode($params));
//        }
//        //选填-发送短信流水号
//        $request->setOutId(md5(uniqid(mt_rand(), true)));
//
//        //发起访问请求
//        $acsResponse = $acsClient->getAcsResponse($request);


        define("TOP_SDK_WORK_DIR", "/tmp/");
        $topClient = new \TopClient(
            config('custom.app_key'),
            config('custom.app_secret')
        );
        $smsRequest = new \AlibabaAliqinFcSmsNumSendRequest();
        $smsRequest->setSmsType('normal');
        $smsRequest->setSmsFreeSignName(config('custom.sms_sign_name'));
        //$smsRequest->setExtend('1');
        $smsRequest->setSmsTemplateCode($sms_template);
        $smsRequest->setRecNum($mobile);
        if(!empty($params)){
            $smsRequest->setSmsParam(json_encode($params));
        }
        $acsResponse = $topClient->execute($smsRequest);

        //打印日志
        Log::info(implode('^', [$sms_template, config('custom.'.$sms_template), $mobile, json_encode($params), json_encode($acsResponse)]));
        //Log::error('Something is really going wrong.');
    }
}