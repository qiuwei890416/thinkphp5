<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\common\Common;
class Index extends Common
{
    public function index(){

        return view();
    }
    public function welcome(){
//$map['id']=array('in','1,2,3,4,5');
//       $res= db('user')->where($map)->field('id,username,password')->select();
//dump($res);
//        echo db('user')->getLastSql();
        return view();
    }
    public function outdenglu(){
        session(null,'admin');
        $this->redirect('Login/login');

    }
}
