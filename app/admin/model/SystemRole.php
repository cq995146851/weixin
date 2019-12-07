<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/4
 * Time: 23:41
 */

namespace app\admin\model;


class SystemRole extends BaseModel
{
    public static function getNameByids($roles)
    {
        $roles = self::where('id', 'in', $roles)
            ->field('role_name')
            ->select();
        $arr = [];
        foreach ($roles as $role) {
            array_push($arr, $role['role_name']);
        }
        return $arr;
    }
}