<?php

// Authentication Routes...
$this->get('login', 'LoginController@showLoginForm')->name('login');
$this->post('login', 'LoginController@login');
$this->post('logout', 'LoginController@logout')->name('logout');

// Password Reset Routes...
$this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'ResetPasswordController@reset');

$this->group(['prefix' => 'dashboard'],function (){
    $this->group(['prefix' => 'users'], function (){
        $this->get('/','UserController@index')->name('admin.users');
        $this->get('/create','UserController@create')->name('admin.users.create');
        $this->post('/','UserController@store')->name('admin.users.store');
    });

    $this->group(['prefix' => 'roles'], function (){
        $this->get('/','RoleController@index')->name('admin.roles');
    });

    $this->group(['prefix' => 'permissions'], function (){
        $this->get('/','PermissionController@index')->name('admin.permissions');
    });
});