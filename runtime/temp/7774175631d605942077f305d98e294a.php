<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/admin\view\article\index.html";i:1591605650;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\style.html";i:1590719150;s:79:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\script.html";i:1590719150;}*/ ?>
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
                                    <input type="text" name="art_title" value="<?php echo input('art_title'); ?>"  placeholder="请输入文章名" autocomplete="off" class="layui-input">
                                </div>
                                <span class="x-red"></span>是否推荐：</label>
                                <div class="layui-input-inline">

                                    <select name="art_status" lay-verify="" >
                                        <option value="" <?php if(input('art_status') == ''): ?> selected <?php endif; ?>>请选择</option>
                                        <option value="1" <?php if(input('art_status') == '1'): ?> selected <?php endif; ?>>是</option>
                                        <option value="2" <?php if(input('art_status') == '2'): ?> selected <?php endif; ?>>否</option>

                                    </select>
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>

                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加文章','<?php echo url('Article/create'); ?>',900,700)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                      <th>ID</th>
                                    <th>所属栏目</th>
                                    <th>文章标题</th>
                                      <th>关键字</th>
                                      <th>发布时间</th>
                                      <th>作者</th>
                                      <th>浏览次数</th>
                                      <th>是否推荐</th>


                                    <th>操作</th></tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

                                    <tr>
                                        <td>

                                            <input  type="checkbox" value="<?php echo $vo['id']; ?>" data-id="<?php echo $vo['id']; ?>"  lay-skin="primary">
                                        </td>
                                        <td><?php echo $vo['id']; ?></td>
                                        <td><?php echo $vo['category']['cate_name']; ?></td>
                                        <td><?php 
                                            if(strlen($vo['art_title'])>10){
                                                echo mb_substr($vo['art_title'],0,10,'utf-8').'...';
                                            }else{
                                                echo $vo['art_title'];
                                            }
                                             ?>
                                        </td>
                                        <td><?php echo $vo['art_tag']; ?></td>
                                        <td><?php echo date( "Y-m-d H:i:s",$vo['art_time']) ?></td>
                                        <td><?php echo $vo['art_editor']; ?></td>
                                        <td><?php echo $vo['art_view']; ?></td>
                                        <td>
                                            <?php 
                                            if($vo['art_status']==1){
                                                echo '是';
                                            }
                                            if($vo['art_status']==2){
                                                echo '否';
                                            }
                                             ?>
                                        </td>
                                        <td>
                                            <a title="编辑"  onclick="xadmin.open('编辑','<?php echo url('Article/edit',array('id'=>$vo['id'])); ?>',900,700)" href="javascript:;">
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
              $.post('<?php echo url("Article/destroy"); ?>',{"id":id},function (data) {
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
              $.post('<?php echo url("Article/delall"); ?>',{"ids":JSON.stringify(ids)},function (data) {
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