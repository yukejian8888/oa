<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/myoa/Public/Home/css/base.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/info-mgt.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="<?php echo U('Dept/add');?>" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
        		<th style="width:36px;"></th>
            	<th class="num">{}</th>
                <th class="name">部门名称</th>
                <th class="process">上级部门</th>
                <th class="node">排序</th>
                <th class="time">备注信息</th>
                <th class="operate">操作</th>
            </tr>
            
        </thead>
        <tbody>
        	<?php if(is_array($dlist)): foreach($dlist as $key=>$value): ?><tr>
        		<td><input type="checkbox" name="id[]" value="<?php echo ($value["dept_id"]); ?>" /></td>
            	<td class="num"><?php echo ($value["dept_id"]); ?></td>
                <td class="name"><?php echo (str_repeat("---",$value["dept_level"])); echo ($value["dept_name"]); ?></td>
                <td class="process"><?php echo ((isset($value["name"]) && ($value["name"] !== ""))?($value["name"]):"顶级部门"); ?></td>
                <td class="node"><?php echo ($value["dept_sort"]); ?></td>
                <td class="time"><?php echo ($value["dept_remark"]); ?></td>
                <td class="operate">
                	<a href="/myoa/index.php/Home/Dept/del/id/<?php echo ($value["dept_id"]); ?>">删除</a>
                	<a href="<?php echo U('edit','id='.$value['dept_id']);?>">修改</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.pagination.js"></script>
<script type="text/javascript">
$(function(){
$('.del').click(function(){
	//获取所有选中的复选框的id值
	//:checkbox 选中所有的checkbox对象
	//:checkbox 选中所有打勾的复选框
	//c_obj 多对象的集合，使用each()函数进行遍历
	var c_obj = $(':checkbox:checked');
	/*if(c_obj.length < 1){
		console.log('xxxxxx');
		alert('请选择要删除的部门选项');
		return false;
	}
	console.log('bbbbbb');*/
	//定义字符串，来拼接所有接收到id值
	var str = "";
	c_obj.each(function(){
		str += $(this).val()+',';
	})
	location.href = "/myoa/index.php/Home/Dept/dels/ids/"+str;
})
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
});
</script>
</html>