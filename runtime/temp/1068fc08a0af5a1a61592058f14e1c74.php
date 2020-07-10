<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/admin\view\authgroup\index.html";i:1592466741;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\style.html";i:1590719150;s:79:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\script.html";i:1590719150;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>用户列表</title>
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
                            <form class="layui-form layui-col-space5" action="<?php echo url('index'); ?>" method="get">
                                <div class="layui-input-inline">
                                    <select name="num" lay-verify="">
                                        <option value="3" <?php if(input('num') == 3): ?> selected <?php endif; ?>>3</option>
                                        <option value="10" <?php if(input('num') == 10 ||input('num')==''): ?> selected <?php endif; ?>>10</option>
                                        <option value="50" <?php if(input('num') == 50): ?> selected <?php endif; ?>>50</option>
                                    </select>
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="title" value="<?php echo input('title'); ?>"  placeholder="请输入角色名" autocomplete="off" class="layui-input">
                                </div>
                                <span class="x-red"></span>是否启用：</label>
                                <div class="layui-input-inline">

                                    <select name="status" lay-verify="" >
                                        <option value="" <?php if(input('status') == ''): ?> selected <?php endif; ?>>请选择</option>
                                        <option value="1" <?php if(input('status') == '1'): ?> selected <?php endif; ?>>是</option>
                                        <option value="0" <?php if(input('status') == '0'): ?> selected <?php endif; ?>>否</option>

                                    </select>
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>

                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加角色','<?php echo url('Authgroup/create'); ?>',900,700)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                      <th>ID</th>
                                    <th>名称</th>
                                    <th>启用状态</th>
                                      <th>操作</th></tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

                                    <tr>
                                        <td>

                                            <input  type="checkbox" value="<?php echo $vo['id']; ?>" data-id="<?php echo $vo['id']; ?>"  lay-skin="primary">
                                        </td>
                                        <td><?php echo $vo['id']; ?></td>
                                        <td><?php echo $vo['title']; ?></td>

                                        <td>
                                            <?php if($vo['status'] == '1'): ?>
                                            <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                            <?php else: ?>
                                            <span class="layui-btn layui-btn-danger layui-btn-mini">已停用</span></td>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <?php if($vo['id'] != '1'): if($vo['status'] != '1'): ?>
                                                <a onclick="member_stop(this,<?php echo $vo['id']; ?>)" href="javascript:;"  title="启用">
                                                    <i class="layui-icon">&#xe62f;</i>
                                                </a>
                                                <?php else: ?>
                                                <a onclick="member_stop(this,<?php echo $vo['id']; ?>)" href="javascript:;"  title="停用">
                                                    <i class="layui-icon">&#xe601;</i>
                                                </a>
                                                <?php endif; ?>
                                                <a title="删除" onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;">
                                                    <i class="layui-icon">&#xe640;</i>
                                                </a>
                                            <?php endif; ?>

                                            <a title="编辑"  onclick="xadmin.open('编辑','<?php echo url('Authgroup/edit',array('id'=>$vo['id'])); ?>',900,700)" href="javascript:;">
                                                <i class="layui-icon">&#xe642;</i>
                                            </a>



                                        </td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <?php echo $list->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>

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
          layer.confirm('确认要修改状态吗？',function(index){

              if($(obj).attr('title')=='启用'){

                  $.post('<?php echo url("Authgroup/status"); ?>',{"id":id,"status":1},function (data) {
                      if(data.status==0){
                          $(obj).attr('title','停用')
                          $(obj).find('i').html('&#xe601;');
                          $(obj).parents("tr").find("td").find('span').removeClass('layui-btn-danger');
                          $(obj).parents("tr").find("td").find('span').addClass('layui-btn-normal').html('已启用');
                          layer.msg('已启用!',{icon: 6,time:3000});

                      }else{
                          layer.msg(data.message,{icon:5,time:3000});
                      }
                  })
              }else{

                  $.post('<?php echo url("Authgroup/status"); ?>',{"id":id,"status":0},function (data) {
                      if(data.status==0){
                          $(obj).attr('title','启用')
                          $(obj).find('i').html('&#xe62f;');
                          $(obj).parents("tr").find("td").find('span').removeClass('layui-btn-normal');
                          $(obj).parents("tr").find("td").find('span').addClass('layui-btn-danger').html('已停用');
                          layer.msg('已停用!',{icon: 6,time:3000});
                      }else{
                          layer.msg(data.message,{icon:5,time:3000});
                      }
                  })
              }
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post('<?php echo url("Authgroup/destroy"); ?>',{"id":id},function (data) {
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
        $('tbody input').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });
  console.log(ids);
      if(ids.length != 0){
          layer.confirm('确认要删除吗？'+ids.toString(),function(index){
              //捉到所有被选中的，发异步进行删除
              $.post('<?php echo url("Authgroup/delall"); ?>',{"ids":JSON.stringify(ids)},function (data) {
                  if(data.status==0){
                      layer.msg(data.message, {icon: 6});
                      $(".layui-form-checked").not('.header').parents('tr').remove();

                  }else{
                      layer.msg(data.message, {icon: 5});
                  }
              })

          });
      }else{
          layer.msg('请选择要删除的文章',{icon:5,time:1000});
      }

      }
    </script>
</html>