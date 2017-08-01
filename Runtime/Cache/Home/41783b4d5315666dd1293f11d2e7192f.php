<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/myoa/Public/Home/css/base.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/info-reg.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	select {
		background: rgba(0, 0, 0, 0) url("../images/inputbg.png") repeat-x scroll 0 0;
	    border: 1px solid #c5d6e0;
	    height: 28px;
	    outline: medium none;
	    padding: 0 10px;
	    width: 240px;
	}
	textarea {
		width:800px;
	}
	#tip {
		position:absolute;
		
		top:96px;
		left:114px;
		width:260px;
		height:auto;
		display:none;
		z-index:999;
		background:#fff;
		border:1px #C5D6E0 solid;
	}
	#tip div {
		padding:0 10px;
	}
</style>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="/thinkoa/index.php/Admin/Email/addOk" method="post" enctype='multipart/form-data'>
<div class="main">
	<p class="short-input ue-clear">
    	<label>收件人：</label>
        <input name="nickname" id='nickname' type="text" placeholder="收件人名称" autocomplete='off' />
		<div id='tip'></div>
    </p>
    <p class="short-input ue-clear">
    	<label>主题：</label>
        <input name="title" type="text" placeholder="邮件主题" />
    </p>
	<p class="short-input ue-clear">
    	<label>附件：</label>
        <input type="file" name="file" />
    </p>
    <p class="short-input ue-clear" style="float:left;">
    	<label>内容：</label>
    </p>
	<p style='width:900px; padding-left:0; float:left;'>
		<textarea name="content" id="content"></textarea>
	</p>
	<div style='clear:both;'></div>
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm" id='btnSubmit'>确定</a>
    <a href="javascript:;" class="clear" id='btnReset'>清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript">
$('#nickname').keyup(function(){
	var str = $(this).val();
	//alert($(this).val());//检测弹起事件效果
	var tip_obj = $('#tip');
	if(str.length > 0){
		var data = {'name':str};
		$.post('/myoa/index.php/Home/Email/getNames',data,function(msg){
		msg = JSON.parse(msg);
		if(msg.length > 0){
			tip_obj.empty();
			for(i = 0; i < msg.length; i++){
				var name_str = msg[i].user_nickname;
				var d = $('<div>'+name_str+'</div>');
				d.mouseover(function(){
					$(this).attr({'style':'background:blue'});
				})
				d.mouseout(function(){
					$(this).attr({'style':'background:white'});
					
				})
				d.click(function(){
					$('#nickname').val($(this).html());
					tip_obj.hide();
				})
				tip_obj.append(d);
			}
			tip_obj.show();
			}
		})
	}else{
		tip_obj.empty();
	}
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