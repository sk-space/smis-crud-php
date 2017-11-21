<?php
include('include/class.php');
error_reporting(0);
session_start(); 
  $username = $_SESSION['username'];
  
  $url_visit_1 = $user->url();  // for backend->index->mybackend link url
  echo '<br><br>THis is me'.$_SESSION['url_visit_1'] = $url_visit_1;
  $_SESSION['url_visit_2'] = $url_visit_1;   // for backend->view->dashboard(icon)
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Responsive Template</title>

    <link type="text/css" href="src/css/layout.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" href="src/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="src/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="src/css/bootstrap-theme.css" rel="stylesheet">
    <link type="text/css" href="src/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>


  <body>
    <?php
      include('header(cms).php');
    ?>
    
    <!--Main body-->
    <div class="container">
      <section class="main">
        <?php
          if(!isset($_SESSION['user'])){
            ?>
            <script type="text/javascript">alert("Log in first");</script><?php
            header("location: ../login.php");
          }
          else{
              include("dashboard.php");
          }
       ?>


      </section>
    </div>
    <!--End of body-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="src/js/jquery-2.2.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/js/bootstrap.min.js"></script>
  </body>
</html>