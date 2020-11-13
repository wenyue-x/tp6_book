<?php


namespace app\admin\controller;


use think\facade\Request;
use think\facade\View;
use app\common\model\Book as BookModel;

class Books extends AdminBase
{
    public function index(Request $request){

        $data = Request::param();
        if (!$data){
            $data['bookCategory'] = 1;
        }
        $category = $data['bookCategory'];
//        return $category;
        $res = BookModel::where('book_category',$category)->select();
        $list = $res->toArray();

        return View::fetch('showBooks',[
            'list'  =>  $list
        ]);

    }


}