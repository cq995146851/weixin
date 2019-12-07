<?php

namespace app\subscribe;

use app\admin\model\SystemAdmin;
use app\admin\model\SystemLog;

class System
{
    public function onSystemAdminLoginAfter($event)
    {
        list($user) = $event;
        SystemAdmin::update([
            'last_ip' => request()->ip(),
            'last_time' => time(),
            'login_count' => ($user->login_count) + 1
        ], ['id' => $user->id]);
    }

    public function onSystemVisit($user)
    {
        SystemLog::add($user);
    }
}
