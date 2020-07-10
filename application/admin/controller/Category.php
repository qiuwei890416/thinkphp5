<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Category as Categorys;
use think\Request;
use app\admin\common\Common;
use think\response\Json;
use think\Db;
use app\admin\model\Article as Articles;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class Category extends Common
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
        $Categorys=new Categorys;
        $idarr=$Categorys->delzi($id);
//        if(count($idarr)!=0){
//            $this->shantu($idarr);
//
//        }

    }
    public function delfenleiall(){
       $ids=json_decode(input('ids'),true);
        $Categorys=new Categorys;
        $idarr=$Categorys->delziall($ids);


//        if(count($idarr)!=0){
//            $this->shantu($idarr);
//
//        }



    }
    //删除分类下的文章和图片
    public function shantu($idarr){
        Db::startTrans();
        try{
            foreach ($idarr as $key => $val) {
                $data_c = Categorys::get($val);
                $arr_id = $data_c->article()->column('id');
                $thumbs = $data_c->article()->column('art_thumb');
                if (count($arr_id) != 0) {
                    Articles::destroy($arr_id);
                    foreach ($thumbs as $k => $v) {
                        if ($v != '') {
                            if (file_exists('./uploads/' . $v)) {
                                unlink('./uploads/' . $v);
                            }
                        }
                    }
                }
            }
            Categorys::destroy($idarr);
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $data=array(
                'status'=>202,
                'message'=>$e->getMessage()
            );
            return $data;
        }

    }
    public function index(){

        $cate=Categorys::order('cate_order','asc')->select();
        $categorys = new Categorys();
        $list=$categorys->wuxianji($cate,$fid=0,$level=0);

        $this->assign('list',$list);
        return view();
    }
    public function create(){
        $cate=Categorys::order('cate_order','asc')->select();
        $categorys = new Categorys();
        $list=$categorys->wuxianji($cate,$fid=0,$level=0);
        $this->assign('list',$list);
        return view();
    }
    public function store(Request $request){
        $map['cate_name']=array('eq',input('cate_name'));
        $map['cate_pid']=array('eq',0);
        $result=Categorys::where($map)->find();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'添加失败，分类名已存在'
            );
            return $data;

        }

        $res=Categorys::create($request->param());

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
    public function edit($id)
    {
        $data=Categorys::get($id);
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
        $id=input('id');
        $data1=Categorys::get($id);
        $old_cate_pid=$data1['cate_pid'];
        if($old_cate_pid==0){
            if(input('cate_pid')!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'修改失败，顶级栏目层级不可改变'
                );
                return $data;
            }
        }
        $map['cate_name']=array('eq',input('cate_name'));
        $map['cate_pid']=array('eq',input('cate_pid'));
        $map['id']=array('neq',input('id'));
        $result=Categorys::where($map)->find();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'修改失败，分类名已存在'
            );
            return $data;

        }
        $res=Categorys::where('id',$id)->update([
            'cate_name'=>input('cate_name'),
            'cate_title'=>input('cate_title'),
            'cate_order'=>input('cate_order'),
            'cate_pid'=>input('cate_pid'),
            'cate_type'=>input('cate_type'),
        ]);

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
        $data1=Categorys::find($id);

        if($data1['cate_pid']==0){
            $res=Categorys::where('cate_pid',$id)->select();
            if(count($res)!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'删除失败，该栏目下存在子栏目'
                );
                return $data;
            }
        }

