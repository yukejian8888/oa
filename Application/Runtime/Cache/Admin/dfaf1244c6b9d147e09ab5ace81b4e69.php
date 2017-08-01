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
<div class="title"><h2>图书管理</h2></div>
<div class="table-operate ue-clear">
    <a href="javascript:;" class="edit">编辑</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">图书id</th>
                <th class="name">图书名</th>
                <th class="node">作者</th>
                <th class="process">上传者</th>
                <th class="process">推荐量</th>
                <th class="process">存储路径</th>
                <th class="process">上传时间</th>
                <th class="process">图书状态</th>
                <th class="process">下载次数</th>
                <th class="process">修改时间</th>
                <th class="process">图书分类</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
                    <td class="num"><?php echo ($value["book_id"]); ?></td>
                    <td class="name"><?php echo ($value["book_name"]); ?></td>
                    <td class="node"><?php echo ($value["author"]); ?></td>
                    <td class="process"><?php echo ($value["nick_name"]); ?></td>
                    <td class="process"><?php echo ($value["isgood"]); ?></td>
                    <td class="process">
                    <a href='/Admin/Books/download/id/<?php echo ($value["book_id"]); ?>'>附件下载</a>
                </td>
                    <td class="process"><?php echo (date("Y-m-d H:i:s",$value["upload_time"])); ?></td>
                    <td class="process">
                        <?php if($value["is_show"] == 0): ?>正在审核
                        <?php elseif($value["is_show"] == 1): ?>审核通过
                        <?php elseif($value["is_show"] == 2): ?>审核未通过<?php endif; ?>
                    </td>
                    <td class="process"><?php echo ($value["download_times"]); ?></td>
                    <td class="process"><?php echo (date("Y-m-d H:i:s",$value["update_time"])); ?></td>
                    <td class="process"><?php echo ($value["cat_name"]); ?></td>
                    <td class="process">
                        <a href="/Admin/Books/auditok/id/<?php echo ($value["book_id"]); ?>">通过</a>
                        |
                        <a href="/Admin/Books/auditno/id/<?php echo ($value["book_id"]); ?>">未通过</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"><?php echo ($page); ?></div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
/*function show(page){
    var data = {'p':page, '_':Math.random()}
    $.get('/Admin/Books/getContent', data, function(msg){
        //alert(msg);
        $('tbody').html(msg);
    })
}

//ajax分页类插件
$('.pagination').pagination(<?php echo ($count); ?>,{
    callback: function(page){
            show(page+1)
    },
    display_msg: false,
    setPageNo: false,
    items_per_page : <?php echo ($pagesize); ?>, // 每页显示多少条记录
});*/

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>