<?php
$dirname = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_DIRNAME);
$base = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_BASENAME);
echo $dirname;
echo '<br>' .dirname($dirname);
echo '<br>' .$base;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="<?= dirname($dirname) !== '/fellowship/public' ? '../style.css' : '../../style.css'?>" rel="stylesheet" />
  </head>
  <body>
    <div class="container-fluid primary">
      <nav class="navbar navbar-expand-lg bg-primary" >
      <div class="container">
        <a class="navbar-brand" href="<?= dirname($dirname) === '/fellowship/public' ? dirname($dirname) : " " ?>">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= $base === 'login.php' ? '' : 'pages/login.php' ?>">Register/Login</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              My Account
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>


  <!-----------------  CATEGORY BAR -------------------------------->

<div class="container-fluid primary">
      <nav class="navbar navbar-expand-lg"   style="background-color: #e3f2fd;">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="navbar-brand nav-link active" aria-current="page" href="#">Meetups</a>
                        </li>
                        <li class="nav-item">
                        <a class="navbar-brand nav-link active" aria-current="page" href="#">Market</a>
                        </li>
                        <li class="nav-item">
                        <a class="navbar-brand nav-link active" aria-current="page" href="#">Jobs</a>
                        </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
  </div>