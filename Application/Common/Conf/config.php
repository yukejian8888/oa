<?php
return array(
	//'配置项'=>'配置值'
    //定义分页时。每页显示数据的数量
    'PAGE_SIZE'      =>  10,
    'MODULE_ALLOW_LIST'    =>   array('Admin','Home'),
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Main', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'Index', // 默认操作名称
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'URL_HTML_SUFFIX'      =>  'html',
    'SHOW_PAGE_TRACE'      =>  false,
    'TMPL_PARSE_STRING'    => array(
        '__HOMECSS__' => '/Public/Home/css',
        '__HOMEJS__'  => '/Public/Home/js',
        '__HOMEIMG__' => '/Public/Home/images',
        '__COMMON__' => '/Public/Common',
        'VIEW_MAIN' => '/Home/View/Main/',
        '__ADMINCSS__' => '/Public/Admin/css',
        '__ADMINJS__'  => '/Public/Admin/js',
        '__ADMINIMG__' => '/Public/Admin/images',
        '__HOMEVIEW__' => '/Home/View/Main'
    ),
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'bookstore',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'bs_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'URL_ROUTER_ON'         =>  true,    //开启路由
    'URL_ROUTE_RULES'=>array(
        'ad'                    =>  'Admin/Index/login'
    ),
    
);
