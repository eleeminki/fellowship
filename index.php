<?php

require_once('functions.php');

$uri = $_SERVER['REQUEST_URI'];

// dd($_SERVER);
if ($uri === '/fellowship/') {
    require_once('controllers/home.php');
} elseif ($uri === '/fellowship/login') {
    // dd($_SERVER);
    // require_once('controllers/home.php');
    require_once('controllers/login.php');
}
