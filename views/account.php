<?php
  if(!empty($_COOKIE['userSession'])){
      $cookie = json_decode(base64_decode($_COOKIE['userSession']));
      $userId = $cookie->uid;
  }else{
      header('Location:/bookrest/site');
  }
  require_once('../../site/inc/lib/php/navigation.php');

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>BookRest</title>
    <link rel="stylesheet" href="/bookrest/site/inc/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bookrest/site/inc/site/style.css">
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/site/master.js"></script>
</head>
<body>

<nav class='navbar navbar-inverse navbar-static-top' role= "navigation">
  <div class="main-nav container">

        <?php 
        if(empty($_COOKIE['userSession'])){
          echo $nav;
        }else{
          echo $loggedNav;
        }
        ?>
  </div>
</nav>
<!-- <div class="wide-nav">
    <ul class='nav navbar-nav navbar-default navbar-left subnav'>
      <li><a href="#">Bookings</a></li>
      <li><a href="/bookrest/site/views/settings.php">Settings</a></li>
      <li><a href="/bookrest/site/views/company.php">Company</a></li>
      <li><a href="#">Widget</a></li>
        
    </ul>
</div> -->

<div class="container">
    <div class="bookingsView">
        <div class="calendarContainer">
            <iframe src="/bookrest/site/inc/lib/fullcalendar/demos/default.html"></iframe>
        </div>
    </div>
</div>