<?php
namespace app\home\controller;
use app\home\common\Common;
use app\home\model\Article;
use app\home\model\Category;
use think\Request;

class Index extends Common
{

    public function index(){
        $list_xin=Article::with('category')->order('id desc')->limit(10)->select();
        $this->assign('list_xin',$list_xin);
        $article=new Article;
        $list=$article->hotarticle();
        $this->assign('list',$list);
        $list_tui=$article->articletui();
        $this->assign('list_tui',$list_tui);

        return view();
    }
    public function imglist(){
        $article=new Article;
        $list=$article->allarticles(input('cateid'));
        $this->assign('list',$list);
        return view();
    }
    public function artlist(){
        $article=new Article;
        $list=$article->allarticles(input('cateid'));
        $hotlist=$article->hotarticles(input('cateid'));
        $this->assign('list',$list);
        $this->assign('hotlist',$hotlist);


        return view();
    }
    public function article(){
        Article::where('id',input('id'))->setInc('art_view');
        $data= Article::get(input('id'));
        $article=new Article;
        $hotlist=$article->hotarticles($data['cate_id']);
        $this->assign('data',$data);
        $this->assign('hotlist',$hotlist);
        return view();
    }
    public function danye(){
      $data=  Article::where('cate_id',input('cateid'))->find();
        $this->assign('data',$data);
        return view('page');
    }
    public function sousuo(Request $request){
        $article=new Article;
        $list=$article->sousuoarticle(input('art_title'),$request->param());
        $this->assign('list',$list);
        $hotlist=$article->hotarticle();
        $this->assign('hotlist',$hotlist);
        return view();
    }
}
