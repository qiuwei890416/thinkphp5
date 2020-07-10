<?php
namespace app\admin\controller;
use app\admin\model\Config as Configs;
use think\Request;
use app\admin\common\Common;
use think\Db;

class Config extends Common{

    public function index()
    {

        $list=Configs::select();

        foreach($list as $key=>$val){
            switch ($val['fiele_type']){
                case 'input';
                    $val['conf_contents']=' <input type="text" value="'.$val['conf_content'].'" name="conf_content[]" class="layui-input">';
                    break;
                case 'textarea';
                    $val['conf_contents']='<textarea name="conf_content[]"  class="layui-textarea">'.$val['conf_content'].'</textarea>';
                    break;
                case 'radio';
                    $str='';
                    $all=explode(',',$val['fiele_value']);

                    foreach($all as $k=>$v){
                        if($val['conf_content']==$v){
                            $str.='<input type="radio" name="conf_content[]" checked value="'.$v.'" title="'.$v.'">';
                        }else{
                            $str.='<input type="radio" name="conf_content[]" value="'.$v.'" title="'.$v.'">';

                        }

                    }

                    $val['conf_contents']=$str;

                    break;

                case 'select';
                    $str='';
                    $all=explode(',',$val['fiele_value']);
                    $str='<select name="conf_content[]" lay-verify="required">';
                    foreach($all as $k=>$v){
                        if($val['conf_content']==$v){
                            $str.='<option selected value="'.$v.'">'.$v.'</option>';
                        }else{
                            $str.='<option value="'.$v.'">'.$v.'</option>';

                        }

                    }
                    $str.= '</select>';
                    $val['conf_contents']=$str;

                    break;
            }
        }

        $this->assign('list',$list);
        return view();
    }


    public function create()
    {
        return view();
    }

    public function store()
    {
        $input=input('post.');
        if($input['fiele_value']){
            $input['fiele_value']=str_replace('，',',', $input['fiele_value']);
        }


        $res=Configs::create($input);

        if($res){
            $this->xieru();
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

    public function show($id)
    {
        //
    }


    public function edit()
    {
        $data=Configs::get(input('id'));
        $this->assign('data',$data);
        return view();
    }


    public function update(){
        $input=input('post.');
        if($input['fiele_value']){
            $input['fiele_value']=str_replace('，',',', $input['fiele_value']);
        }
       $res= Configs::where('id', input('id'))
            ->update($input);

       if($res){
            $this->xieru();
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


    public function destroy()
    {

        $data=Configs::get(input('id'));
        $res=$data->delete();
        if($res){
            $this->xieru();
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
    //批量修改
    public function editall()
    {

        //重新排序
        $i=0;
        $arr=array();
        foreach(input('conf_content/a') as $key=>$val){
            $arr[$i]=$val;
            $i++;
        }
        Db::startTrans();
        try{
            foreach (input('id/a') as $key=>$val){

                Configs::where('id',$val)->update(['conf_content' => $arr[$key]]);

            }
            // 提交事务

            Db::commit();
            $this->xieru();
            $tiao=10;
        } catch (\Exception $e) {

            // 回滚事务
            Db::rollback();

            $this->error($e->getMessage());
        }
      if($tiao==10){
       $this->redirect('index');
      }

    }
    public function xieru()
    {
        //基本数组
        $list=Configs::column('conf_content','conf_name');

        //把数组变字符串模式的数组
        $str='<?php return '.var_export($list,true).';';

        //将内容写入文件
        file_put_contents(extra.'\webconfig.php',$str);

    }


}
