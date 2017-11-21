<?php
  include('include/class.php');
  include('view.php');
  error_reporting(0);
  session_start(); 
  $username = $_SESSION['username'];
  $_SESSION['url_visit_1'] = $_SESSION['url_visit_0'];
  $_SESSION['url_visit_1'] = $user->url();  // for backend->index->mybackend link url
  //echo '<br><br>THis is me '.$_SESSION['url_visit_1'];// = $url_visit_1;
  //echo '<br><br>THis is index '.$_SESSION['url_visit_0'];
  $_SESSION['url_visit_2'] = $_SESSION['url_visit_1'];   // for backend->view->dashboard(icon)
  include('header(cms).php');
?>  

<style type="text/css">
    section{
        border: 1px solid #ccc;
        padding: 20px 20px 0px;
    }
    .nav-tabs{
      padding-bottom: 20px;
    }
    .nav-tabs li a{
      margin: 0px;
      border-bottom: 1px solid #ddd;
    }
</style>
<!--Main body-->
<div class="container">
  <section class="main">
    <?php
      if(!isset($_SESSION['user'])){
        ?>
        <script type="text/javascript">alert("Log in first");</script><?php       
        header('location: ../frontend/login.php');

      }
      else{/*
          ?>
          <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Welcome -<strong style="text-transform: uppercase;">&nbsp;<?php echo $username ?></strong> to the Project Backend.
          </div>*/?>  
          <ul class="nav nav-tabs">
  <li role="presentation"><a href="adminpanel.php">Home</a></li>
  <li role="presentation"><a href="profile.php">Profile</a></li>
  <li role="presentation" class="active"><a href="message.php">Inbox <span class="badge btn-danger">42</span></a></li>
</ul><?php
          include("dashboard.php");
          include("modules.php");
          include("settings.php");
      }
   ?>


  </section>
</div>
<!--End of body-->
