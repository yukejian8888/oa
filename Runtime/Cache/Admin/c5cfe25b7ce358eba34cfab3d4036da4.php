<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php echo (date('Y-m-d g:i a',time())); ?><br>
<?php echo (C("APP_AUTOLOAD_LAYER")); ?><br>
<?php echo (C("URL_MODEL")); ?><br>
<?php echo (CONTROLLER_NAME); ?><br>
<?php echo (MODULE_NAME); ?><br>
<?php echo (ACTION_NAME); ?><br>

<?php echo ($_SERVER['SERVER_NAME']); ?><br>
<?php echo ($_SERVER['SCRIPT_NAME']); ?><br>
<?php echo ($_GET['id']); ?>
</body>
</html>