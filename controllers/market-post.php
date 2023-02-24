<?php
$config = require_once(__DIR__ . '/../config/config.php');
$db = new Database($config['database'], DB_USER, DB_PASSWORD);

$postFieldRules = [
    "itemTitle" => "string | required | min: 8 | max: 128",
    "itemDescription" => "string | required | between: 8,255",
    "itemUserId" => "number_int | required"
];

if (is_post()) {
    $db->query('INSERT INTO market(title, description, user_id)VALUES(:itemTitle, :itemDescription, :itemUserId)', [
        'itemTitle' => $_POST['itemTitle'],
        'itemDescription' => $_POST['itemDescription'],
        'itemUserId' => $_POST['itemUserId'],
    ])->successPost();
}

require_once(__DIR__ . '/../views/market-post.view.php');