<?php
namespace app\home\common;
use app\home\model\Category;
use think\Controller;
define('extra', CONF_PATH.'extra');
class  Common extends Controller{

    public function _initialize(){
        //导航
       $this->daohang();
        //位置
        if(input('cateid')){
            $this->weizhi(input('cateid'));
        }
        if(input('id')){
            $cateid=db('article')->where('id',input('id'))->value('cate_id');
            $this->weizhi($cateid);
        }
    }
    public function weizhi($id){
        $category=new Category;
        $weizhi=$category->shanglanmu($id);
        $this->assign('weizhi',$weizhi);
    }

    public function daohang(){
        $list=db('category')->order('cate_order asc')->select();
        $arr=array();
        foreach($list as $key=>$val){
            if($val['cate_pid']==0){
                $arr[$key]=$val;
                $arr[$key]['arr']=array();
                foreach($list as $k=>$v){
                    if($val['id']==$v['cate_pid']){
                        $arr[$key]['arr'][]=$v;
                    }
                }
            }
        }
        $this->assign('arr',$arr);
    }

}