<?php
namespace app\admin\controller;
use think\Loader;
use think\Request;
use app\admin\common\Common;
use app\admin\model\Authrule as Authrules;
use app\admin\model\Authgroup;
//权限控制器
class Authrule extends Common
{
    //前置方法 执行方法前执行的方法
    protected $beforeActionList = [
//        'first',
//        'second' =>  ['except'=>'hello'],//除了hello方法 以外都执行second方法
        'delfenlei'  =>  ['only'=>'destroy'],//单删
        'delfenleiall'  =>  ['only'=>'delall'],//批量删
    ];
    public function delfenlei(){
        $id=input('id');
        $Auth_rule=new Authrules;
        $idarr=$Auth_rule->delzi($id);


//        if(count($idarr)!=0){
//            $this->shantu($idarr);
//
//        }

    }
    public function delfenleiall(){
        $ids=json_decode(input('ids'),true);
        $Auth_rule=new Authrules;
        $idarr=$Auth_rule->delziall($ids);
//        dump($idarr);

//        if(count($idarr)!=0){
//            $this->shantu($idarr);
//
//        }



    }
    public function index(Request $request){
        $cate=Authrules::order('sort','asc')->select();
        $auth_rule = new Authrules();
        $list=$auth_rule->wuxianji($cate,$fid=0);



        $this->assign('list',$list);

        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cate=Authrules::order('sort','asc')->select();
        $auth_rule = new Authrules();
        $list=$auth_rule->wuxianji($cate,$fid=0);
        $this->assign('list',$list);
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){
        $validate = Loader::validate('Authrule');
        if(!$validate->check(input('post.'))){
            $data=array(
                'status'=>4,
                'message'=>$validate->getError()
            );
            return $data;
        }



        $input=input('post.');
        if(input('pid')!=0){
            $input['level']=Authrules::where('id',input('pid'))->value('level')+1;
        }

        $res=Authrules::create($input);

        if($res){
            $rule=Authgroup::where('id',1)->value('rules').','.$res->id;
            Authgroup::where('id',1)->update(['rules'=>$rule]);
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
    public function edit(){
        $cate=Authrules::order('sort','asc')->select();
        $auth_rule = new Authrules();
        $list=$auth_rule->wuxianji($cate,$fid=0);
        $this->assign('list',$list);
        $data=Authrules::find(input('id'));

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
        $validate = Loader::validate('Authrule');
        if(!$validate->check(input('post.'))){
            $data=array(
                'status'=>4,
                'message'=>$validate->getError()
            );
            return $data;
        }
        $input=input('post.');

        if(input('pid')!=0){
            $input['level']=Authrules::where('id',input('pid'))->value('level')+1;
        }



        $res=Authrules::where('id',  input('id'))->update($input);
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
    public function destroy()
    {
        $id=input('id');
        $data1=Authrules::find($id);
        if($data1['pid']==0){
            $res=Authrules::where('pid',$id)->select();
            if(count($res)!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'删除失败，该权限下存在子权限'
                );
                return $data;
            }
        }


        $data=Authrules::find(input('id'));
        $res=$data->delete();
        if($res){
            $authgroup=Authgroup::column('rules','id');
            foreach($authgroup as $key=>$val){
                if(strstr($val,input('id'))!=FALSE){
                    $rules=str_replace(','.input('id'),'',str_replace(input('id').',','',$val));
                    Authgroup::where('id',$key)->update(['rules'=>$rules]);
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
    public function delall(){
        $ids=json_decode(input('ids'),true);


        $map['id']=array('in',$ids);
        $list=Authrules::where($map)->select();

        foreach($list as $key=>$val){
            $res=Authrules::where('pid',$val['id'])->select();
            if(count($res)!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'删除失败，要删除的权限下存在子权限'
                );
                return $data;
            }
        }

        $res=Authrules::destroy($ids);
        if($res){

            foreach($ids as $k=>$v){
                $authgroup=Authgroup::column('rules','id');
                foreach($authgroup as $key=>$val){
                    if(strstr($val,$v)!=FALSE){
                        $rules=str_replace(','.$v,'',str_replace($v.',','',$val));
                        Authgroup::where('id',$key)->update(['rules'=>$rules]);
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
    public function status(){
        $id=input('id');
        $res=Authrules::where('id', $id)->update(['status'=>input('status')]);

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
    public function paixu(){
        $id=input('id');
        $sort=input('sort');
        $res=Authrules::where('id',$id)->update(['sort'=>$sort]);


        if($res){
            $data=array(
                'status'=>0,
                'message'=>'修改成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'排序修改失败'
            );
        }

        return $data;
    }
}
