<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/myoa/Public/Home/css/base.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/info-reg.css" />
<link href="/myoa/Public/Common/Ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/myoa/Public/Common/Ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/myoa/Public/Common/Ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/myoa/Public/Common/Ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/myoa/Public/Common/Ueditor/lang/zh-cn/zh-cn.js"></script>
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="/myoa/index.php/Home/Doc/modify" method="post" enctype='multipart/form-data'>
<div class="main">
	<input type="hidden" name="id" value="<?php echo ($info["doc_id"]); ?>" />
    <p class="short-input ue-clear">
    	<label>标题：</label>
        <input name="title" type="text" value="<?php echo ($info["doc_title"]); ?>" />
    </p>
	<p class="short-input ue-clear">
    	<label>附件：</label>
        <input type="file" name="file" />
    </p>
    <p class="short-input ue-clear" style="float:left;">
    	<label>内容：</label>
    </p>
	<p style='width:900px; padding-left:0; float:left;'>
		<textarea name="content" id="content" style="width:600px;height:300px">
			<?php echo ($info["doc_content"]); ?>
		</textarea>
		<script type="text/javascript"> 
			var um = UM.getEditor('content');
		</script>
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
$(function(){
	$('#btnSubmit').bind('click',function(){
		$('form').submit();
	});
	
	$('#btnReset').bind('click',function(){
		$('form')[0].reset();
	});
});	

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