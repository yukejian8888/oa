<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/myoa/Public/Home/css/base.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/info-mgt.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .num{ width:63px; text-align: center;}
	table tr .name{ width:63px; padding-left:17px;}
	table tr .nickname{ width:63px; padding-left:13px;}
	table tr .dept{ width:63px; padding-left:13px;}
	table tr .role{ width:63px; padding-left:13px;}
	table tr .sex{ width:63px; padding-left:13px;}
	table tr .birthday{ width:63px; padding-left:13px;}
	table tr .tel{ width:63px; padding-left:13px;}
	table tr .email{ width:63px; padding-left:13px;}
	table tr .ctime{ width:63px; padding-left:13px;}
	table tr .operate{ width:63px; padding-left:15px;}
	table tr .operate a{ color:#2c7bbc;}
	table tr .operate a:hover{ text-decoration:underline;}
</style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="<?php echo U('User/add');?>" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="/myoa/index.php/Home/User/charts" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
        		<th class="num">{}</th>
            	<th class="num">序号</th>
                <th class="name">姓名</th>
                <th class="nickname">昵称</th>
                <th class="dept">部门</th>
                <th class="sex">性别</th>
                <th class="birthday">生日</th>
                <th class="tel">电话</th>
                <th class="email">邮箱</th>
                <th class="ctime">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
        		<td><input type="checkbox" name="id[]" value="<?php echo ($value["user_id"]); ?>" /></td>
            	<td class="num"><?php echo ($value["user_id"]); ?></td>
                <td class="name"><?php echo ($value["user_name"]); ?></td>
                <td class="nickname"><?php echo ($value["user_nickname"]); ?></td>
                <td class="dept"><?php echo ($value["dept_name"]); ?></td>
                <td class="sex"><?php echo ($value["user_sex"]); ?></td>
                <td class="birthday"><?php echo ($value["user_birthday"]); ?></td>
                <th class="tel"><?php echo ($value["user_tel"]); ?></th>
                <th class="email"><?php echo ($value["user_email"]); ?></th>
                <th class="ctime"><?php echo ($value["user_ctime"]); ?></th>
                <th class="operate">
                	<a href="/myoa/index.php/Home/User/del/id/<?php echo ($value["user_id"]); ?>">删除</a>|
                	<a href="<?php echo U('edit','id='.$value['user_id']);?>">修改</a>
                </th>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"><?php echo ($page); ?></div>
</body>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.pagination.js"></script>
<script type="text/javascript">
$('.del').click(function(){
	//获取所有选中的复选框的id值
	//:checkbox 选中所有的checkbox对象
	//:checkbox 选中所有打勾的复选框
	//c_obj 多对象的集合，使用each()函数进行遍历
	var c_obj = $(':checkbox:checked');
	//定义字符串，来拼接所有接收到id值
	var str = "";
	c_obj.each(function(){
		str += $(this).val()+',';
	})
	location.href = "/myoa/index.php/Home/User/dels/ids/"+str;
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
function show(page){
	var data = {'p':page, '_':Math.random()};
	$.get('/myoa/index.php/Home/User/getContent', data, function(msg){
		//alert(msg);
		$('tbody').html(msg);
	})
}
$('.pagination').pagination(<?php echo ($count); ?>,{
	callback: function(page){
		show(page+1)
	},
	display_msg: true,
	setPageNo: false,
	items_per_page : <?php echo ($pagesize); ?>,//每页显示多少条记录
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>