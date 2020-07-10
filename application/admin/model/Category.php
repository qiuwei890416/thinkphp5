<?php
namespace app\admin\model;

use think\Model;

class Category extends Model{
    protected $name = 'category';
    protected $pk = 'id';
//相对article的关联一对多
    public function article(){
        return $this->hasMany('Article','cate_id','id');
    }

    //无限极分类
    public function wuxianji($data,$fid,$level){
        static $array = array();
        foreach ($data as $k => $v) {
            if($fid == $v->cate_pid){
                $v->level = $level;
                $array[] = $v;
                $this->wuxianji($data,$v->id,$level+1);
            }
        }

        return $array;

    }
    //删除子栏目单
    public function delzi($id){
        $cates=$this->select();
        return $this->delzido($cates,$id);

    }
    //删除子栏目批量
    public function delziall($ids){
        $cates=$this->select();
        $idd=array();
        foreach ($ids as $k=>$v ){
            $map['id']=array('eq',$v);
            $map['cate_pid']=array('eq',0);
            $data=$this->where($map)->find();
            if($data){
                $idd=$this->delzido($cates,$v);
            }
        }
        return $idd;
    }
    //删除子栏目单
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



}