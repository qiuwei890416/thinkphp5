<?php
namespace app\admin\model;

use think\Model;

class User extends Model{
    protected $name = 'user';
    protected $pk = 'id';
    public function authgroup(){
        return $this->belongsToMany('Authgroup','Auth_group_access','group_id','uid');
    }




}