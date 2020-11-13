<?php


namespace app\common\model;


use think\Model;

class User extends Model
{

    public $key = 'user_id';
    protected $pk = 'user_id';

    public function roles(){
        return $this->belongsToMany(Book::class,Borrowingbook::class,'book_id','user_id');
    }



}