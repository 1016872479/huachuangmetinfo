<?php
return array(
	//'配置项'=>'配置值'
	//PDO连接方式
	'DB_TYPE'   => 'pdo', // 数据库类型
	'DB_DSN'    => 'mysql:host=localhost;dbname=met;charset=utf8',
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '111', // 密码
	'DB_PREFIX' => 'met_', // 数据库表前缀 

	// 关闭字段缓存
	'DB_FIELDS_CACHE'=>false,
	'SHOW_PAGE_TRACE'=>true,
);