<?php

$config = require_once(__DIR__ . '/../config/config.php');

$db = new Database($config['database'], DB_USER, DB_PASSWORD);

$markets = $db->query('SELECT * FROM market', [])->fetchAll();


// dd($marketPost);
require_once(__DIR__ . '/../views/markets.view.php');