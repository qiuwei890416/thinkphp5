<?php
namespace app\admin\model;

use think\Model;

class Article extends Model{
    protected $name = 'article';
    protected $pk = 'id';
//相对category的关联一对多反向
    public function category(){
        return $this->belongsTo('Category','cate_id','id');
    }


//模型事件在添加操作前执行
    protected static function init(){
        Article::event('before_insert', function ($input) {
            $file = request()->file('thumb');
            if($file){
                $info = $file->validate(['size'=>104857600,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public'.DS.'uploads');
                if($info){
                    $input['art_thumb']= $info->getSaveName();
                }else{
                    // 上传失败获取错误信息
                    $data=array(
                        'status'=>3,
                        'message'=>$file->getError()
                    );
                    return $data;
        //                $this->error($file->getError());
                }
            }
        });
    }




}