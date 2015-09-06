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
    <script type="text/javascript" src="/bookrest/site/inc/site/calendar.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/site/master.js"></script>

    <!-- CALENDAR DEPENDENCIES -->
    <link href='/bookrest/site/inc/lib/fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='/bookrest/site/inc/lib/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='/bookrest/site/inc/lib/fullcalendar/lib/moment.min.js'></script>
    <script src='/bookrest/site/inc/lib/fullcalendar/fullcalendar.min.js'></script>
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
        <div class="form-group calendarCompanySelect">
              <select onchange="booking.get()" class="availableCompaniesSelect" data-style="btn-primary" name="companyId" id="availableCompaniesSelect" >
                <option value="0">Nothing selected</option>
              </select>
        </div>
            <!-- <iframe src="/bookrest/site/inc/lib/fullcalendar/demos/default.html"></iframe> -->
            <div id='calendar'></div>
        </div>
    </div>
</div>
<div class="modal fade" id="bookingModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle"></h4>
      </div>
      <div class="modal-body">
        <p><span class="fieldLabel">Customer Name: </span> <span id="custName"></span></p>
        <p><span class="fieldLabel">Customer Email: </span> <span id="custEmail"></span></p>
        <p><span class="fieldLabel">Customer Phone: </span> <span id="custPhone"></span></p>
        <p><span class="fieldLabel">Staff Member: </span> <span id="staffMemb"></span></p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      <script> company.getCustom(); </script>
</body>
</html>