<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/admin\view\article\edit.html";i:1594198769;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\style.html";i:1590719150;s:79:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\script.html";i:1590719150;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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


        <script src="/static/up/js/vendor/jquery.ui.widget.js"></script>
        <script src="/static/up/js/jquery.iframe-transport.js"></script>
        <script src="/static/up/js/jquery.fileupload.js"></script>
        <script>
            $(document).ready(function() {
                $('#fileupload').fileupload({
                    url: "<?php echo url('Article/ajax_uploads'); ?>",
                    dataType: 'json',
                    done: function (e, data) {
                        console.log(data);
                        if(data.result.code==1){
                            $('#thumb_display').append('<span style="margin:5px;float: left;"><img src="/Uploads/'+data.result.thumb+'" height="60" width="60"><input type="hidden" name="thumball[]" value="'+data.result.thumb+'" ><br><input class="del_thumb layui-btn" style="width: 100%" type="button" value="删除" > </span>');
                        }else{
                            alert(data.result.msg);
                        }

                    }
                });

                $('#thumb_display').on('click','.del_thumb',function(){
                    var del_thumb = $(this).siblings('input').val();
                    $(this).parent('span').remove();

                    $('#del_thumb').append('<input type="hidden" name="del_thumb[]" value="'+del_thumb+'">');
                })
            });
        </script>
    </head>
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form"  id="art_form" enctype="multipart/form-data">

                    <div class="layui-form-item">
                        <label class="layui-form-label">文章分类</label>
                        <div class="layui-input-inline">
                            <select name="cate_id" lay-verify="required">
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['id'] == $data['cate_id']): ?>
                                    <option selected value="<?php echo $vo['id']; ?>"><?php echo str_repeat('|----',$vo['level']) ?><?php echo $vo['cate_name']; ?></option>
                                <?php else: ?>
                                    <option  value="<?php echo $vo['id']; ?>"><?php echo str_repeat('|----',$vo['level']) ?><?php echo $vo['cate_name']; ?></option>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>文章标题</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="art_title" value="<?php echo $data['art_title']; ?>" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>文章作者</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="art_editor" value="<?php echo $data['art_editor']; ?>" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">关键词</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="art_tag" value="<?php echo $data['art_tag']; ?>" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章描述</label>
                        <div class="layui-input-block">
                            <textarea style="width: 90%;" name="art_description"  placeholder="请输入内容" class="layui-textarea"><?php echo $data['art_description']; ?></textarea>
                        </div>
                    </div>
                    <?php if($data['art_thumb'] != ''): ?>
                    <div class="layui-form-item layui-form-text" id="tuxian" >
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            <img id="old" src="/uploads/<?php echo $data['art_thumb']; ?>" style="width: 90px;"/>
                            <img id="imgshow" src="" alt="" style="width: 90px;"/>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="layui-form-item layui-form-text" id="tuxian" style="display: none">
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            <img id="old" src="/uploads/<?php echo $data['art_thumb']; ?>" style="width: 90px;"/>
                            <img id="imgshow" src="" alt="" style="width: 90px;"/>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">缩略图</label>
                        <div class="layui-input-block layui-upload">
                            <input type="hidden" name="art_thumb_old" value="<?php echo $data['art_thumb']; ?>" class="hidden">
                            <button type="button" class="layui-btn" id="test1">
                                <i class="layui-icon">&#xe67c;</i>上传图片
                            </button>
                            <input id="filed" type="file" name="thumb" id="filed" style="display: none;" accept="image/*">
                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text zhanshi">
                        <label class="layui-form-label">多图上传</label>
                        <div class="layui-input-block layui-upload zst">
                            <button type="button" onclick="fileupload.click()" class="layui-btn xz">
                                <i class="layui-icon">&#xe67c;</i>多图上传
                            </button>
                            <div id="thumb_display" >
                                <?php if(is_array($data['thumball']) || $data['thumball'] instanceof \think\Collection || $data['thumball'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['thumball'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <span style="margin:5px;float: left;">
                                    <img src="/Uploads/<?php echo $vo; ?>" height="60" width="60">
                                    <input type="hidden" name="thumball[]" value="<?php echo $vo; ?>" >
                                    <br>
                                    <input class="del_thumb layui-btn" style="width: 100%" type="button" value="删除" >
                                </span>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div style="clear:both;"></div>
                            <input type="file" name="thumbduo" id="fileupload" multiple="multiple"  style="visibility:hidden; "  >
                            <div id="del_thumb"></div>
                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章内容</label>
                        <div class="layui-input-block">
                            <!-- 加载编辑器的容器 -->
                            <textarea id="content" style="width: 95%;height: 400px;" name="art_content" placeholder="请输入内容"><?php echo $data['art_content']; ?></textarea>
                            <!-- 配置文件 -->
                            <script type="text/javascript" src="/static/ueditor/ueditor.config.js"></script>
                            <!-- 编辑器源码文件 -->
                            <script type="text/javascript" src="/static/ueditor/ueditor.all.js"></script>
                            <script type="text/javascript" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('content',{
                                    allowDivTransToP: false
                                });

                            </script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否推荐</label>
                        <div class="layui-input-inline">

                            <?php if($data['art_status'] == '1'): ?>
                                <input type="radio" name="art_status" value="1" checked title="是">
                                <input type="radio" name="art_status" value="2" title="否" >
                            <?php else: ?>
                                <input type="radio" name="art_status" value="1"  title="是">
                                <input type="radio" name="art_status" value="2" title="否" checked >
                            <?php endif; ?>

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
        <script>layui.use(['form', 'layer','upload'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;
                var upload=layui.upload;
                $('#test1').on("click", function() {
                    $('#filed').trigger('click');
                    $('#filed').change(function(){
                        //获取input file的files文件数组;
                        //$('#filed')获取的是jQuery对象，.get(0)转为原生对象;
                        //这边默认只能选一个，但是存放形式仍然是数组，所以取第一个元素使用[0];
                        var file = $('#filed').get(0).files[0];
                        //创建用来读取此文件的对象
                        var reader = new FileReader();
                        //使用该对象读取file文件
                        reader.readAsDataURL(file);
                        //读取文件成功后执行的方法函数
                        reader.onload=function(e){
                            //读取成功后返回的一个参数e，整个的一个进度事件
                            console.log(e);
                            //选择所要显示图片的img，要赋值给img的src就是e中target下result里面
                            //的base64编码格式的地址
                            $('#imgshow').get(0).src = e.target.result;
                            $('#old').attr('style','display:none');
                            $('#tuxian').attr('style','display:block');
                        }
                    });
                });
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
                    var obj=this;
                    var formData=new FormData($('#art_form')[0]);
                    $.ajax({
                        url: "<?php echo url('Article/update'); ?>",
                        type: 'POST',
                        cache: false,
                        data: formData,
                        processData: false,    //不需要对数据做任何预处理
                        contentType: false,    //不设置数据格式
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
                                $(obj).off('change');
                            }else{
                                layer.alert(data.message, {
                                        icon: 5
                                    },
                                    function(index) {
                                        layer.close(index);
                                    });
                            }
                        },
                        error:function(XMLHttpRequest,textStatus,errorThrown){
                            var number=XMLHttpRequest.status;
                            var info="错误号"+number+"文件上传失败!";
                            alert(info);
                        },
                        async:true

                    });
                    // $.ajax({
                    //     url:"<?php echo url('Article/update'); ?>",
                    //     type:'Post',
                    //     timeout:"3000",
                    //     dataType : 'json',
                    //     cache:"false",
                    //     data:data.field,
                    //     success:function(data){
                    //         console.log(data);
                    //         if(data.status==0){
                    //             layer.alert(data.message, {
                    //                     icon: 6
                    //                 },
                    //                 function() {
                    //                     //关闭当前frame
                    //                     xadmin.close();
                    //
                    //                     // 可以对父窗口进行刷新
                    //                     xadmin.father_reload();
                    //                 });
                    //             $(obj).off('change');
                    //         }else{
                    //             layer.alert(data.message, {
                    //                     icon: 5
                    //                 },
                    //                 function(index) {
                    //                     layer.close(index);
                    //
                    //
                    //                 });
                    //         }
                    //
                    //
                    //
                    //     },
                    //     error:function(err){
                    //         console.log(err);
                    //     }
                    // });
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