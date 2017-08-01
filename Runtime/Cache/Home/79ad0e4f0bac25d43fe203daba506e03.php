<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/myoa/Public/Home/css/base.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<div class="main">
	<form action="<?php echo U('addok');?>" method="post">
    <p class="short-input ue-clear">
    	<label>部门名称：</label>
        <input type="text" name="name" placeholder="部门名称" />
    </p>
    <div class="short-input select ue-clear">
    	<label>上级部门：</label>
        <div class="select-wrap">
            <select name="pid">
            	<option value=0>顶级部门</option>
            	<?php if(is_array($dlist)): foreach($dlist as $key=>$value): ?><option value="<?php echo ($value["dept_id"]); ?>"><?php echo ($value["dept_name"]); ?></option><?php endforeach; endif; ?>
            </select>
        </div>
    </div>
    <p class="short-input ue-clear">
    	<label>排序：</label>
        <input type="text" name="sort" placeholder="20" />
    </p>
    <p class="short-input ue-clear">
    	<label>备注：</label>
        <textarea name="remark" placeholder="请输入内容"></textarea>
    </p>
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm">确定</a>
    <a href="javascript:;" class="clear">清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript">
//使用a标签(确定)来提交表单
$('.confirm').click(function(){
	$('form').submit();
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