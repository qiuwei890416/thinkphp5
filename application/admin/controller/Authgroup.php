<?php
namespace app\admin\controller;
use app\admin\model\Article as Articles;
use app\admin\model\Category as Categorys;
use think\Request;
use app\admin\common\Common;
use app\admin\model\Authgroup as Authgroups;
use app\admin\model\Authrule;
use think\Loader;
//角色控制器
class Authgroup extends Common
{
    public function index(Request $request){


        $list = Authgroups::where(function ($query) use($request){
                $title=$request->param('title');
                $status=$request->param('status');
                if(!empty($title)){
                    $query->where('title','like','%'.$title.'%');
                }
                if($status!=''){

                    $query->where('status',$status);
                }
            })
            ->paginate($request->param('num')!=''?$request->param('num'):10,false,['query' =>$request->param()]);


        $this->assign('list',$list);

        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $auth_rule=db('auth_rule')->select();
        $auth_rule1=db('auth_rule')->where('pid',0)->select();
        $auth=array();
        foreach ($auth_rule1 as $key=>$val){
            $auth[$key]=$val;
            foreach ($auth_rule as $k=>$v){
                if($v['pid']==$val['id']){
                    $auth[$key]['zi'][]=$v;
                }
            }
        }

        $this->assign('auth',$auth);
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){
        $input=input('post.');

        $validate = Loader::validate('Authgroup');
        if(!$validate->check(input('post.'))){
            $data=array(
                'status'=>4,
                'message'=>$validate->getError()
            );
            return $data;
        }


        if(input('status')=='on'){

            $input['status']=1;
        }else{
            $input['status']=0;

        }
        $arr=input('rules/a');
        if($arr!=null){
            asort($arr);
            $input['rules']=implode(',',$arr);
        }else{
            $input['rules']='';
        }



        $res=Authgroups::create($input);

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
    public function edit()
    {
        $auth_rule=db('auth_rule')->select();
        $auth_rule1=db('auth_rule')->where('pid',0)->select();
        $auth=array();
        foreach ($auth_rule1 as $key=>$val){
            $auth[$key]=$val;
            foreach ($auth_rule as $k=>$v){
                if($v['pid']==$val['id']){
                    $auth[$key]['zi'][]=$v;
                }
            }
        }

        $this->assign('auth',$auth);
        $data=Authgroups::find(input('id'));
        $data['rules']=explode(',',$data['rules']);
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
        $input=input('post.');

        $validate = Loader::validate('Authgroup');
        if(!$validate->check(input('post.'))){
            $data=array(
                'status'=>4,
                'message'=>$validate->getError()
            );
            return $data;
        }




        if(input('status')=='on'){

            $input['status']=1;
        }else{
            $input['status']=0;
            $yan=db('auth_group_access')->where('group_id',input('id'))->select();
            if(count($yan)!=0){
                $data=array(
                    'status'=>5,
                    'message'=>'有用户正在使用此角色，不可禁用!!'
                );
                return $data;
            }
        }
        $arr=input('rules/a');
        if($arr!=null){
            asort($arr);
            $input['rules']=implode(',',$arr);
        }else{
            $input['rules']='';
        }




        $res=Authgroups::where('id',  input('id'))->update($input);
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
    public function destroy(){
        $data=Authgroups::find(input('id'));
        $res=$data->delete();
        if($res){
            db('auth_group_access')->where('group_id',input('id'))->delete();
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


        $res=Authgroups::destroy($ids);
        if($res){
            $map['group_id']=array('in',$ids);
            db('auth_group_access')->where($map)->delete();

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
    public function status(){
        $id=input('id');
        $yan=db('auth_group_access')->where('group_id',$id)->select();
        if(count($yan)!=0){
            $data=array(
                'status'=>5,
                'message'=>'有用户正在使用此角色，不可禁用!!'
            );
            return $data;
        }


        $res=Authgroups::where('id', $id)->update(['status'=>input('status')]);
        if($res){
            $data=array(
                'status'=>0,
                'message'=>'修改成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'修改失败'
            );
        }

        return $data;
    }
}
