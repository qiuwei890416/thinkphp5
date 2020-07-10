<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:86:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/home\view\index\index.html";i:1593589806;s:77:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\style.html";i:1592896114;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\script.html";i:1592896114;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\header.html";i:1593999269;s:77:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\home\view\Public\foter.html";i:1592803712;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<title><?php echo config('webconfig.web_title') ?></title>
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
<script type="text/javascript">
    function IFocuse(th, o) {
        var t = $(th);
        var c = t.attr("class");
        if (o) {
            t.removeClass(c).addClass(c+"-over");
        }
        else {
            t.removeClass(c).addClass(c.replace("-over",""));
        }
    }
</script>
</head>
<body class="xh_body">

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
     function imgerrorfun(){
         var img=event.srcElement;
         img.src="/static/Home/images/345.jpg";
         img.onerror=null;
     }
 </script>
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


<div id="xh_wrapper">
       
<input type="hidden" id="hdUrlFocus" />
    <div class="xh_h_show" style="height: 510px;">
        <div class="xh_h_show_in">
        <div id="zSlider">
            <div id="picshow">
    <div id="picshow_img">
        <ul>
            <?php if(is_array($list_tui) || $list_tui instanceof \think\Collection || $list_tui instanceof \think\Paginator): $i = 0; $__LIST__ = $list_tui;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li style="display: list-item;">
                <a href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" target="_blank">
                    <img onerror="imgerrorfun()" src="/uploads/<?php echo $vo['art_thumb']; ?>" alt="<?php echo $vo['art_title']; ?>">
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<div id="select_btn">
    <ul>
        <li class="current"></li><li class=""></li><li class=""></li><li class=""></li>
    </ul>
</div>
            <div class="focus-bg-title"><div id="focus-left" class="arrow-left" onmouseover="IFocuse(this,true)" onmouseout="IFocuse(this,false)"></div>
            <div id="focus-center" class="focus-title">
            <div style="float:left;width:586px;padding-left:10px;font-size:18px;" id="focus-tl-s"></div>
            <div style="float:right;width:200px;"></div>
            </div>
            <div id="focus-right" class="arrow-right"></div></div>
            </div>
            <div id="picshow_right">
      <a href="/life/416.html" target="_blank">
    <img src="/static/Home/images/1-140206160415Y6.jpg" alt="COACH再度携手王力宏 踩单车演" width="255px" height="420px"></a>
   
            <div id="picshow_right_cover" onclick="goanewurl()" style="cursor:pointer;position:absolute;top:495px;font-size:14px;width:255px;height:45px;line-height:45px;padding-left:42px;color:#ffffff;zoom:1;background-image:url(/static/Home/images/focus-left-bg.png); background-repeat:no-repeat; background-color:#01A1ED;"></div>
            </div>
        </div>
    </div>
    <div id="xh_container">
    <a name="new"></a>
        <div id="xh_content" style="padding-right:10px;">
            <div class="xh_area_h_3">
                <div class="xh_area_title">
                    <a href="javascript:" class="t">New 最近更新</a> <span class="r">
                    
                    <a href='/lookbike/fixed-gear/'>死飞车</a>
                    
                    <a href='/lookbike/vintagebicycle/'>复古骑行</a>
                    
                    <a href='/lookbike/roadbicycle/'>公路车</a>
                    
                    <a href='/lookbike/mountainbike/'>山地车</a>
                    
                    <a href='/lookbike/small/'>折叠/小径车</a>
                    
                    <a href='/lookbike/bmx/'>BMX</a>
                    
                    <a href='/lookbike/otherbike/'>城市车及其他</a>
                     </span>
                </div>
                <br>


                <?php if(is_array($list_xin) || $list_xin instanceof \think\Collection || $list_xin instanceof \think\Paginator): $i = 0; $__LIST__ = $list_xin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="xh_post_h_3 ofh">
                    <div class="xh_265x265">
                        <a target="_blank" href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" title="<?php echo $vo['art_title']; ?>">
                            <img src="/uploads/<?php echo $vo['art_thumb']; ?>" onerror="imgerrorfun()" alt="<?php echo $vo['art_title']; ?>" height="240" width="400">
                        </a>
                    </div>
                    <div class="r ofh">
                        <h2 class="xh_post_h_3_title ofh">
                            <a target="_blank" href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" title="<?php echo $vo['art_title']; ?>"><?php echo $vo['art_title']; ?></a>
                        </h2>
                        <span class="time"><?php echo date('Y-m-s h:i:s',$vo['art_time']); ?></span>
                        <div class="xh_post_h_3_entry ofh"><?php echo $vo['art_description']; ?></div>
                        <div class="b">
                            <span title="<?php echo $vo['art_love']; ?>人赞" class="xh_love"><span class="textcontainer"><span><?php echo $vo['art_love']; ?></span></span> <span class="bartext"></span></span> <span title="<?php echo $vo['art_view']; ?>人浏览" class="xh_views"><?php echo $vo['art_view']; ?></span>
                        </div>
                    </div>
                    <span class="cat">
                <a href="<?php echo url('Index/artlist',array('cateid'=>$vo['category']['id'])); ?>" title="查看<?php echo $vo['category']['cate_name']; ?> 中的全部文章" rel="category tag"><?php echo $vo['category']['cate_name']; ?>
                </a>
            </span>
                </div>

                <?php endforeach; endif; else: echo "" ;endif; ?>


            </div>
            <div id="pagination"><div class='wp-pagenavi'> <a href="/lookbike/" style='float:right;'><img src='/blog4./style/images/next01.png' id='next-page'></a></div></div>
        </div>
        <div id="xh_sidebar">

         <div class="widget">

