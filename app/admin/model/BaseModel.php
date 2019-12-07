<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/2
 * Time: 23:54
 */

namespace app\admin\model;


use think\Model;

class BaseModel extends Model
{
    protected function getAddTimeAttr($value)
    {
        return date('Y-m-d H:i:s', $value);
    }

    protected function getLastTimeAttr($value)
    {
        return date('Y-m-d H:i:s', $value);
    }
}