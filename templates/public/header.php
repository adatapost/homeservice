<?php
session_start();
include_once "lib/all.php";
$title = glb("title");
$message = "";
$cmd = post("cmd");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title><?=$title?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
<body>
<header>
  <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="assets/images/hs.jpg" class="img-thumbnail" style="width: 30%;" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-default" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
<hr/>
<main class="container">
  <header class="row">
   <div class="col-1"><img class="img-thumbnail"  src="assets/images/hs.jpg" alt="Logo" /></div>
   <div class="col-3">
      <h1>Home Service</h1>
      <h6>What we &amp; you are for!</h6>
    </div>
    <div class="col-8">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/images/ad1.jpg" class="d-block w-100" style="height:100px" alt="One">
        </div>
        <div class="carousel-item">
          <img src="assets/images/ad3.jpg" class="d-block w-100" style="height:100px" alt="Two">
        </div>
        <div class="carousel-item">
          <img src="assets/images/ad3.jpg" class="d-block w-100" style="height:100px" alt="Three">
        </div>
      </div>
     </div>
    </div>
  </header>
  <hr/>


    

  
