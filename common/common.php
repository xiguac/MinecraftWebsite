<?php
define('IN_CRONLITE', true);
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');

include(SYSTEM_ROOT.'func.php');
$sqlconf = include(SYSTEM_ROOT."config.php");

// 创建连接
$DB = new mysqli($sqlconf['servername'], $sqlconf['username'], $sqlconf['password'], $sqlconf['dbname']);
// 检测连接
if($DB->connect_error) {
    exit("数据库连接失败");
} 
?>