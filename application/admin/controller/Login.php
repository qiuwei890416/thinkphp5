<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\User;
class Login extends Controller {

    public function login(){
        return view();
    }


    public function dodenglu(){
        $username = input('username');
        $password = md5(input('password'));
        $code = $_POST['code'];

        $map = array(
            'username'=>array('eq',$username),
            'password'=>array('eq',$password)
        );
        $result = User::where($map)->find();
        if($result){
            session('uid',$result['id'],'admin');
            session('username',$result['username'],'admin');
            if(!captcha_check($code)){
                $this->error("验证码错误",url('login'),3) ;
            }else{
                $this->redirect('Index/index');//成功

            };

        } else{
            $this->error('用户名密码错误',url('login'),3);
        }




    }
    public function outdenglu(){
        session(null,'admin');
        $this->redirect('login');

    }

    public function cuowu($err){
        $this->assign('err',$err);

        return view('Public/error');
    }
}