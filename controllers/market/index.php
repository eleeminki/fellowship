<?php

$config = require_once(__DIR__ . '/../../config/config.php');

$db = new Database($config['database'], DB_USER, DB_PASSWORD);


$marketItems = $db->query('SELECT * FROM market', [])->fetchAllOrAbort();

require_once(__DIR__ . '/../../views/market/index.view.php');

?>