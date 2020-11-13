<?php


namespace app\admin\controller;


use think\facade\Request;
use think\facade\View;
use app\common\model\Admin as AdminModel;

class Admin extends AdminBase
{
    public function index(){
        $session = session('adminUser');
        $admin = AdminModel::where('admin_name',$session['adminName'])->find();
        $list = $admin->toArray();
        return View::fetch('adminInfo',[
            'name'  =>  $list['admin_name'],
            'id'    =>  $list['admin_id'],
            'pwd'   =>  $list['admin_pwd'],
            'email' =>  $list['admin_email']
        ]);
    }
    public function update(Request $request){
        $data = Request::param();
        $arr = [
            'admin_pwd' =>  $data['adminPwd'],
            'admin_email'   =>  $data['adminEmail']
        ];
        $res = AdminModel::where('admin_name',$data['adminName'])->save($arr);

        if ($res){
            session(config('admin.session_admin'),$data);
            return show(config('status.success'));
        }
        return show(config('status.error'));

    }

}