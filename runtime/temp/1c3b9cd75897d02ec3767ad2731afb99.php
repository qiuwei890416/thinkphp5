<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/admin\view\category\index.html";i:1592809240;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\style.html";i:1590719150;s:79:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\script.html";i:1590719150;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>用户列表</title>
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


    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form  action="<?php echo url('expUser'); ?>" method="post" style="float: left;margin-right: 20px;">
                                <button class="layui-btn" type="submit" ><i class="layui-icon"></i>正常导出</button>

                            </form>
                            <form  action="<?php echo url('expUser1'); ?>" method="post">
                                <button class="layui-btn" type="submit" ><i class="layui-icon"></i>大数据导出</button>

                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加分类','<?php echo url('Category/create'); ?>',600,400)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>
                                    <th>分类名</th>
                                      <th>分类别名</th>
                                      <th>排序</th>
                                      <th>类型</th>
                                    <th>操作</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                        <td>
                                            <input  class="did" type="checkbox" value="<?php echo $vo['id']; ?>" data-id="<?php echo $vo['id']; ?>"  lay-skin="primary">
                                        </td>
                                        <td><?php echo $vo['id']; ?></td>
                                        <td><?php  echo str_repeat('|----',$vo['level']) ?><?php echo $vo['cate_name']; ?></td>
                                        <td><?php echo $vo['cate_title']; ?></td>
                                        <td>
                                            <span style="float: left;margin-top: 5px;"><?php  echo str_repeat('|----',$vo['level']) ?></span><input onchange="paixu(this,<?php echo $vo['id']; ?>)" type="text" style="width: 50px;" name="cate_order" value="<?php echo $vo['cate_order']; ?>" data-id="<?php echo $vo['id']; ?>" required  lay-verify="required" autocomplete="off" class="layui-input paixu">
                                        </td>
                                        <td>
                                            <?php 
                                            if($vo['cate_type']=='1'){
                                                echo '文章列表';
                                            }else if($vo['cate_type']=='2'){
                                                echo '单页';
                                            }else if($vo['cate_type']=='3'){
                                                echo '图片列表';
                                            }
                                             ?>
                                        </td>
                                        <td>
                                            <a title="编辑"  onclick="xadmin.open('编辑','<?php echo url('Category/edit',array('id'=>$vo['id'])); ?>',600,400)" href="javascript:;">
                                                <i class="layui-icon">&#xe642;</i>
                                            </a>

                                            <a title="删除" onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;">
                                                <i class="layui-icon">&#xe640;</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
        function paixu(obj,id){
            var cate_order=$(obj).val();
            $.post('<?php echo url("Category/paixu"); ?>',{'id':id,'cate_order':cate_order},function (data) {
                if(data.status==0){
                    // $(obj).parents("tr").remove();
                    layer.msg(data.message,{icon:6,time:1000},function () {
                        location.reload();//刷新页面
                    });
                }else{
                    layer.msg(data.message,{icon:5,time:3000});
                }
            })
        }
        $(document).ready(function() {

        });
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;


        // 监听全选
        form.on('checkbox(checkall)', function(data){

          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        }); 
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });


      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要停用吗？',function(index){

              if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post('<?php echo url("Category/destroy"); ?>',{"id":id},function (data) {
                  if(data.status==0){
                      $(obj).parents("tr").remove();
                      layer.msg(data.message,{icon:6,time:1000});
                  }else{
                      layer.msg(data.message,{icon:5,time:3000});
                  }
              })
          });
      }



      function delAll (argument) {
        var ids = [];

        // 获取选中的id 
        $('.did').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });

        layer.confirm('确认要删除吗？'+ids.toString(),function(index){
            //捉到所有被选中的，发异步进行删除
            $.post('<?php echo url("Category/delall"); ?>',{"ids":JSON.stringify(ids)},function (data) {
                console.log(data);
                if(data.status==0){
                    layer.msg(data.message, {icon: 6});
                    $(".layui-form-checked").not('.header').parents('tr').remove();

                }else{
                    layer.msg(data.message, {icon: 5});
                }
            })

        });
      }
    </script>
</html>