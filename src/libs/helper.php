<?php

/************ DUMP AND DIE ************************************** */

  function dd(array $data): void
  {
      echo '<pre>' .var_dump($data) . '</pre>';
      die();
  }

  /****************************** VIEW TEMPLATE ****************** */
  
  function view(string $url): void
  {
      require_once(__DIR__ .'/../../public/includes/'. $url . '.php');
  }

  /********************** FORM PROCESS CHECK ********************* */

