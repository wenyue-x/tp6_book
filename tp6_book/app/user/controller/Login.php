<?php


namespace app\user\controller;


use app\user\validate\User;
use app\common\model\User as UserModel;
use think\exception\ValidateException;
use think\facade\Request;
use think\facade\Validate;
use think\facade\View;


class Login extends UserBase
{
    public function initialize()
    {
        if ($this->isLogin()){
            return $this->redirect(url('/user/index'));
        }
    }


    public function index(){
        return View::fetch('index');
    }
    public function check(Request $request){
        $data = Request::param();
       // halt($data);
//        try {
//            $validate = Validate::rule([
//                'name'  =>  'unique:user,user_name^user_pwd'
//            ]);
//            $result = $validate->check([
//               'user_name'   =>  $data['userName'],
//               'user_pwd'   =>  $data['password']
//            ]);
//        }catch (ValidateException $e){
//            return show(config('status.error'),$e->getError());
//        }
//        if ($result){
//            return show(config('status.error'),'用户名或密码不正确');
//        }
//        return show(config('status.success'));

        $pwd = UserModel::where('user_name', $data['userName'])->select()->toArray();
        if (!$pwd){
            return show(config('status.error'),'用户名不存在');
        }
        $password = $pwd[0]['user_pwd'];
        if ($data['password'] == $password) {
            session(config('user.session_user'), $data);
            return show(config('status.success'), '登陆成功');
        } else {
            return show(config('status.error'), '用户名或密码不正确');
        }





    }

}