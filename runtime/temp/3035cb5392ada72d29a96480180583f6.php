<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\public/../application/admin\view\config\index.html";i:1592185129;s:78:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\style.html";i:1590719150;s:79:"D:\PHPstudy\PHPTutorial\WWW\thinkphp5\application\admin\view\Public\script.html";i:1590719150;}*/ ?>
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
              <cite>导航元素<?php echo config('webconfig.web_title') ?></cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <button class="layui-btn" onclick="xadmin.open('添加配置','<?php echo url('Config/create'); ?>',900,700)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <form class="layui-form" method="post" action="<?php echo url('Config/editall'); ?>">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>标题</th>
                                      <th>名称</th>
                                      <th>内容</th>
                                      <th>操作</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                        <td><?php echo $vo['id']; ?></td>
                                        <td><?php echo $vo['conf_title']; ?></td>
                                        <td><?php echo $vo['conf_name']; ?></td>
                                        <td>
                                            <input type="hidden" name="id[]" value="<?php echo $vo->id; ?>">
                                            <?php echo $vo['conf_contents']; ?>
                                        </td>
                                        <td>
                                            <a title="编辑"  onclick="xadmin.open('编辑','<?php echo url('Config/edit',array('id'=>$vo['id'])); ?>',900,700)" href="javascript:;">
                                                <i class="layui-icon">&#xe642;</i>
                                            </a>

                                            <a title="删除" onclick="member_del(this,<?php echo $vo['id']; ?>)" href="javascript:;">
                                                <i class="layui-icon">&#xe640;</i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                             <tr>
                                 <td colspan="7">
                                     <button lay-submit="" class="layui-btn"><i class="layui-icon"></i>批量修改</button>

                                 </td>
                             </tr>

                                </tbody>

                            </table>
                            </form>
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
            $.post('/admin/Category/paixu',{"_token":"{{ csrf_token() }}",'id':id,'cate_order':cate_order},function (data) {
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


        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });


      });


      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post("<?php echo url('Config/destroy'); ?>",{"id":id},function (data) {
                  if(data.status==0){
                      $(obj).parents("tr").remove();
                      layer.msg(data.message,{icon:6,time:1000});
                  }else{
                      layer.msg(data.message,{icon:5,time:3000});
                  }
              })

          });
      }
    </script>
</html>