// 启动事务
        Db::startTrans();
        try{
            $data=Categorys::get($id);
            $arr_id=$data->article()->column('id');
            $thumbs=$data->article()->column('art_thumb');
            $data->delete();
            if(count($arr_id)!=0){
                Articles::destroy($arr_id);
                foreach ($thumbs as $key=>$val){
                    if($val!=''){
                        if(file_exists('./uploads/'.$val)){
                            unlink('./uploads/'.$val);
                        }
                    }
                }
            }
            // 提交事务
            Db::commit();
            $data=array(
                'status'=>0,
                'message'=>'删除成功'
            );
            return $data;
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $data=array(
                'status'=>400,
                'message'=>$e->getMessage()
            );
            return $data;
        }



    }
    public function delall(){
        $ids=json_decode(input('ids'),true);

//        $map['id']=array('in',$ids);
//        $map['cate_pid']=array('eq',0);
//        $ids=Categorys::where($map)->column('id');

        $map['id']=array('in',$ids);
        $list=Categorys::where($map)->select();

        foreach($list as $key=>$val){
            $res=Categorys::where('cate_pid',$val['id'])->select();
            if(count($res)!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'删除失败，要删除的栏目下存在子栏目'
                );
                return $data;
            }
        }



        Db::startTrans();
        try{
            foreach ($ids as $key=>$val){
                $data_c=Categorys::get($val);
                $arr_id=$data_c->article()->column('id');
                $thumbs=$data_c->article()->column('art_thumb');
                if(count($arr_id)!=0){
                    Articles::destroy($arr_id);
                    foreach ($thumbs as $k=>$v){
                        if($v!=''){
                            if(file_exists('./uploads/'.$v)){
                                unlink('./uploads/'.$v);
                            }
                        }
                    }
                }
            }
            Categorys::destroy($ids);

            // 提交事务
            Db::commit();
            $data=array(
                'status'=>0,
                'message'=>'删除成功'
            );
            return $data;
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $data=array(
                'status'=>400,
                'message'=>$e->getMessage()
            );
            return $data;
        }


    }
    public function paixu(){
        $id=input('id');
        $cate_order=input('cate_order');
        $res=Categorys::where('id',$id)->update(['cate_order'=>$cate_order]);


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
    // csv导出百万级数据，
    public function expUser1(){
        set_time_limit(0);
        $arrData=array();
        for($i=0;$i<=79;$i++){
            $list= db('Cwwp2019')->limit($i*10000,10000)->select();
            foreach ($list as $key=>$val) {
                $arrData[] = [
                    'id' => $val['M_NAME'],
                    'm_title' => $val['M_TITLE'],
                    'm_country' => $val['M_COUNTRY'],
                    'm_mail' => $val['M_MAIL'],
                    'm_agencies' => $val['M_AGENCIES'],
                    'm_session' => $val['M_SESSION'],
                    'meet_item' => $val['MEET_ITEM'],
                    'm_abs_title' => $val['M_ABS_TITLE'],
                    'input_admin' => $val['INPUT_ADMIN'],
                    'm_letter' => $val['M_LETTER'],
                    'm_reback' => $val['M_REBACK'],
                    'm_bark' => $val['M_BARK'],
                ];
            }
        }


        $title = [
            [
                '用户名',
                '头衔',
                '国家',
                '电子邮件',
                '机构',
                '专场',
                '参会项目',
                '邀请来源',
                '工号',
                '发送次数',
                '反馈',
                '备注',
            ],
        ];
        $arrData = array_merge($title, $arrData);

        header('Content-Description: File Transfer');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=test.csv');
        header('Cache-Control: max-age=0');


        $fp = fopen('php://output', 'a');//打开output流


        $dataNum = count( $arrData );
        $perSize = 1000;//每次导出的条数
        $pages = ceil($dataNum / $perSize);

        for ($i = 0; $i <= $pages-1; $i++) {
            foreach (array_slice($arrData,$i*1000,1000) as $item) {
                mb_convert_variables('GBK', 'UTF-8', $item);
                fputcsv($fp, $item);
            }
            //刷新输出缓冲到浏览器
            ob_flush();
            flush();//必须同时使用 ob_flush() 和flush() 函数来刷新输出缓冲。
        }
        fclose($fp);
        exit();



    }
    //正常导出
    public function expUser(){
        set_time_limit(0);
    $Cwwp2019=db('Cwwp2019');
    $list=$Cwwp2019->limit(100)->select();
    foreach ($list as $key=>$val){
        $data[] = [
            'id' => $val['M_NAME'],
            'm_title' => $val['M_TITLE'],
            'm_country' => $val['M_COUNTRY'],
            'm_mail' => $val['M_MAIL'],
            'm_agencies' => $val['M_AGENCIES'],
            'm_session' => $val['M_SESSION'],
            'meet_item' => $val['MEET_ITEM'],
            'm_abs_title' => $val['M_ABS_TITLE'],
            'input_admin' => $val['INPUT_ADMIN'],
            'm_letter' => $val['M_LETTER'],
            'm_reback' => $val['M_REBACK'],
            'm_bark' => $val['M_BARK'],
        ];
    }



        $title = [
            [
                '用户名',
                '头衔',
                '国家',
                '电子邮件',
                '机构',
                '专场',
                '参会项目',
                '邀请来源',
                '工号',
                '发送次数',
                '反馈',
                '备注',
            ],
        ];
        $arrData = array_merge($title, $data);
        $spreadsheet = new Spreadsheet();

// 设置单元格格式 可以省略
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:L1')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(25);
        $spreadsheet->getActiveSheet()->fromArray($arrData);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器输出07Excel文件
// header('Content-Type:application/vnd.ms-excel');//告诉浏览器将要输出Excel03版本文件
        header('Content-Disposition: attachment;filename=Cwwp2019.xlsx');//告诉浏览器输出浏览器名称
        header('Cache-Control: max-age=0');//禁止缓存
        $writer->save('php://output');


    }
}
