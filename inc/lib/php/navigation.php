<?php 
	
	$nav = '';
	$loggedNav = '';





	$nav .= '<div class="navbar-header">';
    $nav .= '<a class="navbar-brand" href="/bookrest/site">';
    $nav .= '<img src="/bookrest/site/inc/img/bookfy.png" alt="Brand" id="logo"/>';
    $nav .= '</a>';
    $nav .= '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">';
    $nav .= '<span class="sr-only">Toggle navigation</span>';
    $nav .= '<span class="icon-bar"></span>';
    $nav .= '<span class="icon-bar"></span>';
    $nav .= '<span class="icon-bar"></span>';
    $nav .= '</button>';
    $nav .= '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
    $nav .= '<ul class="nav navbar-nav navbar-default navbar-right">';
    $nav .= '<li><a href="/bookrest/site">Home</a></li>';
    $nav .= '<li><a href="#" data-toggle="modal" data-target=".loginModal">Login</a></li>';
    $nav .= '<li><a href="#" data-toggle="modal" data-target=".registerModal">Register</a></li>';
    $nav .= '</ul>';
    $nav .= '</div>';
  	$nav .= '</div>';



	$loggedNav .= '<div class="navbar-header">';
    $loggedNav .= '<a class="navbar-brand" href="/bookrest/site">';
    $loggedNav .= '<img src="/bookrest/site/inc/img/bookfy.png" alt="Brand" id="logo"/>';
    $loggedNav .= '</a>';
    $loggedNav .= '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">';
    $loggedNav .= '<span class="sr-only">Toggle navigation</span>';
    $loggedNav .= '<span class="icon-bar"></span>';
    $loggedNav .= '<span class="icon-bar"></span>';
    $loggedNav .= '<span class="icon-bar"></span>';
    $loggedNav .= '</button>';
    $loggedNav .= '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
    $loggedNav .= '<ul class="nav navbar-nav navbar-default navbar-right">';
    $loggedNav .= '<li><a href="/bookrest/site">Home</a></li>';  	
    $loggedNav .= '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My account<span class="caret"></span></a>';
    $loggedNav .= '<ul class="dropdown-menu">';
    $loggedNav .= '<li><a href="/bookrest/site/views/account.php">Bookings</a></li><li role="separator" class="divider"></li>';
    $loggedNav .= '<li><a href="/bookrest/site/views/settings.php">Settings</a></li><li role="separator" class="divider"></li>';
    $loggedNav .= '<li><a href="/bookrest/site/views/company.php">Company</a></li><li role="separator" class="divider"></li>';
    $loggedNav .= '<li><a href="/bookrest/site/views/widget.php">Widget</a></li>';
    $loggedNav .= '</ul></li>';
    $loggedNav .= '<li><a href="" onclick="user.logout();return false;">Logout</a></li>';
    $loggedNav .= '</ul>';
  	$loggedNav .= '</div>';
    $loggedNav .= '</div>';

 ?>