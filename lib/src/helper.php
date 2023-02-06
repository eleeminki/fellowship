<?php

  function dd(array $data): void
  {
      echo '<pre>' .var_dump($data) . '</pre>';
      die();
  }

  function view(string $url): void
  {
      require_once(__DIR__ .'/../../public/includes/'. $url . '.php');
  }
