<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/26
 * Time: 13:14
 */

namespace app\wap\controller;


use app\BaseController;

class My extends BaseController
{
    public function index()
    {
        return view('my/index');
    }
}