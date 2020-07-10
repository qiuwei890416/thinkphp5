<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:88:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/home\view\index\imglist.html";i:1593589806;s:77:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\style.html";i:1592896114;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\script.html";i:1592896114;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\header.html";i:1593589766;s:77:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\foter.html";i:1592803712;}*/ ?>
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
<link rel="stylesheet" href="/static/Home/style/list.css" type="text/css" />
<link rel="stylesheet" href="/static/Home/style/article.css" type="text/css" />
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

</head>
<body id="list_style_2" class="list_style_2">
   <script>
 function subForm()
 {
     if($('#go').val()!=''){
         formsearch.submit();
     }
 //form1为form的id
 }
 </script>
<script type="text/javascript">
    function showMask() {
        $("#mask").css("height", $(document).height());
        $("#mask").css("width", $(document).width());
        $("#mask").show();
    }  
</script>
   <script type="text/javascript">
       function imgerrorfun(){
           var img=event.srcElement;
           img.src="/static/Home/images/345.jpg";
           img.onerror=null;
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
                        <input type="text" name="art_title" style="background-color: #000000;padding-left: 10px; font-size: 12px;font-family: 'Microsoft Yahei'; color: #999999;height: 29px; width: 160px; border: solid 1px #666666; line-height: 28px;" id="go" value="<?php echo input('art_title'); ?>" onfocus="if(this.value=='在这里搜索...'){this.value='';}"  onblur="if(this.value==''){this.value='在这里搜索...';}" />
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
    <style type="text/css">
        body
        {
            background-image: none;
            background-color: #dedede;
            color: #999999;
            font-family: "Microsoft Yahei" , "Helvetica Neue" ,Arial,Helvetica,sans-serif;
            font-size: 12px;
            height: 100%;
            text-align: left;
            width: 100%;
        }
        #xh_container
        {
            min-height: 1000px;
            background-color: #dedede;
            margin-top: 36px;
            width: 1098px;
        }
        #wrapper
        {
            background-color: #dedede;
        }
        #l-nav
        {
            background-image: url('/blog4./style/simg/look-bike-nav-bg.png');
            width: 188px;
            height: 360px;
            float: left;
        }
        #l-nav a
        {
            font-size: 14px;
            color: #000000;
        }
        #l-nav a:hover
        {
            font-size: 14px;
            color: #999999;
        }
        #l-nav div
        {
            padding-left: 20px;
        }
        #l-nav .l-nav-word
        {
            height: 40px;
            line-height: 40px;
        }
        #l-focus
        {
            float: right;
        }
        img
        {
            vertical-align: middle;
        }
        
        div
        {
            color: #666666;
        }
        #menu-item-196 a.a,#menu-item-198 a.a,#menu-item-197 a.a{color: #00BBEE;}
        #menu-item-198{ background-image:url('./images/up-arrow.png'); background-position: center bottom; background-repeat:no-repeat;} 
        .boxBor{
    position:absolute;left:0;top:0;display:none;z-index:9999; background-color:#ffffff;opacity: 0.3;filter:alpha(opacity=30)
}

    </style>
    <div id="xh_container">

        
<div class="xh_265x265x00">
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div style="float: left; width: 343px; height: 293px; background-color: #ffffff;border: solid 1px #ccc; margin-left: 15px;margin-top: 15px;">
                <div style="background-color: #cccccc; width: 313px; height: 188px; margin-top: 16px;
                    margin-left: 14px;">
                    <a target="_blank" href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>"><img src="/uploads/<?php echo $vo['art_thumb']; ?>" onerror="imgerrorfun()" alt="<?php echo $vo['art_title']; ?>" height="188" width="313"></a>
                </div>
                <div style="margin-left: 14px; line-height: 25px; margin-top: 10px;">
                    <div style="font-size: 12px;color:#cccccc;"><?php echo date('Y年m月s日',$vo['art_time']); ?></div>
                    <div style="font-size: 14px;height:45px;">
                       <a target="_blank" href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>"><?php echo $vo['art_title']; ?></a></div>
                    
                </div>
            </div>

    <?php endforeach; endif; else: echo "" ;endif; ?>
        
    <div style="clear: both;">
    </div>
                <div id="pagination">
                    <div class="wp-pagenavi">
                        <?php echo $list->render(); ?>
                    </div>
                </div>
</div>

        


    </div>
    <script type="text/javascript">
        $("#menu-item-198").find("a").addClass("a");
        $(".i-prev").hover(function () { $(this).addClass("i-prev-o"); }, function () { $(this).removeClass("i-prev-o"); });
        $(".i-next").hover(function () { $(this).addClass("i-next-o"); }, function () { $(this).removeClass("i-next-o"); });
        $(".more0").hover(function () { $(this).attr("src", "./style/simg/more-o.png"); }, function () { $(this).attr("src", "./style/simg/more.png"); });
    </script>
    <div class="boxBor"></div>
    
    <input type="hidden" id="hdBoxbor" />
    <div class="boxBor" onclick="IBoxBor()" style="cursor:pointer;"></div>


    </div>
<script type="text/javascript">
        $(function () {
            var imgHoverSetTimeOut = null;
            $('.xh_265x265x00 img').hover(function () {
                var oPosition = $(this).offset();
                var oThis = $(this);
                $(".boxBor").css({
                    left: oPosition.left,
                    top: oPosition.top,
                    width: oThis.width(),
                    height: oThis.height()
                });
                $(".boxBor").show();
                var urlText = $(this).parent().attr("href");
                $("#hdBoxbor").val(urlText);
            }, function () {
                imgHoverSetTimeOut = setTimeout(function () { $(".boxBor").hide(); }, 500);
            });
            $(".boxBor").hover(
                function () {
                    clearTimeout(imgHoverSetTimeOut);
                }
                , function () {
                    $(".boxBor").hide();
                }
            );
        });
        function IBoxBor() {
            window.open($("#hdBoxbor").val());
        }
        function goanewurl() {
            window.open($("#hdUrlFocus").val());
        }
</script>

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
