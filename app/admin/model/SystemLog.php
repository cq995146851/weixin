<?php
/**
 * Created by PhpStorm.
 * User: 陈骞
 * Date: 2019/9/4
 * Time: 16:12
 */

namespace app\admin\model;


class SystemLog extends BaseModel
{
    public static function add($user)
    {
        self::create([
            'admin_id' => $user->id,
            'add_time' => time(),
            'admin_name' => $user->account
        ]);
    }
}