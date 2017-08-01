<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING' => array(
	   '__HOME__' => '/myoa/Public/Home',
	    '__HOMECSS__' => '/myoa/Public/Home/css',
	    '__HOMEJS__' => '/myoa/Public/Home/js',
	    '__HOMEIMG__' => '/myoa/Public/Home/images',
	    '__COMMON__' => '/myoa/Public/Common'
	),
    //开启Trace页面
    //'SHOW_PAGE_TRACE'=>true,
    //定义分页时，每页显示数据的数量
	'PAGE_SIZE' => 2,
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'myoa',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'oa_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'LOAD_EXT_FILE'         =>  'myfile'   //可以载入一个叫做myfile.php的文件
    
);
