<?php
include_once('config.php');

mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER_SET utf8');
mysql_select_db(DB_NAME);

include_once('func/blog.php');
?>
