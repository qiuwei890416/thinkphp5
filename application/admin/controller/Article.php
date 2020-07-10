<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Article as Articles;
use app\admin\model\Category as Categorys;
use think\Request;
use app\admin\common\Common;
use think\response\Json;
use think\Loader;
class Article extends Common
{
    public function index(Request $request){

        $list = Articles::order('id', 'desc')
            ->where(function ($query) use($request){
                $art_title=$request->param('art_title');
                $art_status=$request->param('art_status');
                if(!empty($art_title)){
                    $query->where('art_title','like','%'.$art_title.'%');
                }
                if(!empty($art_status)){
                    $query->where('art_status','=',$art_status);
                }
            })
            ->with('category')
            ->paginate($request->param('num')!=''?$request->param('num'):10,false,['query' =>$request->param()]);


        $this->assign('list',$list);

        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=Categorys::order('cate_order','asc')->select();
        $categorys = new Categorys();
        $list=$categorys->wuxianji($cate,$fid=0,$level=0);
        $this->assign('list',$list);
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( )
    {
        //验证器
        $validate = Loader::validate('Article');
        if(!$validate->scene('store')->check(input('post.'))){
            $data=array(
                'status'=>4,
                'message'=>$validate->getError()
            );
            return $data;
        }
        $map['art_title']=array('eq',input('art_title'));
        $map['cate_id']=array('eq',input('cate_id'));
        $result=Articles::where($map)->find();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'添加失败，相同分类下文章名不能相同'
            );
            return $data;

        }
        if(input('art_status')==1){
            $map1['art_status']=array('eq',1);
            $map1['cate_id']=array('eq',input('cate_id'));
            $res=Articles::where($map1)->find();
            if($res){
                $data=array(
                    'status'=>3,
                    'message'=>'添加失败，相同分类下只能有一篇推荐文章'
                );
                return $data;

            }
        }

//        $file = request()->file('thumb');
//        if($file){
//            $info = $file->validate(['size'=>104857600,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public'.DS.'uploads');
//            if($info){
//                $art_thumb= $info->getSaveName();
//            }else{
//                // 上传失败获取错误信息
//                $data=array(
//                    'status'=>3,
//                    'message'=>$file->getError()
//                );
//                return $data;
////                $this->error($file->getError());
//            }
//        }


        $input=input('post.');
        if(isset($input['del_thumb'])){
            foreach ($input['del_thumb'] as $key=>$val){
                if(file_exists(ROOT_PATH. 'public'.'/uploads/'.$val)){
                    unlink(ROOT_PATH. 'public'.'/uploads/'.$val);
                }
            }
            $keys = array_keys($input);
            $index = array_search('del_thumb', $keys);
            if($index !== FALSE){
                array_splice($input, $index, 1);
            }

        }
        $input['thumball']=implode(',',$input['thumball']);


        $input['art_time']=time();
        $res=Articles::create($input);

        if($res){
            $data=array(
                'status'=>0,
                'message'=>'添加成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'添加失败'
            );
        }
        return $data;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //事务
        DB::beginTransaction(); //开启事务

        try {
            // 校验值...

            DB::commit();//事务提交
            return redirect('admin/Article');
        } catch (\Exception $e) {
            DB::rollBack();//事务回滚
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Articles::find($id);
        if($data['thumball']!=''){
            $data['thumball']=explode(',',$data['thumball']);
        }

        $cate=Categorys::order('cate_order','asc')->select();
        $categorys = new Categorys();
        $list=$categorys->wuxianji($cate,$fid=0,$level=0);
        $this->assign('list',$list);
        $this->assign('data',$data);
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(){

        //验证器
        $validate = Loader::validate('Article');
        if(!$validate->scene('update')->check(input('post.'))){
            $data=array(
                'status'=>4,
                'message'=>$validate->getError()
            );
            return $data;
        }


        $id=input('id');
        $map['art_title']=array('eq',input('art_title'));
        $map['cate_id']=array('eq',input('cate_id'));
        $map['id']=array('neq',$id);
        $result=Articles::where($map)->find();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'修改失败，相同分类下文章名不能相同'
            );
            return $data;

        }

        if(input('art_status')==1){
            $map1['art_status']=array('eq',input('art_status'));
            $map1['cate_id']=array('eq',input('cate_id'));
            $map1['id']=array('neq',$id);
            $res=Articles::where($map1)->find();
            if($res){
                $data=array(
                    'status'=>3,
                    'message'=>'修改失败，相同分类下只能有一篇推荐文章'
                );
                return $data;
            }
        }

