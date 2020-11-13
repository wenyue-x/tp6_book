<?php


namespace app\common\model;


use think\Model;
use think\model\Pivot;

class Borrowingbook extends Pivot
{

    //protected $autoWriteTimestamp = true;
    protected $pk = 'id';
    protected $name = 'borrowingbook';
    protected $table = 'book_borrowingbook';


}