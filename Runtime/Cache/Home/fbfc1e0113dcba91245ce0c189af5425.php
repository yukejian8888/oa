<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/myoa/Public/Home/css/base.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/info-reg.css" />
<title>移动办公自动化系统</title>
<style>
	.main p input {
		float:none;
	}
</style>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<div class="main">
<form action="<?php echo U('modify');?>" method="post">
	<input type="hidden" name="id" value="<?php echo ($dinfo["user_id"]); ?>" />
    <p class="short-input ue-clear">
    	<label>用户名：</label>
        <input type="text" name="name" value="<?php echo ($dinfo["user_name"]); ?>" />
    </p>
    <p class="short-input ue-clear">
    	<label>昵称：</label>
        <input type="text" name="nickname" value="<?php echo ($dinfo["user_nickname"]); ?>"/>
    </p>
    <p class="short-input ue-clear">
    	<label>密码：</label>
        <input type="text" name="password" value="<?php echo ($dinfo["user_password"]); ?>"/>
    </p>
    <p class="short-input ue-clear">
    	<label>性别：</label>
        <input type="radio" name="sex" value="<?php echo ($dinfo["user_sex"]); ?>" />男&nbsp;&nbsp;
		<input type="radio" name="sex" value="<?php echo ($dinfo["user_sex"]); ?>" />女
    </p>
    <p class="short-input ue-clear">
    	<label>生日：</label>
        <input type="text" name="birthday" value="<?php echo ($dinfo["user_birthday"]); ?>" />
    </p>
    <p class="short-input ue-clear">
    	<label>电话：</label>
        <input type="text" name="tel" value="<?php echo ($dinfo["user_tel"]); ?>" />
    </p>
    <p class="short-input ue-clear">
    	<label>email：</label>
        <input type="text" name="email" value="<?php echo ($dinfo["user_email"]); ?>" />
    </p>
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm">确定</a>
    <a href="javascript:;" class="clear">清空内容</a>
</div>
</body>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript">
$('.confirm').click(function(){
	$('form').submit();
})
//清空表单
$('.clear').click(function(){
	//获取当前页面中第一个表单对象
	$('form')[0].reset();
})
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});


showRemind('input[type=text], textarea','placeholder');
</script>
</html>