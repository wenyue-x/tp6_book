<?php


namespace app\user\controller;
use app\common\model\Book as BookModel;
use app\common\model\Borrowingbook;
use think\facade\Request;
use think\facade\View;
use app\common\model\User as UserModel;

class Borrow extends UserBase
{
    public function record(){
        $session = session(config('user.session_user'));

        $user = UserModel::where('user_name',$session['userName'])->find();
        $id = $user->toArray();
        $data = Borrowingbook::where('user_id',$id['user_id'])->select()->toArray();


        $books = $user->roles;
        $list = [];
        foreach ($books as $book){
            $list[] = $book->toArray();
        }
        for ($i=0;$i<count($data);$i++){
            //print_r($data[$i]['date']);
            $list[$i]['date'] = $data[$i]['date'];
            $list[$i]['date_end'] = $data[$i]['date_end'];
        }


        return View::fetch('borrowingBooksRecord',[
            'list'  =>  $list,
        ]);
    }

    public function index(){
        return View::fetch('borrowBooks');
    }
    public function borrow(Request $request){
        $data = Request::param();
        $session = session(config('user.session_user'));
        $user = UserModel::where('user_name',$session['userName'])->find();
        $userId = $user->toArray();
        $bookId = $data['bookId'];
        $res = BookModel::where('book_id',$bookId)->find();
        if (!$res){
            return show(config('status.error'),'此书不存在');
        }
        $time = date("Y-m-d",time());
        $data = [
            'user_id'   =>  $userId['user_id'],
            'book_id'   =>  $bookId,
        ];

        $result = Borrowingbook::find($data);
        if ($result){
            return show(config('status.error'),'你已经拥有此书');
        }
        $data['date'] =  $time;
        $data['date_end']   =   date("Y-m-d",strtotime("+2 year"));
        $save = (new Borrowingbook())->save($data);
        if ($save){
            return show(config('status.success'));
        }



    }


}