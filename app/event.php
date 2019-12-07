<?php
// 事件定义文件
return [
    'bind'      => [
    ],

    'listen'    => [
        'AppInit'  => [],
        'HttpRun'  => [],
        'HttpEnd'  => [],
        'LogLevel' => [],
        'LogWrite' => [],
        'SystemAdminLoginAfter' => [],  //后台管理员登录后
        'WechatMessageBefore' => []     //处理微信消息前
    ],

    'subscribe' => [
        app\subscribe\System::class,
        app\subscribe\Wechat::class
    ],
];
