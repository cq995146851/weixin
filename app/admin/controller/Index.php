<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/2
 * Time: 18:02
 */

namespace app\admin\controller;


use app\admin\model\SystemAdmin;
use app\admin\model\SystemRole;
use app\BaseController;

class Index extends BaseController
{
    public function index()
    {
        $login_info = SystemAdmin::getLoginInfo();
        $roles = SystemRole::getNameByids($login_info['roles']);
        $roles = implode(',', $roles);
        return view('index/index', compact('login_info', 'roles'));
    }
}