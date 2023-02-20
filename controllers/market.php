<?php

require_once(__DIR__.'/../views/market.view.php');

require_once(__DIR__.'/../config/config.php');

$db = new Database($config['database'], DB_USER, DB_PASSWORD);

