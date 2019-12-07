<?php


use think\facade\Route;

// 登录
Route::get('login', 'login/create')->name('admin.login.create');
Route::get('getCaptcha', 'login/captcha')->name('admin.login.captcha');
Route::post('verify', 'login/verify')->name('admin.login.verify');
Route::get('logout', 'login/logout')->name('admin.logout');

Route::group('', function () {
    Route::get('index', 'index/index')->name('admin.index');
})->middleware('checkSystemLogin');