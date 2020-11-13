<?php


namespace app\admin\controller;

use app\common\model\Category;
use think\facade\Request;
use think\facade\View;

class Index extends AdminBase
{
    public function index(){
        return View::fetch('index');
    }

    public function addCategory(){
        $categoryObj = new Category();
        $catesorys = $categoryObj->findCategory();
      //  halt($catesorys);


        return View::fetch('addCategory',[
            'categorys' =>  $catesorys
        ]);
    }
    public function add(Request $request){
        $data = Request::param();
        $name = $data['categoryName'];
        $arr = [
            'category_name' => $name
        ];


        $sql = Category::where('category_name',$name)->find();
        if ($sql){
            return show(config('status.error'),'此分类已存在');
        }
        $categoryObj = new Category();
        try {
            $categoryObj->save($arr);
        }catch (\Exception $e){
            return show(config('status.error'),$e->getMessage());
        }
        return show(config('status.success'),$categoryObj->getLastInsID());


    }
    public function showAllCategory(){
        $categoryObj = new Category();
        return $categoryObj->findAllCategory();
    }

}