<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:92:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/admin\view\authgroup\create.html";i:1592354991;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\style.html";i:1590719150;s:79:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\script.html";i:1590719150;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>添加文章</title>
        <meta name="renderer" content="webkit">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
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
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form" id="art_form" enctype="multipart/form-data">
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>角色名称</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="title" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>是否启用</label>
                        <div class="layui-input-inline">
                            <input type="checkbox" name="status"  lay-text="开启|停用"  checked="checked" lay-skin="switch">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            角色权限</label>
                        <div class="layui-input-inline" style="width: 80%">
                            <table class="layui-table" >
                                <?php if(is_array($auth) || $auth instanceof \think\Collection || $auth instanceof \think\Paginator): $i = 0; $__LIST__ = $auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <thead>
                                    <tr style="background: #bbbbbb;">
                                        <th>
                                            <input class="father" type="checkbox" name="rules[]" title="<?php echo $vo['title']; ?>" value="<?php echo $vo['id']; ?>" lay-skin="primary" lay-filter="father">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php if(is_array($vo['zi']) || $vo['zi'] instanceof \think\Collection || $vo['zi'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['zi'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                            <input class="child" name="rules[]"  title="<?php echo $v['title']; ?>" value="<?php echo $v['id']; ?>" lay-filter="child"  lay-skin="primary" type="checkbox">
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </table>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="add" lay-submit="">增加</button></div>
                </form>
            </div>
        </div>
        <script>
            layui.use(['form', 'layer','jquery',],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;
                form.on('checkbox(child)', function(data){
                    console.log(data);
                    if(data.elem.checked){
                        $(this).prop("checked", true);
                        $(this).parent().parent().parent().prev().find('.father').prop("checked", true);
                        form.render();
                    }else{
                        $(this).prop("checked", false);
                        var a=[];
                        var i=0;
                        $(data.elem).parent().find('input').each(function(){
                            if($(this).prop('checked')){
                                a[i]=1
                            }else{
                                a[i]=0
                            }
                            i++;
                        });
                        console.log(a);
                        var fan=0;
                        for(var i = 0;i<a.length;i++){
                            if(a[0]==a[i]&&a[0]==0){
                                fan=1;
                            }else{
                                fan=0;
                            }

                        }
                        if(fan==1){
                            $(this).parent().parent().parent().prev().find('.father').prop("checked", false);
                        }



                        form.render();
                    }
                });

                form.on('checkbox(father)', function(data){

                    if(data.elem.checked){
                        $(data.elem).parent().parent().parent().next().find('input').prop("checked", true);
                        form.render();
                    }else{
                        $(data.elem).parent().parent().parent().next().find('input').prop("checked", false);
                        form.render();
                    }
                });
                // //自定义验证规则
                // form.verify({
                //     nikename: function(value) {
                //         if (value.length < 5) {
                //             return '昵称至少得5个字符啊';
                //         }
                //     },
                //
                // });

                //监听提交
                form.on('submit(add)',
                function(data) {
                    console.log(data);
                    $.ajax({
                        url:"<?php echo url('Authgroup/store'); ?>",
                        type:'post',
                        timeout:"3000",
                        dataType : 'json',
                        cache:"false",
                        data:data.field,
                        success:function(data){
                            console.log(data);
                            if(data.status==0){
                                layer.alert(data.message, {
                                        icon: 6
                                    },
                                    function() {
                                        //关闭当前frame
                                        xadmin.close();

                                        // 可以对父窗口进行刷新
                                        xadmin.father_reload();
                                    });
                            }else{
                                layer.alert(data.message, {
                                        icon: 5
                                    },
                                    function(index) {
                                        layer.close(index);


                                    });
                            }



                        },
                        error:function(err){
                            console.log(err);
                        }
                    });

                    return false;
                });

            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>