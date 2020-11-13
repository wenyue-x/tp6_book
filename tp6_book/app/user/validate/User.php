<?php


namespace app\user\validate;


use think\Validate;

class User extends Validate
{
    protected $role = [
        'name|用户名'  =>  'max:2'
    ];

}