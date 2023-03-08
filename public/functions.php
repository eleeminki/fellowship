<?php

const BASE_PATH = __DIR__ . '/../';

/********************** DUMP AND DIE  ***********************/

function dd(array $data): void
{
  // echo '<pre>';
  var_dump($data);
  // echo '</pre>';
  die();
}

/********************** VIEW PARTIALS ***********************/

function view(string $url): void
{
  require_once(__DIR__ . '/../views/partials/' . $url . '.view.php');
}

/********************** BASE_PATH  ***********************/
function base_path(string $path): void
{
  require_once(BASE_PATH . $path);
}
/********************** FORM METHOD CHECK ***********************/

function is_post(): bool
{
  return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

function is_get(): bool
{
  return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}



/************************** REDIRECT TO *************************/

function redirect_to(string $url): void
{
  header('Location:' . $url);
  exit();
}

/************************** REDIRECT WITH **********************/

function redirect_with(array $items): void
{
  foreach ($items as $key => $value) {
    $_SESSION[$key] = $value;
  }
  //   redirect_to($url);
}

?>