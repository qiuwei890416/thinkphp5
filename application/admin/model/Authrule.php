<?php
namespace app\admin\model;

use think\Model;

class Authrule extends Model{
    protected $name = 'auth_rule';
    protected $pk = 'id';
    //无限极分类
    public function wuxianji($data,$fid){
        static $array = array();
        foreach ($data as $k => $v) {
            if($fid == $v['pid']){
                $array[] = $v;
                $this->wuxianji($data,$v['id']);
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
            $map['pid']=array('eq',0);
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
            if($val['pid']==$id){
                $arr[]=$val['id'];
                $this->delzido($cates,$val['id']);
            }
        }
        return $arr;
    }
//相对category的关联一对多反向
//    public function category(){
//        return $this->belongsTo('Category','cate_id','id');
//    }


//模型事件在添加操作前执行
//    protected static function init(){
//        Article::event('before_insert', function ($input) {
//            $file = request()->file('thumb');
//            if($file){
//                $info = $file->validate(['size'=>104857600,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public'.DS.'uploads');
//                if($info){
//                    $input['art_thumb']= $info->getSaveName();
//                }else{
//                    // 上传失败获取错误信息
//                    $data=array(
//                        'status'=>3,
//                        'message'=>$file->getError()
//                    );
//                    return $data;
//        //                $this->error($file->getError());
//                }
//            }
//        });
//    }




}