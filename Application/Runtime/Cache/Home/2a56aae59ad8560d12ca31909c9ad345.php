<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户管理</title>
    <!-- Bootstrap -->
    <link href="/S56/ThinkPHP04/app/Public/Dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/S56/ThinkPHP04/app/Public/Js/jquery-2.1.4.min.js"></script>
    <script>
      $(function(){

        $('a[class*=danger]').click(function() {
            var $_this = $(this);
            $.get($_this.attr('href'),function(data) {
                if(data){
                  $_this.parent().parent().remove();
                }else{
                  alert('删除失败！');
                }
            });
            return false;
        })

      })
    </script>
  </head>
  <body>
    <div class="container">
      <h1>用户管理</h1>
      <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">我的用户</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(ACTION_NAME== index): ?>class="active"<?php endif; ?>><a href="<?php echo U(index);?>">列表页</a></li>
        <li <?php if(ACTION_NAME== add): ?>class="active"<?php endif; ?>><a href="<?php echo U(add);?>">添加页</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      <div class="row">
        <div class="col-sm-3">
          <h3>搜索部分</h3>
          <form class="form-inline" role="form" action=''>
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail2">Email address</label>
              <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter User" name='name' value="<?php echo ($name); ?>">
            </div>       
            <button type="submit" class="btn btn-default">搜索一下</button>
          </form>
        </div>
        <div class="col-sm-9">
          <table class="table table-striped">
            <tr class='info'>
              <th>ID</th>
              <th>姓名</th>
              <th>年龄</th>
              <th>性别</th>
              <th>班期</th>
              <th>操作</th>
            </tr>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["age"]); ?></td>
                <td><?php if($vo["sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                <td><?php echo ($vo["grade"]); ?></td>
                <td>
                    <a href="<?php echo U('del',array('id'=>$vo['id']));?>" class='btn btn-danger btn-sm'>删除</a>
                    <a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class='btn btn-primary btn-sm'>修改</a>
                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
              <td colspan=6>
                <?php echo ($page); ?>
              </td>
            </tr>
          </table>
        </div>
      </div>      
    </div>


    <script src="/S56/ThinkPHP04/app/Public/Dist/js/bootstrap.min.js"></script>
  </body>
</html>