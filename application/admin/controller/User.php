<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User as Users;
use think\Request;
use app\admin\common\Common;
use app\admin\model\Authgroup;

class User extends Common
{
    public function index(Request $request){

        $list = Users::where(function($query) use($request){
            $username=$request->param('username');
            if(!empty($username)){
                $query->where('username','like','%'.$username.'%');
            }
        })
        ->with('authgroup')
        ->paginate($request->param('num')!=''?$request->param('num'):10,false,['query' =>$request->param()]);


        $this->assign('list',$list);


        return view();
    }
    public function create(){
        $list=Authgroup::where('status','NEQ',0)->select();
        $this->assign('list',$list);
        return view();
    }
    public function store()
    {

        $username=input('username');
        $password=md5(input('password'));
        $result= Users::where('username',$username)->find();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'添加失败，用户名已存在'
            );
            return $data;

        }
        $res=Users::create([
            'username'  => $username,
            'password' =>  $password
        ]);
        if($res){
            if(input('group_id/a')){
                $garr=input('group_id/a');
                $data_a=array();
                foreach($garr as $key=>$val){
                    $data_a[]=array(
                        'uid' => $res->id,
                        'group_id' => $val,
                    );
                }
                db('auth_group_access')->insertAll($data_a);
            }
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
    public function edit($id){
        $list=Authgroup::where('status','NEQ',0)->select();
        $this->assign('list',$list);
        $data=Users::get($id);
        $list_g=db('auth_group_access')->where('uid',$id)->column('group_id');

        $this->assign('data',$data);
        $this->assign('list_g',$list_g);
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $data1=$result=Users::where('id',input('id'))->find();
        $oldrole_name=$data1['username'];
        if($oldrole_name!=input('username')){
            $result=Users::where('username',input('username'))->find();
            if($result){
                $data=array(
                    'status'=>2,
                    'message'=>'修改失败，用户名已存在'
                );
                return $data;
            }
        }
        $username=input('username');
        if(input('password')!=''){
            $password=md5(input('password'));
        }else{
            $password=$data1['password'];
        }

        $res= Users::where('id', input('id'))
            ->update([
                'username' =>$username,
                'password' =>$password,
            ]);

        //删除当前角色已有的权限
        db('auth_group_access')->where('uid',input('id'))->delete();
        //添加新的权限
        $arr_g=input('group_id/a');

        if(!empty($arr_g)){
            $data_g=array();
            foreach ($arr_g as $key=>$val){
                $data_g[]=array(
                    'uid'=>input('id'),
                    'group_id'=>$val,
                );
            }
            $res1=db('auth_group_access')->insertAll($data_g);

        }else{
            $res1=true;
        }

        if($res||$res1){

            $data=array(
                'status'=>0,
                'message'=>'修改成功'
            );
        }else if(!$res&&!$res1){
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
    public function destroy()
    {
        $yan=db('auth_group_access')->where('uid',input('id'))->find();
        if($yan){
            db('auth_group_access')->where('uid',input('id'))->delete();
        }
        $res=Users::where('id', input('id'))->delete();



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
        $map['uid']=array('in',$ids);
        $yan=db('auth_group_access')->where($map)->select();
        if(count($yan)!=0){
            db('auth_group_access')->where($map)->delete();
        }
        $res=Users::destroy($ids);
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
}
