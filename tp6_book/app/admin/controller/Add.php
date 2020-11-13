<?php


namespace app\admin\controller;

use app\common\model\Book as BookModel;

use think\facade\Request;
use think\facade\View;

class Add extends AdminBase
{
    public function index(){
        return View::fetch('addBook');
    }
    public function addBook(Request $request){
        $data = Request::param();

        $arr = [
            'book_name' =>  $data['bookName'],
            'book_author'   =>  $data['bookAuthor'],
            'book_publish'  =>  $data['bookPublish'],
            'book_price'    =>  $data['bookPrice'],
            'book_introduction' =>  $data['bookIntroduction'],
            'book_category' =>  $data['bookCategory']
        ];
        $obj = new BookModel();

        $res = $obj->save($arr);
        if ($res){
            return show(config('status.success'));
        }
        return show(config('status.error'));





    }


}