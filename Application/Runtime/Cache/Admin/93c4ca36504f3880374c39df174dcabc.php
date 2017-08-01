<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/home.css" />

<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css"/>
<script type="text/javascript" src="/Public/Admin/js/modernizr.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery1.42.min.js"></script>
<title>BookShare后台管理系统</title>
	<script >

		$(function(){
			$("#nowtime").css({color:'red'});
			$("#host").html(location.host);
			//alert(location.host);
			window.setInterval('ShowTime()',1000);
		});
		function ShowTime(){
			var t = new Date();
			var str = t.getFullYear() + '年';
			str += t.getMonth()+1 + '月';
			str += t.getDate() + '日 ';
			str += t.getHours() + ':';
			str += t.getMinutes() + ':';
			str += t.getSeconds() + '';
			$("#nowtime").html(str);
			document.getElementById("nowtime").innerHTML = str;
		}

	</script>
</head>

<body>
<div class="article toolbar">
	<div class="title ue-clear">
    	<h2>BookShare管理页面</h2>
    </div>
	<div class="result-wrap">
		<div class="result-title">
			<h1>系统基本信息</h1>
		</div>
		<div class="result-content">
			<ul class="sys-info-list">
				<li>
					<label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
				</li>
				<li>
					<label class="res-lab">运行环境</label><span class="res-info">Apache/2.2.21 (Win64) PHP/5.3.10</span>
				</li>
				<li>
					<label class="res-lab">PHP运行方式</label><span class="res-info">apache2handler</span>
				</li>
				<li>
					<label class="res-lab">模板版本</label><span class="res-info">v-2.0</span>
				</li>
				<li>
					<label class="res-lab">当前IP地址</label><span class="res-info"><?php echo $_SERVER["REMOTE_ADDR"] ?></span>
				</li>
				<li>
					<label class="res-lab">北京时间</label>
					<span class="res-info" id='nowtime'>2015年9月4日 11:01:07</span>
				</li>
				<li>
					<label class="res-lab">服务器域名</label><span class="res-info"><span id="host">localhost</span></span>
				</li>
			</ul>
		</div>
	</div>

</div>

</body>
</html>