<div style="background: url('/static/Home/images/hots_bg.png') no-repeat scroll 0 0 transparent;width:250px;height:52px;margin-bottom:15px;">
</div>
<ul id="ulHot">
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li style="border-bottom:dashed 1px #ccc;height:70px; margin-bottom:15px;">
        <div style="float:left;width:85px;height:55px; overflow:hidden;"><a href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" target="_blank"><img onerror="imgerrorfun()" src="/uploads/<?php echo $vo['art_thumb']; ?>" width="83" title="<?php echo $vo['art_title']; ?>" /></a></div>
        <div style="float:right;width:145px;height:52px; overflow:hidden;"><a href="<?php echo url('Index/article',array('id'=>$vo['id'])); ?>" target="_blank" title="<?php echo $vo['art_title']; ?>"><?php echo $vo['art_title']; ?></a></div>
        </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>

</ul>
                </div>
            
            <div class="widget portrait">
    <div>
        <div class="textwidget">
            <a href="/tougao.html"><img src="/static/Home/images/tg.jpg" alt="投稿"></a><br><br>
        </div>
    </div>
</div>
            <div class="widget links">
                <h3>
                    友情链接</h3>
                <ul>
                <li><a href='#' target='_blank'>链接1</a> </li>
                <li><a href='#' target='_blank'>链接2</a> </li>
                <li><a href='#' target='_blank'>链接3</a> </li>
                <li><a href='#' target='_blank'>链接4</a> </li>
                <li><a href='#' target='_blank'>链接5</a> </li>
                </ul>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="boxBor" onclick="IBoxBor()" style="cursor:pointer;"></div>
    <input type="hidden" id="hdBoxbor" />
    <script type="text/javascript">

        $("#next-page").hover(function () { $(this).attr("src", "./style/images/next02.png"); }, function () { $(this).attr("src", "./style/images/next01.png"); });
        $("#last-page").hover(function () { $(this).attr("src", "./style/images/last02.png"); }, function () { $(this).attr("src", "./style/images/last01.png"); });

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
<div class="sitemap">
    <h4>
        SITE MAP</h4>
    <div class="l">
        <ul id="menu-sitemap" class="menu">
<li class="menu-item menu-item-type-custom menu-item-object-custom">
                <a target="_blank" href="/lookbike/">单车分类</a>
                <ul class="sub-menu">
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/lookbike/fixed-gear/">死飞车</a></li>
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/lookbike/vintagebicycle/">复古骑行</a></li>
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/lookbike/roadbicycle/">公路车</a></li>
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/lookbike/mountainbike/">山地车</a></li>
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/lookbike/small/">折叠/小径车</a></li>
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/lookbike/bmx/">BMX</a></li>
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/lookbike/otherbike/">城市车及其他</a></li>
                
                </ul>
            </li><li class="menu-item menu-item-type-custom menu-item-object-custom">
                <a target="_blank" href="/gear/">骑行装备</a>
                <ul class="sub-menu">
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/gear/accessories/">车身装备</a></li>
                
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a target="_blank" href="/gear/rs/">人身装备</a></li>
                
                </ul>
            </li><li class="menu-item menu-item-type-custom menu-item-object-custom">
                <a target="_blank" href="/life/">单车生活</a>
                <ul class="sub-menu">
                
                </ul>
            </li><li class="menu-item menu-item-type-custom menu-item-object-custom">
                <a target="_blank" href="/news/">行业资讯</a>
                <ul class="sub-menu">
                
                </ul>
            </li>            

             <li class="menu-item menu-item-type-custom menu-item-object-custom">
                <a target="_blank" href="/aboutus.html">关于</a>
                <ul class="sub-menu">
                          <li class="menu-item menu-item-type-custom menu-item-object-custom">
                        <a target="_blank" href="#">关于我们</a></li>
                        
                </ul>
            </li>
      </ul>
    </div>
    <div class="r">
        <h5>
            FOLLOW US</h5>
        
                        <img src="/static/Home/images/weixin.jpg" alt="" title="扫描添加我们的公众微信" class="alignnone size-full wp-image-18966"
                            height="140" width="120"></a></div>
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
<html>
<script>
    // document.getElementById("life"+"").style.display="n"+"o"+"ne";
</script>