        $art_thumb=input('art_thumb_old');
        $file = request()->file('thumb');
        if($file){
            $info = $file->validate(['size'=>104857600,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public' .DS.'uploads');
            if($info){
                $oldthumb=input('art_thumb_old');
                if($oldthumb!=''){
                    if(file_exists(ROOT_PATH. 'public'.'/uploads/'.$oldthumb)){
                        unlink(ROOT_PATH. 'public'.'/uploads/'.$oldthumb);
                    }
                }

                $art_thumb= $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                $data=array(
                    'status'=>4,
                    'message'=>$file->getError()
                );
                return $data;
//                $this->error($file->getError());

            }
        }
        $del_thumb=input('del_thumb/a');
        if(isset($del_thumb)){
            foreach ($del_thumb as $key=>$val){
                if(file_exists(ROOT_PATH. 'public'.'/uploads/'.$val)){
                    unlink(ROOT_PATH. 'public'.'/uploads/'.$val);
                }
            }
        }
        $thumball=input('thumball/a');
        if($thumball){
            $thumball=implode(',',$thumball);
        }else{
            $thumball='';
        }

        $neirong=array(
            'art_title'=>input('art_title'),
            'thumball'=>$thumball,
            'art_tag'=>input('art_tag'),
            'art_description'=>input('art_description'),
            'art_thumb'=>$art_thumb,
            'art_content'=>input('art_content'),
            'art_editor'=>input('art_editor'),
            'cate_id'=>input('cate_id'),
            'art_status'=>input('art_status'),
        );

        $res=Articles::where('id', $id)->update($neirong);
        if($res){
            $data=array(
                'status'=>0,
                'message'=>'修改成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'修改失败或没有修改'
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Articles::find($id);
        if($data['art_thumb']!=''){
            if(file_exists('./uploads/'.$data['art_thumb'])){
                unlink('./uploads/'.$data['art_thumb']);
            }
        }
        if($data['thumball']!=''){
            $arr=explode(',',$data['thumball']);
            foreach ($arr as $key=>$val){
                if(file_exists('./uploads/'.$val)){
                    unlink('./uploads/'.$val);
                }
            }

        }

        $res=$data->delete();
        if($res){
            $data=array(
                'status'=>0,
                'message'=>'删除成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'删除失败'
            );
        }

        return $data;
    }
    public function delall(){
        $ids=json_decode(input('ids'),true);
        $map['id']=array('in',$ids);
        $list=Articles::where($map)->column('art_thumb');
        $listduo=Articles::where($map)->column('thumball');
        $res=Articles::destroy($ids);
        if($res){
            foreach($list as $key=>$val){
                if($val!=''){
                    if(file_exists('./uploads/'.$val)){
                        unlink('./uploads/'.$val);
                    }
                }
            }
            foreach($listduo as $key=>$val){
                if($val!=''){
                    $arr=explode(',',$val);
                    foreach ($arr as $k=>$v){
                        if(file_exists('./uploads/'.$v)){
                            unlink('./uploads/'.$v);
                        }
                    }
                }
            }



            $data=array(
                'status'=>0,
                'message'=>'删除成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'删除失败'
            );
        }

        return $data;
    }
    public function upload(){
        $file=Request::instance()->file('file');
        $info=$file->move('upload');
        $data=array();
        if($info && $info->getPathname()){
            $data['status']=1;
            $data['message']="上传成功";
            $data['data']="/".$info->getPathname();
            echo json_encode($data);exit();
        }
        echo json_encode(['status'=>0,'message'=>'上传失败']);

    }

//商品图片上传
    public function ajax_uploads(){
        $file = request()->file('thumbduo');

        if($file){
            $info = $file->validate(['size'=>104857600,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public'.DS.'uploads');
            if($info){
                $code = 1;
                $thumb = $info->getSaveName();
                $msg='成功';
            }else{
                // 上传失败获取错误信息
                $code = 0;
                $msg = $file->getError();
            }
            $data = array(
                'code' => $code,
                'msg' => $msg,
                'thumb' =>$thumb
            );

        }else{
            $data = array(
                'code' => 0,
                'msg' => '没有文件',
                'thumb' => '',
            );

        }
        echo json_encode($data);
    }

}
