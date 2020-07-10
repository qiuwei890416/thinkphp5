<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/home\view\index\zhifu.html";i:1593997663;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\script.html";i:1592896114;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\header.html";i:1593999269;s:77:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\foter.html";i:1592803712;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>童老师ThinkPHP5交流群：484519446</title>
<meta name="description" content="童老师ThinkPHP5交流群：484519446" />
<meta name="keywords" content="童老师ThinkPHP5交流群：484519446" />
    <link rel="stylesheet" href="/static/Home/style/bootstrap.css" type="text/css" />
    <link rel="stylesheet" type="text/css" media="all" href="/static/Home/style/style.css" />
    <link rel="stylesheet" href="/static/Home/style/pagenavi-css.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/static/Home/style/votestyles.css" type="text/css" />
    <link rel="stylesheet" href="/static/Home/style/voteitup.css" type="text/css" />
    <script type="text/javascript" src="/static/Home/style/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="/static/Home/style/jquery.js"></script>
<script src="/static/Home/style/jquery.error.js" type="text/javascript"></script>
<script src="/static/Home/style/jtemplates.js" type="text/javascript"></script>
<script src="/static/Home/style/jquery.form.js" type="text/javascript"></script>
<script src="/static/Home/style/lazy.js" type="text/javascript"></script>
<script type="text/javascript" src="/static/Home/style/wp-sns-share.js"></script>
<script type="text/javascript" src="/static/Home/style/voterajax.js"></script>
<script type="text/javascript" src="/static/Home/style/userregister.js"></script>
<script src="/static/Home/style/common.js" type="text/javascript"></script>
<script type="text/javascript" src="/static/Home/style/z700bike_global.js"></script>
<script type="text/javascript" src="/static/Home/style/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="/static/Home/style/dedeajax2.js"></script>
<script type="text/javascript" src="/static/Home/style/z700bike_single.js"></script>
<script type='text/javascript' src='/static/Home/style/jquery.colorbox-min.js?ver=1.3.17.2'></script>
    <script>
        function subForm()
        {
            if($('#go').val()!=''){
                formsearch.submit();
            }

            //form1为form的id
        }
    </script>
    <style type="text/css">
        #wrapper
        {
            background-color: #ffffff;
        }
        .single_entry{margin-top:30px;}
    </style>
</head>
<body class="single2">

<script type="text/javascript">
    function showMask() {
        $("#mask").css("height", $(document).height());
        $("#mask").css("width", $(document).width());
        $("#mask").show();
    }  
</script>
<div id="mask" class="mask" onclick="CloseMask()"></div>
<div id="header_wrap">
    <div id="header">
        <div style="float: left; width: 310px;">
            <h1>
                <a href="/" title="宽屏大气文章类--41天鹰模板">宽屏大气文章类--41天鹰模板</a>
                <div class="" id="logo-sub-class">
                </div>
            </h1>
        </div>
        <div id="navi">
            <ul id="jsddm">
                <li><a class="navi_home" href="<?php echo url('Index/zhifu'); ?>">支付</a></li>
                <li><a class="navi_home" href="/home">首页</a></li>
                <?php if(is_array($arr) || $arr instanceof \think\Collection || $arr instanceof \think\Paginator): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(count($vo['arr']) != 0): ?>
                    <li>
                        <?php if($vo['cate_type'] == '1'): ?>
                        <a href="<?php echo url('Index/artlist',array('cateid'=>$vo['id'])); ?>"><?php echo $vo['cate_title']; ?></a>
                        <?php elseif($vo['cate_type'] == '2'): ?>
                        <a href="<?php echo url('Index/danye',array('cateid'=>$vo['id'])); ?>"><?php echo $vo['cate_title']; ?></a>
                        <?php else: ?>
                        <a href="<?php echo url('Index/imglist',array('cateid'=>$vo['id'])); ?>"><?php echo $vo['cate_title']; ?></a>
                        <?php endif; ?>
                        <ul>
                            <?php if(is_array($vo['arr']) || $vo['arr'] instanceof \think\Collection || $vo['arr'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['arr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <li>
                                <?php if($v['cate_type'] == '1'): ?>
                                <a href="<?php echo url('Index/artlist',array('cateid'=>$v['id'])); ?>"><?php echo $v['cate_title']; ?></a>
                                <?php elseif($v['cate_type'] == '2'): ?>
                                <a href="<?php echo url('Index/danye',array('cateid'=>$v['id'])); ?>"><?php echo $v['cate_title']; ?></a>
                                <?php else: ?>
                                <a href="<?php echo url('Index/imglist',array('cateid'=>$v['id'])); ?>"><?php echo $v['cate_title']; ?></a>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li>
                        <?php if($vo['cate_type'] == '1'): ?>
                        <a href="<?php echo url('Index/artlist',array('cateid'=>$vo['id'])); ?>"><?php echo $vo['cate_title']; ?></a>
                        <?php elseif($vo['cate_type'] == '2'): ?>
                        <a href="<?php echo url('Index/danye',array('cateid'=>$vo['id'])); ?>"><?php echo $vo['cate_title']; ?></a>
                        <?php else: ?>
                        <a href="<?php echo url('Index/imglist',array('cateid'=>$vo['id'])); ?>"><?php echo $vo['cate_title']; ?></a>
                        <?php endif; ?>

                    </li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div style="clear: both;"></div>
        </div>
        <div style="float: right; width: 209px;">
            <div class="widget" style="height: 30px; padding-top: 20px;">
                <div style="float: left;">
                    <form  name="formsearch" action="<?php echo url('sousuo'); ?>">
                        <input type="hidden"  value="0" />
                        <input type="text" name="art_title" style="background-color: #000000;padding-left: 10px; font-size: 12px;font-family: 'Microsoft Yahei'; color: #999999;height: 29px; width: 160px; border: solid 1px #666666; line-height: 28px;" id="go" value="<?php echo input('art_title'); ?>" />
                    </form>
                </div>
                <div style="float: left;">
                    <img src="/static/Home/images/search-new.png" id="imgSearch" style="cursor: pointer; margin: 0px;
                        padding: 0px;"  onclick="subForm()"  />
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
</div>

</div>
    <div id="wrapper">
       
        <div class="single_entry page_entry">
            <div class="entry">
                <h2 style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-size: 22px; vertical-align: baseline; font-family: 'Microsoft Yahei', 'Trebuchet MS', Arial, Tahoma, Helvetica, sans-serif; line-height: 26px; color: rgb(51, 51, 51);">
                   微信支付</h2>

                <div class="clear">
                </div>
            </div>
    </div>

    </div>
<div id="footer_wrap">
    <div id="footer">
        <div class="footer_navi">
            <ul id="menu-%e5%b0%be%e9%83%a8%e5%af%bc%e8%88%aa" class="menu">
                <li id="menu-item-156" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-156">
                    <a href="/aboutus.html">关于我们</a></li>
                <li id="menu-item-157" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-157">
                    <a href="/news/">行业资讯</a></li>
                <li id="menu-item-158" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-158">
                    <a href="/tougao.html">我要投稿</a></li>
            </ul>
        </div>
        <div class="footer_info">
            <span class="legal">Copyright &#169; 2016-2020 qq群：484519446 版权所有&#160;&#160;&#160;<a href="#">
                琼ICP备******号</a>&#160;&#160;&#160;

        </div>
    </div>
</div>
<div style="display: none;" id="scroll">
</div>

</body>
</html>
