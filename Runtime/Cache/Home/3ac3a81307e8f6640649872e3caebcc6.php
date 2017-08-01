<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/myoa/Public/Home/css/base.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/info-mgt.css" />
<link rel="stylesheet" href="/myoa/Public/Home/css/WdatePicker.css" />
<script src="/myoa/Public/Common/iDialog/jquery-1.8.3.min.js"></script>
<script src="/myoa/Public/Common/iDialog/jquery.iDialog.js" dialog-theme="default"></script>
<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .num {width:50px;}
	table tr .name {width:320px;}
	table tr .process {width:80px;}
	table tr .file {width:80px; padding-left:13px;}
	table tr .node {width:80px;}
	table tr .addtime {width:80px;}
	.i-content {height:400px; overflow:auto;}
</style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="<?php echo U('add');?>" class="add">添加</a>
    <a href="javascript:;" class="del" id='btnDel'>删除</a>
    <a href="javascript:;" class="edit" id='btnEdit'>编辑</a>
</div>
<div class="table-box">
	<table>
    	<thead>
    		
        	<tr>
            	<th class="num">序号</th>
                <th class="name">标题</th>
                <th class="process">内容</th>
				<th class="file">附件下载</th>
                <th class="node">作者</th>
                <th class="time">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($docList)): foreach($docList as $key=>$value): ?><tr>
            	<td class="num"><?php echo ($value["doc_id"]); ?></td>
                <td class="name"><?php echo ($value["doc_title"]); ?></td>
                <td class="process">
                	<a class='show' onclick="show(<?php echo ($value["doc_id"]); ?>)">查看全文</a>
                </td>
				<td class="file">
					<a href="/myoa/index.php/Home/Doc/download/id/<?php echo ($value["doc_id"]); ?>">附件下载</a>
				</td>
                <td class="node"><?php echo ($value["doc_userid"]); ?></td>
                <td class="time"><?php echo ($value["doc_ctime"]); ?></td>
                <td class="operate">
                	<a href="/myoa/index.php/Home/Doc/del/id/<?php echo ($value["doc_id"]); ?>">删除</a>|
                	<a href="/myoa/index.php/Home/Doc/edit/id/<?php echo ($value["doc_id"]); ?>">修改</a>
                </td>
            </tr><?php endforeach; endif; ?>
         </tbody>
    </table>
</div>
</body>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/core.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript" src="/myoa/Public/Home/js/jquery.pagination.js"></script>
<script type="text/javascript">
//定义页面载入事件
$(function(){
	//获取btnShow按钮并绑定相关事件
	$('.show').bind('click',function(){
		var id = $(this).parent().siblings('td').eq(0).text();
		var title = $(this).parent().siblings('td').eq(1).text();
		//通过Ajax从服务器端获取数据
		var data = {
			id:id,
			_:new Date().getTime()
		};
		$.get('/thinkoa/index.php/Admin/Doc/getContent',data,function(msg){
			iDialog({
			    title:title,
			    id:'DemoDialog'+id,
			    content:msg,
			    lock: true,
			    width:800,
			    fixed: true
			});
		});
	});
	
	//获取btnEdit按钮并绑定相关事件
	$('#btnEdit').bind('click',function(){
		//获取选中的id元素
		var id = $(':checkbox:checked').val();
		//判断id是否为空
		if(id == undefined) {
			alert('请选择您要编辑的元素');
			return;
		}
		//跳转到当前控制器的edit方法
		location.href = '/thinkoa/index.php/Admin/Doc/edit/id/'+id;
	});
	
	//获取btnDel按钮并绑定相关事件
	$('#btnDel').bind('click',function(){
		if(confirm('确定删除？真的想好了么？')) {
			//获取选中的id元素
			var id = $(':checkbox:checked');
			var ids = '';
			for(var i=0;i<id.length;i++) {
				ids += id[i].value + ',';
			}
			if(ids == '') {
				alert('请选择您要删除的元素');
				return;
			}
			//ids = 1,2,3
			//去除最后一个逗号
			ids = ids.substring(0,ids.length-1);
			//跳转到删除方法del
			location.href = '/thinkoa/index.php/Admin/Doc/del/id/'+ids;
		}
	});
	
	//获取btnChart按钮并绑定相关事件
	$('#btnChart').bind('click',function(){
		//跳转到指定页面
		location.href = '/thinkoa/index.php/Admin/Doc/chart';
	});
});	
function show(id){
	var data = {'id':id, '_':Math.random()};
	$.get('/myoa/index.php/Home/Doc/getContent',data,function(msg){
		msg = JSON.parse(msg); //字符串转json的方法	
	iDialog({
	      title:msg.doc_title,
	      //id:'DemoDialog  ',
	      content:msg.doc_content,
	      lock: true,
	      width:500,
	      fixed: true,
	      height:300
	  });
	})
}
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
</script>
</html>