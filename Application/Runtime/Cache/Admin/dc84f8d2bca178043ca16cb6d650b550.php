<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/jquery.dialog.css" />
<link rel="stylesheet" href="/Public/Admin/css/index.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div id="container">
  <div id="hd">
    <div class="hd-wrap ue-clear">
      <div class="top-light"></div>
      <div class="login-info ue-clear">
        <div class="welcome ue-clear"><span>欢迎您,</span><a href="javascript:;" class="user-name"><?php echo (session('uname')); ?></a></div>
      </div>
      <div class="toolbar ue-clear">
        <a href="<?php echo U('Home/Main/index');?>" class="home-btn">首页</a>
        <a href="javascript:;" class="quit-btn exit"></a>
      </div>
    </div>
  </div>
  <div id="bd">
    <div class="wrap ue-clear">
      <div class="sidebar">
        <h2 class="sidebar-header">
          <p>功能导航</p>
        </h2>
        <ul class="nav">
          <li class="nav-info">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>分类管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="info-reg.html">分类列表</a></li>
              <li><a href="javascript:;" date-src="info-mgt.html">添加分类</a></li>
            </ul>
          </li>
          <li class="konwledge">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>图书管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Books/index');?>">图书列表</a></li>
            </ul>
          </li>

          <?php if($_SESSION['uroleid']== 1 ): ?><li class="agency">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>用户管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('User/index');?>">用户列表</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Admin/index');?>">管理员列表</a></li>
            </ul>
          </li>
          <li class="system">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>权限管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Role/index');?>">权限列表</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Role/add');?>">增加权限</a></li>
            </ul>
          </li><?php endif; ?>

        </ul>
      </div>
      <div class="content">

        <iframe src="/Admin/Main/home" id="iframe" width="100%" height="100%" frameborder="0"></iframe>

      </div>
    </div>
  </div>
  <div id="ft" class="ue-clear">
    <div class="ft-left"> <span>BookShare</span> <em>Admin&nbsp;System</em> </div>
    <div class="ft-right"> <span>Automation</span> <em>V2.0&nbsp;2016</em> </div>
  </div>
</div>
<div class="exitDialog">
  <div class="dialog-content">
    <div class="ui-dialog-icon"></div>
    <div class="ui-dialog-text">
      <p class="dialog-content">你确定要退出系统？</p>
      <p class="tips">如果是请点击“确定”，否则点“取消”</p>
      <div class="buttons">
        <input type="button" class="button long2 ok" value="确定" />
        <input type="button" class="button long2 normal" value="取消" />
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.dialog.js"></script>
<script type="text/javascript" src="/Public/Admin/js/index.js"></script>
</html>
<script>
  $('.exitDialog input[type=button]').click(function(e) {
    $('.exitDialog').Dialog('close');

    if($(this).hasClass('ok')){
      window.location.href = "<?php echo U('Admin/Main/loginOut');?>"	;
    }
  });
  //提示窗口
  function getNotify(url){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange=function(){
      if(xhr.readyState==4){
        var name = xhr.responseText;
        if(name!=""){
          showNotification(name);
        }
      }
    }
    xhr.open('get',url);
    xhr.send(null);
  }
  function showNotification(name){
    window.Notification.permission="granted";
    /*alert(window.Notification.permission);*/
    if(window.Notification){
      if(window.Notification.permission=="granted"){
        var notification = new Notification('有新图书被上传！',{
          body:'书籍名称：'+name,
          /*icon:"图片路径，若不指定默认为favicon"*/
        })
        setTimeout(function(){notification.close();},5000);
      }else{
        window.Notification.requestPermission();
      }
    }else alert("你的浏览器不支持此消息提醒功能，请使用chrome内核的浏览器！");
  };
  window.onload=function(){
    setInterval("getNotify('/Admin/Main/checkNotify')",3000);
  }
</script>