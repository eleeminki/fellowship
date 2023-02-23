<?php

$config = require_once(__DIR__ . '/../config/config.php');
$db = new Database($config['database'], DB_USER, DB_PASSWORD);

$marketItem = $db->query(
    'SELECT * FROM market WHERE user_id = :user_id AND id = :id',
    [
        'user_id' => $_GET['user'],
        'id' => $_GET['id'],
    ]
    );

$item = $marketItem->fetchOrAbort();


require_once(__DIR__ . '/../views/market.view.php');