<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/admin\view\category\edit.html";i:1592808400;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\style.html";i:1590719150;s:79:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\script.html";i:1590719150;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
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
                <form class="layui-form">

                    <div class="layui-form-item">
                        <label class="layui-form-label">上级分类</label>
                        <div class="layui-input-inline">
                            <select name="cate_pid" lay-verify="required">
                                <option value="0">顶级分类</option>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['id'] == $data['cate_pid']): ?>
                                    <option selected value="<?php echo $vo['id']; ?>"><?php echo str_repeat('|----',$vo['level']) ?><?php echo $vo['cate_name']; ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo $vo['id']; ?>"><?php echo str_repeat('|----',$vo['level']) ?><?php echo $vo['cate_name']; ?></option>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>分类名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="cate_name" value="<?php echo $data['cate_name']; ?>" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>分类别名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="cate_title" value="<?php echo $data['cate_title']; ?>" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">类型</label>
                        <div class="layui-input-inline">
                            <select name="cate_type" lay-verify="required">
                                <option  <?php if($data['cate_type'] == '1'): ?>selected <?php endif; ?> value="1">文章列表</option>
                                <option <?php if($data['cate_type'] == '2'): ?>selected <?php endif; ?>  value="2">单页</option>
                                <option <?php if($data['cate_type'] == '3'): ?>selected <?php endif; ?> value="3">图片列表</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>排序</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="cate_order" value="<?php echo $data['cate_order']; ?>" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <input type="hidden"  name="id" value="<?php echo $data['id']; ?>" required=""  autocomplete="off" class="layui-input">

                     <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="edit" lay-submit="">修改</button>
                    </div>
                </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                // form.verify({
                //     nikename: function(value) {
                //         if (value.length < 5) {
                //             return '昵称至少得5个字符啊';
                //         }
                //     },
                //     pass: [/(.+){6,12}$/, '密码必须6到12位'],
                //     repass: function(value) {
                //         if ($('#L_pass').val() != $('#L_repass').val()) {
                //             return '两次密码不一致';
                //         }
                //     }
                // });

                //监听提交
                form.on('submit(edit)',
                function(data) {
                    console.log(data);
                    //发异步，把数据提交给php
                    $.ajax({
                        url:'<?php echo url("Category/update"); ?>',
                        type:'POST',
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