<?php
error_reporting(0);
session_start(); 
  $username = $_SESSION['username'];
  echo '<br><br>'.$_SESSION['url_visit_1'];   // url from backend page and view page 
?>



<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar-wrap">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php" class="navbar-brand" style="margin-right: 20px;">PS Softs</a>
        </div> <!-- End Header -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">home</a></li>
            <li><a href="#about">about</a></li>
            <li><a href="">resume</a></li>
            <li><a href="<?php echo $_SESSION['url_visit_1']; ?>">my backend</a></li>
          </ul>
          
          <a href="logout.php" class="btn btn-danger navbar-btn navbar-right">Log Out</a>
        </div>
      </div> <!-- End Container -->
    </nav> <!-- End Navbar -->