<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<script src="/Public/Common/uploadify/jquery-1.10.1.js" type="text/javascript"></script>
<script src="/Public/Common/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/Public/Common/uploadify/uploadify.css">
<style>
	a:link, a:visited { color: #e6e154; text-decoration: none; font-weight: bold;}
	a:active, a:hover { color: #e6e154; text-decoration: underline;}
	body{background:rgb(118,90,40);color:#e6e154;}
</style>
<script>
/*	//提交表单
	$('.confirm').click(function(){
		$('form')[0].submit();
	});
	//清空表单
	$('.clear').click(function(){
		//获取当前页面中第一个表单对象
		$('form')[0].reset();
	})*/
</script>
<body>
	<div style="width:800px;height:500px;position:relative;margin:0 auto;background:rgb(118,90,40);">
		<h1 align="center"><?php echo (session('nickname')); ?>的个人中心</h1>
		<div style="width:150px;position:absolute;top:50px;left:20px;">
			<a href="/Home/User/person/ac/1"><h3>昵称修改</h3></a>
			<a href="/Home/User/person/ac/2"><h3>密码修改</h3></a>
			<a href="/Home/User/person/ac/3"><h3>上传图书</h3></a>
			<a href="/Home/User/person/ac/4"><h3>历史上传图书状态</h3></a>
		</div>
		<div style="position:absolute;top:50px;right:20px;width:500px;">
			<?php if($data["action"] == 1): ?><form method="post" action="<?php echo U('User/reNickName');?>">
					新昵称：<input type="text" name="nickname" /><br>
					<button>提交</button>
				</form>
			<?php elseif($data["action"] == 2): ?>
				<form method="post" action="<?php echo U('User/rePassWord');?>">
					新密码：<input type="password" name="newpwd" /><br>
					<button>提交</button>
				</form>
			<?php elseif($data["action"] == 3): ?>
				<form method="post" action="<?php echo U('Book/addBook');?>" enctype='multipart/form-data'>
					图书封面：<input type="file" id="Pic" name="uploadPic" multiple="true"/><br>
					<input type="hidden" id="picPath" name="Pic" />
					*上传图书(只可上传 TXT 格式图书)：<input type="file" id="file" name="uploadBook" multiple="true"/><br>
					<input type="hidden" id="bookPath" name="book" />
					*书名：<input type="text" name="name" /><br>
					*作者：<input type="text" name="bookauthor" /><br>
					*类别：<select name="cat">
					                <option value="">选择类别</option>
								<?php if(is_array($cat)): foreach($cat as $key=>$value): ?><option value="<?php echo ($value["cat_id"]); ?>"><?php echo ($value["cat_name"]); ?></option><?php endforeach; endif; ?>
				          </select><br>
					*简介：<textarea style="width:300px;height:100px;" name="content" id="content" placeholder="简介"></textarea>
					<br><button>提交</button>
				</form>
			<?php elseif($data["action"] == 4): ?>
			    <table width="100%" align="center" border="1" rules="all">
			    	<tr>
				    	<th>ID</th>
				    	<th>书名</th>
				    	<th>作者</th>
				    	<th>上传时间</th>
				    	<th>图书状态</th>
			    	</tr>
			    	<?php if(is_array($book)): foreach($book as $key=>$val): ?><tr>
				    	<td><?php echo ($val["book_id"]); ?></td>
				    	<td><?php echo ($val["book_name"]); ?></td>
				    	<td><?php echo ($val["author"]); ?></td>
				    	<td><?php echo (date("Y-m-d H:i:s",$val["upload_time"])); ?></td>
				    	<td>
							<?php if($val["is_show"] == 0): ?>正在审核
							<?php elseif($val["is_show"] == 1): ?>审核通过
							<?php elseif($val["is_show"] == 2): ?>审核未通过<?php endif; ?>
						</td>
			    	</tr><?php endforeach; endif; ?>
			    </table>
				<?php else: ?>
				<h2 align="center">欢迎！</h2><?php endif; ?>
		</div>
	</div>
</body>
<script>
	//uploadify上传插件
	$('#Pic').uploadify({
		//调用内置flash显示图像
		'swf': '/Public/Common/uploadify/uploadify.swf',
		//指定实际进行上传操作的PHP程序
		'uploader' : "<?php echo U('Home/Book/uploadPic');?>",
		//设置按钮文字
		'buttonText' : '图书封面',
		//设置鼠标悬浮时鼠标样式
		//'buttonCursor' : 'arrow',
		//上传成功后的触发事件
		//file：上传file对象
		//data：上传成功后输出的字符串
		//response：响应类型

		'onUploadSuccess' : function(file, data, response){
			//思路：将data中获取的地址，做成一个img标签，追加到显示区域
			//将data字符串格式转为json对象
			data = JSON.parse(data);
			//将data.pic保存到隐藏域中
			$('#picPath').val(data);
		}
	});
	//图书
	$('#file').uploadify({
		//调用内置flash显示图像
		'swf': '/Public/Common/uploadify/uploadify.swf',
		//指定实际进行上传操作的PHP程序
		'uploader' : "<?php echo U('Home/Book/uploadBook');?>",
		//设置按钮文字
		'buttonText' : '上传图书',
		//设置鼠标悬浮时鼠标样式
		//'buttonCursor' : 'arrow',
		//上传成功后的触发事件
		//file：上传file对象
		//data：上传成功后输出的字符串
		//response：响应类型

		'onUploadSuccess' : function(file, data, response){
			//思路：将data中获取的地址，做成一个img标签，追加到显示区域
			//将data字符串格式转为json对象
			data = JSON.parse(data);
			//将data.book保存到隐藏域中
			$('#bookPath').val(data);
		}
	});
	//插件结束
</script>
</html>