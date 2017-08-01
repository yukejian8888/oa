<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />
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
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">序号</th>
                <th class="name">姓名</th>
                <th class="nickname">昵称</th>
                <th class="sex">性别</th>
                <th class="birthday">生日</th>
                <th class="tel">电话</th>
                <th class="email">邮箱</th>
                <th class="email">其他联系方式</th>
                <th class="ctime">添加时间</th>
                <th class="ctime">更新时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($ulist)): foreach($ulist as $key=>$vo): ?><tr>
            	<td class="num"><?php echo ($vo["user_id"]); ?></th>
                <td class="name"><?php echo ($vo["user_name"]); ?></th>
                <td class="nickname"><?php echo ($vo["nick_name"]); ?></th>
                <td class="sex"><?php echo ($vo["sex"]); ?></th>
                <td class="birthday"><?php echo ($vo["birthday"]); ?></th>
                <th class="tel"><?php echo ($vo["phone"]); ?></th>
                <th class="email"><?php echo ($vo["email"]); ?></th>
                <th class="email"><?php echo ($vo["other_contact"]); ?></th>
                <th class="ctime"><?php echo ($vo["create_time"]); ?></th>
                <th class="ctime"><?php echo ($vo["update_time"]); ?></th>
                <th class="operate">
                    <a href="/Admin/User/del/id/<?php echo ($vo["user_id"]); ?>">删除</a>
                </th>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
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
    var data = {'p':page,'_':Math.random()}
    $.get('/Admin/User/getContent',data,function(msg){
        $('tbody').html(msg);
    })
}
//ajax分页类插件
$('.pagination').pagination(<?php echo ($count); ?>,{
	callback: function(page){
		show(page+1)
	},
	display_msg: true,
	setPageNo: false,
    items_per_page : <?php echo ($pagesize); ?>, // 每页显示多少条记录
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>