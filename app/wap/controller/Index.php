<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/6
 * Time: 15:40
 */

namespace app\wap\controller;


use app\BaseController;

class Index extends BaseController
{
    public function index()
    {
        return view('index/index');
    }
}