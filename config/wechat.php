<?php

return [
    'official_Account' => [
        'app_id' => 'wxf7fb972bd73830fe',
        'secret' => '4314f2726ac8a586011f748d8e0532cd',
        'token' => 'xiaolin',
        'aes_key' => '', // EncodingAESKey，兼容与安全模式下请一定要填写！！！
        // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
        'response_type' => 'array',
        'oauth' => [
            'scopes' => ['snsapi_userinfo'],
            'callback' => 'wechat/Oauth/callback'
        ],
    ],
    'buttons' => [
        [
            "type" => "view",
            "name" => "our home",
            "url" => "http://www.chenqianxl.top/wap/index"
        ]
    ]
];