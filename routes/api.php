<?php

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::post('login',    'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'ResetPasswordController@reset');

    Route::post('user',     'AuthController@user');
    Route::post('refresh',  'AuthController@refresh');
    Route::post('logout',   'AuthController@logout');
});