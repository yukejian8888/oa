<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/myoa/Public/Home/css/base.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/info-reg.css" />
<script type="text/javascript" src="/myoa/Public/Home/js/jquery-1.10.1.js"></script>
<script src="/myoa/Public/Common/Uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/myoa/Public/Common/Uploadify/uploadify.css">

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
		font-size:12px;
		font-family:'Microsoft YaHei';
	}
	textarea#description { width:472px; padding:10px; height:84px; resize:none; outline:none; border:1px solid #c5d6e0; background:url(../images/inputbg.png) repeat-x left top;overflow:auto; float:left;}
	#showPic {width:145px; height:120px; position:absolute; left:400px; top:65px; background:#f00;}
	#showPic img {width:145px; height:120px;}
</style>

</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="/myoa/index.php/Home/Knowledge/addOk" method="post" enctype='multipart/form-data'>
<div class="main">
	<div id='showPic'></div>
	<input type="hidden" name="pic" id="pic" />
	<input type="hidden" name="smallpic" id="smallpic" />
    <p class="short-input ue-clear">
    	<label>标题：</label>
        <input name="title" type="text" placeholder="标题" />
    </p>
	<p class="short-input ue-clear" style='float:left;'>
    	<label>缩略图：</label>
		<input type='hidden' id='thumb' name='thumb' />
    </p>
	<br />
	<div style='float:left;'><input type="file" id="file" name="file" multiple="true" /></div>
	<div style='clear:both;'></div>
	<p class="short-input ue-clear" style="padding-top:20px;">
    	<label>描述：</label>
        <textarea name="description" id="description" placeholder='描述'></textarea>
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
<script type="text/javascript" src="/myoa/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript">
$('#file').uploadify({
	//调用内置的flash显示图像
	'swf'      : '/myoa/Public/Common/Uploadify/uploadify.swf',
	//设计实际进行上传操作的php程序
	'uploader' : '/myoa/index.php/Home/Knowledge/upload_file',
	//设置按钮文字
	'buttonText':'选择文件',
	//设置鼠标悬浮时的样式为 arrow:箭头
	//'buttonCursor':'arrow'
	'onUploadSuccess':function(file, data, response){
		//将data从相对路径转为绝对路径
		//将data中的第一个单元从相对路径转为绝对路径
		data = JSON.parse(data);
		//alert(data);die;
		tmp = data.smallpic;
		tmp = '/myoa/' + tmp.substr(2);
		//alert(tmp);die;
		//创建img标签
		var img = $('<img src='+tmp+' />');		
		$('#showPic').html(img);
		//将pic和smallpic都保存到表单的input隐藏域中
		$('#pic').val(data.pic);
		$('#smallpic').val(data.smallpic);
	}
})
$("#btnSubmit").click(function(){
	$("form").submit();
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