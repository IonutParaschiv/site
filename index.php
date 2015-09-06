<?php 
  require_once('inc/lib/php/navigation.php');

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>BookRest</title>
    <link rel="stylesheet" href="inc/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="inc/site/style.css">
    <script type="text/javascript" src="inc/lib/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="inc/lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="inc/site/master.js"></script>
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
<div class="wide"></div>

<div class="container">
 <div class="col col-md-4">
    <h2>This is a Beta</h2>
    <p>
     This app is a beta platform which has as scope a school project.
    <p>
      Do you have any suggestions? Shoot me an email at: 
    </p>
    <p>
     paraschivdionut[at]gmail.com
    </p>
  </div>
  <div class="col col-md-4">
    <h2>Get started now</h2>
    <p>
      Create an account and get your business online
    </p>
    <p>
      Create unlimited companies, staff members and services. Bind them together and allow your customers to book your services with a simple HTML widget
    </p>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="modal" data-target=".registerModal" aria-haspopup="true" aria-expanded="false">Get an account now</button>
  </div>
  <div class="col col-md-4">
    <h2>Use the API</h2>
    <p>
      Our solution is fully API based.
    </p>
    <p>
      Create an account and integrate our application into your own platform of choice.
    </p>
    <p>
      You can create your own interface and have everything in one place
    </p>
    <a href="/bookrest/site/apidoc/apidoc.html" type="button" class="btn btn-info dropdown-toggle"  aria-haspopup="true" aria-expanded="false">See API documentation</a>

  </div>
</div>
<!-- <footer class='footer'>
</footer> -->

<!--modals-->
<!--LOGIN MODAL-->
<div class="modal fade loginModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div id="userImg">
          <img src="inc/img/user_normal.png">
        </div>
      </div>
      <div class="modal-body">
      <div class="userfeedback_login">
          
      </div>
        <form id="loginForm">
          <div class="form-group">
            <input type="hidden" name="method" value="login"/>
            <input type="text" class="form-control" name="email" placeholder="Email" id="email">
            <span class="glyphicon-class"></span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" id="password">
          </div>
          <div class="form-group">
            <button type="submit" onclick="user.login(); return false;" class="btn btn-default">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--LOGIN MODAL END-->
<!--REGISTER MODAL-->
<div class="modal fade registerModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div id="userImg">
          <img src="inc/img/user_normal.png">
        </div>
      </div>
      <div class="modal-body">
      <div class="userfeedback_reg">
          
      </div>
        <form id="registerForm">
          <div class="form-group">
            <input type="hidden" name="method" value="register"/>
            <input type="text" class="form-control" name="name" placeholder="Name*" id="name">
            <span class="glyphicon-class"></span>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="surname" placeholder="Surname*" id="Surname">
            <span class="glyphicon-class"></span>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email*" id="email">
            <span class="glyphicon-class"></span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password*" id="password">
          </div>
          <div class="form-group">
            <button type="submit" onclick="user.register(); return false;" class="btn btn-default">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--REGISTER MODAL END-->
<!--analytics code-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67145930-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
