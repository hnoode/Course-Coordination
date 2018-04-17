<?php
	require("../connection.php");
?>	
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome Administrstor</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<nav class="navbar navbar-default" style="">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="../images/logo.png" class="img-responsive" style="padding:0px; margin-top: -20px; height:55px;" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      
      <ul class="nav navbar-nav navbar-right">
        <li  <?php if(!isset($_GET['p']) or $_GET['p'] == 'main') echo ' class="active" '; ?>><a href="index.php" >Welcome <i class="glyphicon glyphicon-user"></i> Admin.</a></li>
        <li <?php if(isset($_GET['p']) and ($_GET['p'] == 'majors' or $_GET['p'] == 'add_major')) echo ' class="active" '; ?>><a href="?p=majors">Majors</a></li>
        <li <?php if(isset($_GET['p']) and ($_GET['p'] == 'courses' or $_GET['p'] == 'add_course' or $_GET['p'] == 'course_details' or $_GET['p'] == 'filter_courses')) echo ' class="active" '; ?>><a href="?p=courses">Courses</a></li>
        <li <?php if(isset($_GET['p']) and ($_GET['p'] == 'posts' or $_GET['p'] == 'post_details' )) echo ' class="active" '; ?>><a href="?p=posts">Posts</a></li>
         <li  <?php if(isset($_GET['p']) and ($_GET['p'] == 'users' or $_GET['p'] == 'add_user')) echo ' class="active" '; ?>><a href="?p=users">Users</a></li>
          <li><a href="?p=logout">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="clearfix"></div>
<div class="container">
	<div class="row">
    	<div class="content" style="margin-top:60px; background-color:#FFF; padding: 10px;">