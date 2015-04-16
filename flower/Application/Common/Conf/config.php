<?php
return array(
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'flower',          // 数据库名
    'DB_USER'               => 'flower',      // 用户名
    'DB_PWD'                => '7928932',          // 密码
    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => '',    // 数据库表前缀
    'SHOW_PAGE_TRACE'=>true,
    'DB_FIELDS_CACHE'=>false,
  'TMPL_PARSE_STRING'  =>array(
     '__PUBLIC__' => '/flower/Public', // 更改默认的__PUBLIC__ 替换规则
		),
);