<?php
require_once(__DIR__ . '/../core/Response.php');
$config = require_once(__DIR__ . '/../config/config.php');
$db = new Database($config['database'], DB_USER, DB_PASSWORD);

$marketPost = $db->query(
    'SELECT * FROM market WHERE user_id = :user_id AND id = :id',
    [
        'user_id' => $_GET['user'],
        'id' => $_GET['id'],
    ]
    );
    
$marketPost->fetch();


require_once(__DIR__ . '/../views/market.view.php');