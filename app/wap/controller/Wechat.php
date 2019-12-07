<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/9
 * Time: 17:18
 */

namespace app\wap\controller;


use app\BaseController;
use EasyWeChat\Factory;
use service\WechatService;

class Wechat extends BaseController
{
    public function serve()
    {
        WechatService::serve();
    }

    public function createMenu()
    {
        WechatService::menuService()->create(config('wechat')['buttons']);
    }

    public function delMenu()
    {
        WechatService::menuService()->delete();
    }
}