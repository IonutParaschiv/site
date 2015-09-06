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
<html class="widgetPage">
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
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/zeroClipboard.js"></script>
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
<div class="form-group top_group">
          <select onchange="company.appendWidget()" class="availableCompaniesSelect" data-style="btn-primary" name="companyId" id="availableCompaniesSelectWidget" >
            <option value="0">Nothing selected</option>
          </select>
    </div>
      <script>company.getAllWidget();</script>

  <div class="widget-container">
  <i>Select the company of choice from the dropdown, than copy the following snippent into your website</i>
    <textarea id="codeTextArea" >
      
  </textarea><br/>
  <!-- <button type="submit" class="btn btn-default" id="d_clip_button" onclick="">Copy to clipboard</button> -->
</div>
<!-- <div id="d_debug" style="border:1px solid #aaa; padding: 10px; font-size:9pt;">
          <h3>Debug Console:</h3>
</div> -->
</body>
</html>