<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/1
 * Time: 22:13
 */

namespace app\admin\controller;



use app\admin\model\SystemAdmin;
use app\BaseController;
use service\UtilService;

class Login extends BaseController
{
    public function create()
    {
        return view('login/create');
    }

    public function verify()
    {
        $data = UtilService::postMore([
            'account', 'pwd', 'captcha'
        ], request());
        if (!captcha_check($data['captcha']))
            return json(['errCode' => 1000, 'msg' => '验证码错误']);
        return SystemAdmin::checkLogin($data['account'], $data['pwd']);
    }

    public function captcha()
    {
        return captcha();
    }

    public function logout()
    {
        SystemAdmin::delLoginInfo();
        return redirect('admin.login.create');
    }
}