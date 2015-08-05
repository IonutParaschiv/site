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
    <link rel="stylesheet" type="text/css" href="/bookrest/site/inc/site/subnav.css">
    <link rel="stylesheet" type="text/css" href="/bookrest/site/inc/lib/bootstrap_select/dist/css/bootstrap-select.css">
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/site/master.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/lib/bootstrap_select/dist/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/site/miscFunctions.js"></script>


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

  <div class="widget-container">
    <xmp>
      <img id="booking" style="width:150px; cursor : pointer; border: 0" src="http://localhost/bookrest/site/widget/booking.png" onclick="openBooking(1);"/>
      <script type="text/javascript">  var companyId = 1;</script>
      <script type="text/javascript" src="http://localhost/bookrest/site/widget/web/js/booking.js"></script>
  </xmp>
</div>
</body>
</html>