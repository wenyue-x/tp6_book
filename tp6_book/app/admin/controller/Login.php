<?php


namespace app\admin\controller;


use think\facade\Request;
use think\facade\Validate;
use think\facade\View;
use app\common\model\Admin;

class Login extends AdminBase
{
    public function initialize()
    {
        if ($this->isLogin()){
            return $this->redirect(url('/admin/index'));
        }
    }

    public function index(){
        return View::fetch('index');

    }
    public function check(Request $request)
    {

        $data = Request::param();
        $pwd = Admin::where('admin_name', $data['adminName'])->select()->toArray();
        $password = $pwd[0]['admin_pwd'];
        if ($data['password'] == $password) {
            session(config('admin.session_admin'), $data);
            return show(config('status.success'), '登陆成功');
        } else {
            return show(config('status.error'), '用户名或密码不正确');
        }




    }

}