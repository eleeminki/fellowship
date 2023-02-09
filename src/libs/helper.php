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
      require_once(__DIR__ .'/../../public/includes/'. $url . '.php');
  }

  /********************** FORM PROCESS CHECK ***********************/

  function is_post(): bool 
  {
        return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
  }

