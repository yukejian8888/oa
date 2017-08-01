CREATE TABLE `bs_admin` (
  `admin_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `admin_name` varchar(20) NOT NULL DEFAULT 'null' COMMENT '管理员名称',
  `password` char(32) NOT NULL DEFAULT 'null' COMMENT '密码',
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密' COMMENT '性别',
  `birthday` date NOT NULL COMMENT '出生日期',
  `phone` char(11) NOT NULL DEFAULT 'null' COMMENT '手机号',
  `email` varchar(40) NOT NULL DEFAULT 'null' COMMENT '邮箱',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '修改时间',
  `role_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

CREATE TABLE `bs_book` (
  `book_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '图书id',
  `book_name` varchar(100) NOT NULL DEFAULT 'null' COMMENT '图书名',
  `author` varchar(50) NOT NULL DEFAULT 'null' COMMENT '作者',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '上传者',
  `isgood` int(11) NOT NULL DEFAULT '0' COMMENT '图书推荐量',
  `book_path` varchar(255) NOT NULL DEFAULT 'null' COMMENT '图书存储路径',
  `upload_time` datetime NOT NULL COMMENT '图书上传时间',
  `is_show` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `image` varchar(255) NOT NULL DEFAULT 'null' COMMENT '图书图片路径',
  `sort` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序规则',
  `download_times` int(11) NOT NULL DEFAULT '0' COMMENT '下载次数',
  `is_top` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `intro` varchar(10000) NOT NULL DEFAULT 'null' COMMENT '图书简介',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `cat_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '分类id',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态',
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='图书信息表';

CREATE TABLE `bs_category` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cat_name` varchar(30) NOT NULL DEFAULT 'null' COMMENT '分类名称',
  `parent_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '父分类id',
  `desc` varchar(1000) NOT NULL DEFAULT 'null' COMMENT '分类描述',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='图书分类表';

CREATE TABLE `bs_node` (
  `node_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点id',
  `node_name` varchar(20) NOT NULL COMMENT '节点名',
  `node_pid` tinyint(4) NOT NULL DEFAULT '0' COMMENT '父节点',
  `node_module` varchar(20) NOT NULL DEFAULT 'null' COMMENT '模块名',
  `node_controller` varchar(20) NOT NULL DEFAULT 'null' COMMENT '控制器名',
  `node_action` varchar(20) NOT NULL DEFAULT 'null' COMMENT '方法名',
  `node_path` varchar(255) NOT NULL DEFAULT 'null' COMMENT '路径',
  `node_level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '级别',
  `node_title` varchar(20) NOT NULL DEFAULT 'null' COMMENT '别名',
  `node_sort` tinyint(4) NOT NULL DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`node_id`),
  UNIQUE KEY `node_name` (`node_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='节点表';

CREATE TABLE `bs_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(20) NOT NULL COMMENT '角色名字',
  `role_nodeid` varchar(255) DEFAULT NULL COMMENT '权限列表',
  `role_path` text NOT NULL COMMENT '权限路径',
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色表';

CREATE TABLE `bs_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(20) NOT NULL DEFAULT 'null' COMMENT '用户名',
  `user_roleid` tinyint(4) NOT NULL DEFAULT 4 COMMENT '用户角色id',
  `nick_name` varchar(20) NOT NULL DEFAULT 'null' COMMENT '用户昵称',
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密' COMMENT '用户性别',
  `password` char(32) NOT NULL DEFAULT 'null' COMMENT '用户密码',
  `birthday` date NOT NULL COMMENT '用户出生日期',
  `phone` char(11) NOT NULL DEFAULT 'null' COMMENT '用户手机号',
  `email` varchar(40) NOT NULL DEFAULT 'null' COMMENT '用户邮箱',
  `other_contact` varchar(30) NOT NULL DEFAULT 'null' COMMENT '其它联系方式',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户信息表';