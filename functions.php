<?php

  /********************** DUMP AND DIE  ***********************/

  function dd(array $data): void
  {
      echo '<pre>' .var_dump($data) . '</pre>';
      die();
  }

  /********************** VIEW TEMPLATES ***********************/

  function view(string $url): void
  {
      require_once(__DIR__ .'/views/partials/'. $url . '.php');
  }

  /********************** FORM PROCESS CHECK ***********************/

  function is_post(): bool
  {
      return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
  }


  /************************** REDIRECT TO *************************/

  function redirect_to(string $url): void
  {
      header('Location:'. $url);
      exit();
  }

  /************************** REDIRECT WITH **********************/

  function redirect_with(string $url, array $items): void
  {
      foreach ($items as $key => $value) {
          $_SESSION[$key] = $value;
      }
      redirect_to($url);
  }
