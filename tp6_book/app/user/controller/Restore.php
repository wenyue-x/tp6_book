<?php


namespace app\user\controller;

use app\admin\model\Borrowingbook;
use app\common\model\User as UserModel;
use think\facade\Request;
use think\facade\View;

class Restore extends UserBase
{
    public function index(){
        return View::fetch('returnBooks');

    }
    public function returnBook(Request $request){
        $data = Request::param();
        $session = session(config('user.session_user'));
        $user = UserModel::where('user_name',$session['userName'])->find();
        $userId = $user->toArray();
        $bookId = $data['bookId'];
        $data = [
            'user_id'   =>  $userId['user_id'],
            'book_id'   =>  $bookId,
        ];

        $result = Borrowingbook::where($data)->find();
    //    halt($result);
        if (!$result){
            return show(config('status.error'),'您没有这本书');
        }
        $res = (new Borrowingbook())->where($data)->delete();

        if ($res){
            return show(config('status.success'));
        }
        return show(config('status.error'),'还书失败');

    }

}