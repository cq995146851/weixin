<?php

use think\facade\Route;

Route::any('wechat', 'wechat/serve');

Route::get('wechat/menu', 'wechat/createMenu');
Route::get('wechat/del_menu', 'wechat/delMenu');

Route::get('index', 'index/index')->name('wap.index.index');
Route::get('my', 'my/index')->name('wap.my.index');