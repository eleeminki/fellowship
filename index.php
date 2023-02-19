<?php

require_once('functions.php');
require_once('core/router.php');
require_once('core/Database.php');


$db = new Database($config['database'], DB_USER, DB_PASSWORD);
$users = $db->query('SELECT * FROM users')->fetch();

dd($users);