<?php

$config = require_once('config/config.php');

$db = new Database($config['database'], DB_USER, DB_PASSWORD);


$marketItems = $db->query('SELECT * FROM market', [])->fetchAllOrAbort();

require_once('views/market/markets.view.php');

?>