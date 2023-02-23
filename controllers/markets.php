<?php

$config = require_once(__DIR__ . '/../config/config.php');
$db = new Database($config['database'], DB_USER, DB_PASSWORD);

$market = $db->query('SELECT * FROM market', []);
$marketItems = $market->fetchAllOrAbort();

require_once(__DIR__ . '/../views/markets.view.php');