<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>File board</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
    integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
    integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- custom style -->
    <link rel="stylesheet" href="<?php echo BASE_URL . '/css/custom.css';?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo BASE_URL ?>">Board site</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo BASE_URL ?>">Home</a></li>
          </ul>
          <?php
          $user = \Core\Auth::user();
          if (! \Core\Auth::check() ) { ?>
            <ul class="nav navbar-nav pull-right">
              <li><a href="<?php echo BASE_URL . '/auth/login';?>">Log In</a></li>
              <li><a href="<?php echo BASE_URL . '/auth/register';?>">Register</a></li>
            </ul>
          <?php } 
          if ( \Core\Auth::check() && isset($user['name']) ) { 
            ?>
          <ul class="nav navbar-nav pull-right" >
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="http://placehold.it/18x18" class="profile-image img-circle"> <?php echo $user['name'] ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo BASE_URL . '/auth/logout';?>">Log out</a></li>
                  </ul>
              </li>
          </ul>
          <?php } ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="content">
