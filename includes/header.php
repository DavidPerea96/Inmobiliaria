<?php 
  include ('server.php');
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	//header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourSnailHouse</title>
    <!--- Bootstrap 4.0 CSS --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    
</head>

<body class="d-flex flex-column h-100">
  <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">YourSnailHouse</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="venta.php">Venta</a>
        </li>
        
      <?php if(isset($_SESSION['username'])&&($_SESSION['username'] == 'admin')){ ?>
        <li class="nav-item">
          <a class="nav-link" href="edit.php">Edit</a>
        </li>
      <?php } ?>
  
      </ul>
      <?php
        if (!isset($_SESSION['username'])) {
      ?>
      <div class="mt-2 mt-md-0">
        <a class="btn btn-info" href="login.php" type="submit" style="margin-right: 10px">Login</a>
      </div>
      <?php }else { ?>
        <div class="mt-2 mt-md-0">
        <a class="btn btn-warning" href="index.php?logout='1'" type="submit" style="margin-right: 10px">Logout</a>
      </div>
      <?php } ?>

      
    </div>
    </nav>