<?php


namespace app\user\controller;


use think\facade\Request;
use think\facade\View;
use app\common\model\Book as BookModel;

class Book extends UserBase
{
    public function index(Request $request){

        $data = Request::param();
        if (!$data){
            $arr = BookModel::select();
            $list = $arr->toArray();
            return View::fetch('findBook',[
                'list'  =>  $list
            ]);

        }
        $name = $data['bookPartInfo'];
        $arr = BookModel::where('book_name','like','%'.$name.'%')->select();
        if (!$arr){
            return show(config('status.error'),'未查到相关信息！');
        }
        $list = $arr->toArray();

        return View::fetch('findBook',[
            'list'  =>  $list
        ]);
    }



}