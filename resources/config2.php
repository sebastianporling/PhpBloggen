<?php

$config['db_host'] = 'sql200.byetcluster.com';
$config['db_user'] = 'shfre_12287281';
$config['db_pass'] = '10eric';
$config['db_name'] = 'blog';

foreach ($config as $key => $value) {
    define(strtoupper($key), $value);
}

?>
