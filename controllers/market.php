<?php

$config = require_once(__DIR__ . '/../config/config.php');
$db = new Database($config['database'], DB_USER, DB_PASSWORD);

$marketPost = $db->query('SELECT * FROM market WHERE user_id = :user_id', [':user_id' => $_GET['id']])->fetch();




require_once(__DIR__ . '/../views/market.view.php');