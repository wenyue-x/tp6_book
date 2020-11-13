<?php


namespace app\user\controller;


use think\facade\View;

class Index extends UserBase
{
    public function index(){
        return View::fetch('index');
    }

}