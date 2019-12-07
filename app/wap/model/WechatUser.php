<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/9
 * Time: 22:17
 */

namespace app\wap\model;


use service\WechatService;
use think\Exception;

class WechatUser extends BaseModel
{
    public static function saveUser($openid)
    {
        empty(self::getByopenid($openid)) ? self::addUser($openid) : self::updateUser($openid);
    }

    public static function getByopenid($openid)
    {
        return self::where('openid', $openid)->find();
    }

    public static function addUser($openid)
    {
        $userInfo = WechatService::getUserInfo($openid);
        if(!isset($userInfo['subscribe']) || !$userInfo['subscribe'] || !isset($userInfo['openid']))
            throw new Exception('请关注公众号!');
        $userInfo['tagid_list'] = implode(',',$userInfo['tagid_list']);
        //判断 unionid 是否存在
        if(isset($userInfo['unionid'])){
            $wechatInfo = self::where('unionid', $userInfo['unionid'])->find();
            if($wechatInfo){
                return self::update($userInfo, ['unionid' => $userInfo['unionid']]);
            }
        }
        self::beginTrans();
        $wechatUser = self::create($userInfo);
        if(!$wechatUser){
            self::rollbackTrans();
            throw new Exception('用户储存失败!');
        }
        if(!User::setWechatUser($wechatUser)){
            self::rollbackTrans();
            throw new Exception('用户信息储存失败!');
        }
        self::commitTrans();
        return $wechatUser;
    }

    public static function updateUser($openid)
    {
        $userInfo = WechatService::getUserInfo($openid);
        $userInfo['tagid_list'] = implode(',',$userInfo['tagid_list']);
        return self::update($userInfo, ['openid' => $openid]);
    }
}