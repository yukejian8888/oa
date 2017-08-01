<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php echo ($s); ?><br>
<?php echo ($arr[0]); ?>,<?php echo ($arr[1]); ?><br>
<?php echo ($arr["2"]); ?>,<?php echo ($arr["3"]); ?><br>
<?php echo ($info["id"]); ?>,<?php echo ($info["name"]); ?>,<?php echo ($info["sex"]); ?><br>
<?php echo ($info['id']); ?>--<?php echo ($info['name']); ?>--<?php echo ($info['sex']); ?>
</body>
</html>