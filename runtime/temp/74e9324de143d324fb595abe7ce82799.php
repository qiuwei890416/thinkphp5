<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:87:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/home\view\index\sousuo.html";i:1593590155;s:77:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\style.html";i:1592896114;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\script.html";i:1592896114;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\header.html";i:1593590203;s:77:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\foter.html";i:1592803712;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo config('webconfig.web_title') ?></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
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
       

    <div id="xh_container">
        <div id="xh_content">

        <div class="path">
            搜索结果
        </div>
            <div class="clear"></div>
            <div class="xh_area_h_3" style="margin-top: 40px;">
                <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                    <div style="text-align: center;color: black;font-size: 30px;">没有数据</div>
                <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="xh_post_h_3 ofh">
                    <div class="xh">
                        <a target="_blank" href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" title="<?php echo $vo['art_title']; ?>">

                            <img src="/uploads/<?php echo $vo['art_thumb']; ?>" onerror="imgerrorfun()" alt="<?php echo $vo['art_title']; ?>" height="240" width="400">

                        </a>
                    </div>
                    <div class="r ofh">
                        <h2 class="xh_post_h_3_title ofh" style="height:60px;">
                            <a target="_blank" href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" title="<?php echo $vo['art_title']; ?>"><?php echo $vo['art_title']; ?></a>
                        </h2>
                        <span class="time"><?php echo date('Y-m-s',$vo['art_time']); ?></span>
                        <div class="xh_post_h_3_entry ofh" style="color:#555;height:80px; overflow:hidden;">
                            <?php echo $vo['art_description']; ?>
                        </div>
                        <div class="b">
                            <a href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" class="xh_readmore" rel="nofollow">read more</a> <span title="<?php echo $vo['art_love']; ?>人赞" class="xh_love"><span class="textcontainer"><span><?php echo $vo['art_love']; ?></span></span> </span> <span title="88人浏览" class="xh_views"><?php echo $vo['art_view']; ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div id="pagination">
                    <?php echo $list->render(); ?>
                </div>
                <?php endif; ?>


            </div>
        </div>
        <div id="xh_sidebar">        
<!-- 右侧 -->

         <div class="widget">

<div style="background: url('/static/Home/images/hots_bg.png') no-repeat scroll 0 0 transparent;width:250px;height:52px;margin-bottom:15px;">
</div>
<ul id="ulHot">
    <?php if(is_array($hotlist) || $hotlist instanceof \think\Collection || $hotlist instanceof \think\Paginator): $i = 0; $__LIST__ = $hotlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li style="border-bottom:dashed 1px #ccc;height:70px; margin-bottom:15px;">
        <div style="float:left;width:85px;height:55px; overflow:hidden;">
            <a href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" target="_blank">
                <img src="/uploads/<?php echo $vo['art_thumb']; ?>" onerror="imgerrorfun()" width="83" title="<?php echo $vo['art_title']; ?>" />
            </a>
        </div>
        <div style="float:right;width:145px;height:52px; overflow:hidden;"><a href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" target="_blank" title="<?php echo $vo['art_title']; ?>"><?php echo $vo['art_title']; ?></a></div>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
                </div>
            
            <div class="widget portrait">
    <div>
        <div class="textwidget">
            <a href="/tougao.html"><img src="/static/Home/images/tg.jpg" alt="鎶曠ǹ"></a><br><br>
<script type="text/javascript">BAIDU_CLB_fillSlot("870073");</script>
<script type="text/javascript">BAIDU_CLB_fillSlot("870080");</script>
<script type="text/javascript">BAIDU_CLB_fillSlot("870081");</script>
        </div>
    </div>
</div>

        </div>
        <div class="clear">
        </div>
    </div>
    <div class="boxBor"></div>

    <div class="boxBor" onclick="IBoxBor()" style="cursor:pointer;"></div>
    <script type="text/javascript">
        $(function () {
            var imgHoverSetTimeOut = null;
            $('.xh_265x265 img').hover(function () {
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
