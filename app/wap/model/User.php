<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/9
 * Time: 23:04
 */

namespace app\wap\model;


class User extends BaseModel
{
    public static function setWechatUser($wechatUser,$spread_uid = 0)
    {
        return self::create([
            'account'=>'wx' . $wechatUser['uid'] . time(),
            'pwd' => md5(123456),
            'nickname'=>$wechatUser['nickname'] ?: '',
            'avatar'=>$wechatUser['headimgurl'] ?: '',
            'spread_uid'=>$spread_uid,
            'add_time' => time(),
            'add_ip'=>app('request')->ip(),
            'last_time' => time(),
            'last_ip'=>app('request')->ip(),
            'uid'=>$wechatUser['uid'],
            'user_type'=> 'wechat'
        ]);
    }
}