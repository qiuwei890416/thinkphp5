<?php
namespace app\home\model;

use think\Model;

class Category extends Model{
    protected $name = 'category';
    protected $pk = 'id';
//相对article的关联一对多
    public function article(){
        return $this->hasMany('Article','cate_id','id');
    }


    //获取该栏目下的子栏目和该栏目的ID
    public function delzi($id){
        $cates=$this->select();
        $arr= $this->delzido($cates,$id);
        $arr[]=$id;
        $cateids=implode(',',$arr);
        return $cateids;
    }
    //获取栏目下的子栏目ID
    public function delzido($cates,$id){
        static $arr=array();
        foreach ($cates as $key=>$val ){
            if($val['cate_pid']==$id){
             $arr[]=$val['id'];
             $this->delzido($cates,$val['id']);
            }
        }
        return $arr;
    }
//获取该栏目的上级栏目和本栏目
    public function shanglanmu($id){
        $cates=$this->field('id,cate_pid,cate_name')->select();
        $data=db('category')->where('id',$id)->field('id,cate_pid,cate_name')->find();
        if($data['cate_pid']!=0){
            $arr= $this->shanglanmus($cates,$data['cate_pid']);
        }

        $arr[]=$data;
        return $arr;
    }
    //获取栏目的上级栏目
    public function shanglanmus($cates,$pid){
        static $arr=array();
        foreach ($cates as $key=>$val ){
            if($val['id']==$pid){
                $arr[]=$val;
                $this->shanglanmus($cates,$val['cate_pid']);
            }
        }
        return $arr;
    }



}