<?php


namespace app\common\model;


use think\Model;

class Category extends Model
{
    public function findCategory(){
        $category = $this->paginate(5);

        $result = $category->toArray();
        $result['render'] = $category->render();

        return $result;
    }
    public function findAllCategory(){
        $res = $this->select()->toArray();
    //    dump();
        return $res;
    }

}