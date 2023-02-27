<?php

$config = require_once(__DIR__ . '/../../config/config.php');
$db = new Database($config['database'], DB_USER, DB_PASSWORD);

$item = $db->query(
    'SELECT * FROM market WHERE user_id = :user_id AND id = :id',
    [
        'user_id' => $_GET['user'],
        'id' => $_GET['id'],
    ]
)->fetchOrAbort();


require_once('views/market/market.view.php');