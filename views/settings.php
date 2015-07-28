<?php ?>

<!DOCTYPE html>
<html>
<head>
    <title>BookRest</title>
    <link rel="stylesheet" href="/bookrest/site/inc/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bookrest/site/inc/site/style.css">
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/site/master.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/site/miscFunctions.js"></script>
</head>

<?php
if(!empty($_COOKIE['userSession'])){
    $cookie = json_decode(base64_decode($_COOKIE['userSession']));
    $userId = $cookie->uid;
    echo " <script> fill.accountForm(".$userId."); </script>";
}else{
    header('Location:/bookrest/site');
}
  require_once('../../site/inc/lib/php/navigation.php');

?>

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
      <li><a href="/bookrest/site/views/account.php">Bookings</a></li>
      <li><a href="/bookrest/site/views/settings.php">Settings</a></li>
      <li><a href="/bookrest/site/views/company.php">Company</a></li>
      <li><a href="#">Widget</a></li>
        
    </ul>
</div> -->

<div class="container">
    <div class="accountForm">
        <form id="editAccountForm">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="Name" value="">
          </div>
          <div class="form-group">
            <label for="email">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="">
          </div>
      <!--     <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div> -->
          
          <button type="submit" onclick="user.edit(); return false;" class="btn btn-default">Edit</button>
        </form>
    </div>
</div>