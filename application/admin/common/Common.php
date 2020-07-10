<?php
namespace app\admin\common;
use app\admin\controller\Auth;
use think\Controller;
use think\Request;
use think\response\Json;

define('extra', CONF_PATH.'extra');
class  Common extends Controller{

    public function _initialize(){
        if(!session('uid','','admin')){
            $this->redirect('Login/login');
        }
        $auth=new Auth();
        $request = Request::instance();
        //放行路由
        $notcheck=array(
            'Index/index',
            'Index/welcome',
            'Index/outdenglu',
        );
        $luyou=$request->controller().'/'.$request->action();


        if(session('uid','','admin')!=1){
            if(!in_array($luyou,$notcheck)){
                if(!$auth->check($luyou,session('uid','','admin'))){
                    if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){

                        $data=array(
                            'status'=>3,
                            'message'=>'没有权限'
                        );
                        json($data)->send();
                        exit();

                    }else{
                        $this->redirect('Login/cuowu', ['err' => '没有权限']);
                    }
                }
            }

        }


    }

}