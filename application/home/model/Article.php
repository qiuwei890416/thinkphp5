<?php
namespace app\home\model;

use think\Model;
use app\home\model\Category;
use think\Request;

class Article extends Model{
    protected $name = 'article';
    protected $pk = 'id';
//相对category的关联一对多反向
    public function category(){
        return $this->belongsTo('Category','cate_id','id');
    }
    //查询本栏目和子栏目的文章
    public function allarticles($cateid){
        $category=new Category;
       $cateids= $category->delzi($cateid);
        $map['cate_id']=array('in',$cateids);
        $list=Article::where($map)->order('art_time desc')->paginate(5);
        return $list;
    }
    //查询本栏目和子栏目的热门文章
    public function hotarticles($cateid){
        $category=new Category;
        $cateids= $category->delzi($cateid);
        $map['cate_id']=array('in',$cateids);
        $list=Article::where($map)->order('art_view desc')->limit(5)->select();
        return $list;
    }
    //热点文章
    public function hotarticle(){
        $list=Article::order('art_view desc')->limit(5)->select();
        return $list;
    }
    //文章推荐
    public function articletui(){
        $list=Article::where('art_status',1)->select();
        return $list;
    }
    //搜索页
    public function sousuoarticle($art_title,$sou){
        $list=Article::where('art_title','like','%'.$art_title.'%')->paginate(10,false,['query' =>$sou]);
        return $list;
    }

}