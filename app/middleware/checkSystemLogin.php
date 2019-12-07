<?php

namespace app\middleware;

use think\facade\Session;

class checkSystemLogin
{
    public function handle($request, \Closure $next)
    {
        if (!Session::has('system_admin'))
            return redirect('admin.login.create');
        return $next($request);
    }
}
