<?php


namespace app\user\controller;


use think\facade\Request;
use think\facade\View;
use app\common\model\User as UserModel;

class User extends UserBase
{
    public function index(){
        $session = session(config('user.session_user'));
        $data = UserModel::where('user_name',$session['userName'])->find()->toArray();

        return View::fetch('userMessage',[
            'data'  =>  $data
        ]);
    }
    public function update(Request $request){
        $data = Request::param();

        $list = [
            'user_email' => $data['userEmail'],
            'user_pwd'  =>  $data['userPwd']
        ];
        $res = UserModel::where('user_name',$data['userName'])->update($list);
        if ($res){
            return show(config('status.success'));
        }
        return show(config('status.error'),'更新失败！');

    }

}