<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/admin\view\login\login.html";i:1590997622;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\style.html";i:1590719150;s:79:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\script.html";i:1590719150;}*/ ?>
<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/static/Admin/css/font.css">
<link rel="stylesheet" href="/static/Admin/css/login.css">
<link rel="stylesheet" href="/static/Admin/css/xadmin.css">


    <script type="text/javascript" src="/static/Admin/js/jquery.min.js"></script>
<script src="/static/Admin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/static/Admin/js/xadmin.js"></script>

<!--[if lt IE 9]>
<script src="/static/Admin/js/html5.min.js"></script>
<script src="/static/Admin/js/respond.min.js"></script>
<![endif]-->


</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">后台管理系统</div>
        <div id="darkbannerwrap"></div>
        <form method="post" action="<?php echo url('dodenglu'); ?>" class="layui-form" >
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="code" style="width: 150px;float: left" lay-verify="required" placeholder="验证码"  type="text" class="layui-input">

            <img style="float: right" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()" id="code" alt="captcha"  src="<?php echo captcha_src(); ?>">
            <hr class="hr15">

            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>
    <script type="text/javascript">
        //自带验证码刷新
        function re_captcha() {
            $url = "{<?php echo url("","",true,false);?>}";
            $url = $url+"/"+Math.random();
            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
        }
    </script>
    <!-- 底部结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>