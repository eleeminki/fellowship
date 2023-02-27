<?php
$config = require_once(__DIR__ . '/../../config/config.php');
$db = new Database($config['database'], DB_USER, DB_PASSWORD);
$sanFilters = require_once(__DIR__ . '/../../core/sanitization.php');
$errorMsgs = require_once(__DIR__ . '/../../core/validation.php');
require_once('core/Filter.php');
$filter = new Filter();

$postFieldRules = [
    "itemTitle" => "string | required | min: 8 | max: 128",
    "itemDescription" => "string | required | between: 8,255",
    "itemUserId" => "number_int | required"
];

if (is_post()) {

    [$inputs, $errors] = $filter->filter($_POST, $postFieldRules, $errorMsgs, $sanFilters);

    if ($errors) {
        redirect_with(['inputs' => $inputs, 'errors' => $errors]);
    } else {
        $db->query('INSERT INTO market(title, description, user_id)VALUES(:itemTitle, :itemDescription, :itemUserId)', [
            'itemTitle' => $_POST['itemTitle'],
            'itemDescription' => $_POST['itemDescription'],
            'itemUserId' => $_POST['itemUserId'],
        ])->successPost();
    }
}

if(is_get()){
    $userPost = $db->query('SELECT * FROM market WHERE user_id = :uId', [
           'uId' => $_SESSION['inputs']['itemUserId'],
        ])->fetchAllOrAbort();
}


require_once('views/market/market-post.view.php');