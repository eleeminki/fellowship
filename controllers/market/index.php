<?php


//  base_path('config/config.php');
$db = new Database();


$marketItems = $db->query('SELECT * FROM market', [])->fetchAllOrAbort();

base_path('views/market/index.view.php');
// require_once(__DIR__ . '/../../views/market/index.view.php');

?>