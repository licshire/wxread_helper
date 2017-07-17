<?php

return [
    //其他相关的配置
    'app_key' => '23326731',
    'app_secret' => 'f551b06cad1af901670d1bd227be2e08',
    'sms_type' => 'normal',
    'sms_sign_name' => '阳光钱包',

    //短信模板
    'SMS_8951452' =>'验证码：${vcode}。请勿透露给他人。如遇问题，可联系在线客服',


//    'app_key' => 'LTAICjvEXLFwNeJO',
//    'app_secret' => 'aWGmBwkRq22vNHgnDIGsIkvA0jxODn',
//    'sms_type' => 'normal',
//    'sms_sign_name' => '微读小助',
//
//    //短信模板
//    'SMS_74510046' =>'尊敬的用户，您正在注册成为${product}用户，验证码为${code}，感谢您的支持！',

    //微信菜单设置
    'menu' =>[
        [
            "type" => "scancode_waitmsg",
            "name" => "扫",
            "key"  => "scan_code_key"
        ],
        [
            "type" => "view",
            "name" => "搜",
            "url"  => env('APP_URL')."/read/search",
        ],
        [
            "type" => "view",
            "name" => "我",
            "url"  => env('APP_URL')."/read/userIndex",
        ]
    ]


];
