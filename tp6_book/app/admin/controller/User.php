<?php


namespace app\admin\controller;


use app\common\model\Book;
use app\common\model\Borrowingbook;
use think\facade\Request;
use think\facade\View;
use app\common\model\User as UserModel;

class User extends AdminBase
{
    public function index(){
        $data = UserModel::field('user_id,user_name,user_email')->paginate(10);
        $list = $data->toArray();
        $list['render'] = $data->render();

      //  halt($list);
        return View::fetch('showUsers',[
            'list'  =>  $list
        ]);
    }
    public function user(){
        return View::fetch('addUser');
    }
    public function userAdd(Request $request){
        $data = Request::param();
        $arr = [
            'user_name' =>  $data['userName'],
            'user_pwd'  =>  $data['userPwd'],
            'user_email'    =>  $data['userEmail']
        ];
        $obj = new UserModel();
        $res = $obj->save($arr);
        if ($res){
            return show(config('status.success'));
        }
        return show(config('status.error'));
    }
    public function borrow(){

     //   $data = (new Borrowingbook())->paginate()->toArray();
     //   halt($data);
        $data = Borrowingbook::select()->toArray();

        for ($i = 0;$i < count($data);$i++){
            $data[$i]['user_id'] = (UserModel::where('user_id',$data[$i]['user_id'])->find()->toArray())['user_name'];
            $data[$i]['book_id'] = (Book::where('book_id',$data[$i]['book_id'])->find()->toArray())['book_name'];
        }


        return View::fetch('borrowingBook',[
            'data'  =>  $data
        ]);
    }

}