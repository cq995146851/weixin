<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/2
 * Time: 23:53
 */

namespace app\admin\model;


class SystemAdmin extends BaseModel
{

    public function logs()
    {
        return $this->hasMany(SystemLog::class, 'admin_id', 'id');
    }

    public static function checkLogin($account, $pwd)
    {
        $user = self::where('account', $account)->find();
        if (!$user['account']) return json(['msg' => '账号不存在', 'errCode' => 10003]);
        if (!$user['status']) return json(['msg' => '账号已被关闭', 'errCode' => 10004]);
        $num = cache($user['account']) ?: 0;
        if ($num == config('setting.login_error_num'))
            return json(['msg' => '错误次数过多，请稍后重试', 'errCode' => 10002]);
        if ($user['pwd'] != md5($pwd)) {
            $num++;
            cache($user['account'], $num, config('setting.login_error_time'));
            $chance = config('setting.login_error_num') - $num;
            return json(['msg' => '密码错误,您还有' . $chance . '次机会', 'errCode' => 10001]);
        }
        self::saveLoginInfo($user);
        cache($user['account'], null);
        event('SystemAdminLoginAfter', [$user]);
        return json(['msg' => '登录成功', 'errCode' => 0]);
    }

    public static function getLoginInfo()
    {
        return self::where('id', session('system_admin')->id)->find();
    }

    public static function saveLoginInfo($user)
    {
        session('system_admin', $user);
    }

    public static function delLoginInfo()
    {
        session('system_admin', null);
    }
}