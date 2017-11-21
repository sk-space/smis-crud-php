<?php 
  session_start();
  include('include/class.php');
  include('../backend/include/class.php');

  $_SESSION['url_visit_0'] = $user->url();
  echo '<br><br>This is first url: '.$_SESSION['url_visit_0'];// = $url_visit_0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Responsive Template</title>
    <link href="../backend/src/css/layout.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../backend/src/css/bootstrap.css" rel="stylesheet">
    <link href="../backend/src/css/bootstrap.min.css" rel="stylesheet">
    <link href="../backend/src/css/bootstrap-theme.css" rel="stylesheet">
    <link href="../backend/src/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


  <body>
      <?php
        if(!isset($_SESSION['user'])){
          include("headin.php"); 
        }
        else{
          include("headout.php");
        }
     ?>

    <!-- Jumbotron -->
    <div class="jumbotron">
      <div class="container text-center">
        <h1>PS SOFTS</h1>
        <p>Whatever you want to add in here</p>
        <div class="btn-group">
          <a  class="btn btn-lg btn-warning">Download </a>
          <a  class="btn btn-lg btn-default">Download </a>
          <a  class="btn btn-lg btn-warning">Download </a> 
        </div>
      </div>  <!-- End Container -->
    </div> <!-- End Jumbotron -->

    <!-- About -->
    <div class="container">
      <section>
        <div class="page-header" id="about">
          <h3>About Me</h3>
        </div>

        <div class="row">
          <div class="col-md-4">
            <blockquote>
              <p>This is the section the for about me. This is the section for about me. This is the section for about me. This is the section from is the for about me. This is the section for about me. This is the section for about me. </p>
              <footer>Mr. Suman Kaiti</footer>
            </blockquote>
          </div>

          <div class="col-md-4">
            <blockquote>
              <p>This is the section the for about me. This is the section for about me. This is the section for about me. This is the section from is the for about me. This is the section for about me. This is the section for about me.</p>
              <footer>Mr. Suman Kaiti</footer>
            </blockquote>
          </div>

          <div class="col-md-4">
            <blockquote>
              <p>This is the section the for about me. This is the section for about me. This is the section for about me. This is the section from is the for about me. This is the section for about me. This is the section for about me.</p>
              <footer>Mr. Suman Kaiti</footer>
            </blockquote>
          </div>

        </div> <!-- End Row -->
      </section>
    </div>  <!-- End About Container -->

    <!-- Slider -->
    <div class="container">
      <section>
        <div class="page-header" id="slider">
          <h3>Slider</h3>
        </div>

        <div class="carousel slide" id="screenshot-carousel" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#screenshot-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#screenshot-carousel" data-slide-to="1"></li>
            <li data-target="#screenshot-carousel" data-slide-to="2"></li>
            <li data-target="#screenshot-carousel" data-slide-to="3"></li>
            <li data-target="#screenshot-carousel" data-slide-to="4"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="src/images/1.jpg" >
              <div class="carousel-caption">
                <h3>Laptop Image One</h3>
                <p>Little description for image one</p>
              </div>
            </div>
            <div class="item">
              <img src="src/images/2.jpg" >
              <div class="carousel-caption">
                <h3>Laptop Image Two</h3>
                <p>Little description for image two</p>
              </div>
            </div>
            <div class="item">
              <img src="src/images/3.jpg" >
              <div class="carousel-caption">
                <h3>Laptop Image Three</h3>
                <p>Little description for image three</p>
              </div>
            </div>
            <div class="item">
              <img src="src/images/4.jpg" >
              <div class="carousel-caption">
                <h3>Laptop Image Four</h3>
                <p>Little description for image four</p>
              </div>
            </div>
            <div class="item">
              <img src="src/images/5.jpg" >
              <div class="carousel-caption">
                <h3>Laptop Image Five</h3>
                <p>Little description for image five</p>
              </div>
            </div>
          </div><!-- end Carousel inner -->
          <a href="#screenshot-carousel" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a href="#screenshot-carousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div><!-- end Carousel -->
        <hr>
      </section>
    </div><!-- End of Slider -->

    <!-- Features -->
    <div class="container">
      <section>
        <div class="page-header" id="features">
          <h2>Features: <small>Something about the features</small></h2>
        </div>
        <div class="row">
          <div class="col-md-8">
            <h2>This is the heading</h2>
            <p>How to Apply Crack ? Open Crack Folder Open Unpark Core Folder Open UnparkCore.exe Click  heck Status And Click Unpark All Cores Copy the Crack .zip to game Directory and unzip Open Origin.Games.Reg.tools.exe (You wont See anything happen its automatic) Open Fifa Alltechs .reg File Click Yes Open Launcher</p>
          </div>
          <div class="col-md-4">
            <img src="src/images/4.jpg" class="img-responsive">
          </div>
        </div><!--end of row-->
        <hr>
        <div class="row">
          <div class="col-md-8">
            <h2>This is the heading</h2>
            <p>How to Apply Crack ? Open Crack Folder Open Unpark Core Folder Open UnparkCore.exe Click  heck Status And Click Unpark All Cores Copy the Crack .zip to game Directory and unzip Open Origin.Games.Reg.tools.exe (You wont See anything happen its automatic) Open Fifa Alltechs .reg File Click Yes Open Launcher</p>
          </div>
          <div class="col-md-4">
            <a href=""><img src="src/images/3.jpg" class="img-responsive"></a>
          </div>
        </div><!--end of row-->
        <hr>
        <div class="row">
          <div class="col-md-8">
            <h2>This is the heading</h2>
            <p>How to Apply Crack ? Open Crack Folder Open Unpark Core Folder Open UnparkCore.exe Click  heck Status And Click Unpark All Cores Copy the Crack .zip to game Directory and unzip Open Origin.Games.Reg.tools.exe (You wont See anything happen its automatic) Open Fifa Alltechs .reg File Click Yes Open Launcher</p>
          </div>
          <div class="col-md-4">
            <img src="src/images/1.jpg" class="img-responsive">
          </div>
        </div><!--end of row-->
        <hr>
        <div class="row">
          <div class="col-md-8">
            <h2>This is the heading</h2>
            <p>How to Apply Crack ? Open Crack Folder Open Unpark Core Folder Open UnparkCore.exe Click  heck Status And Click Unpark All Cores Copy the Crack .zip to game Directory and unzip Open Origin.Games.Reg.tools.exe (You wont See anything happen its automatic) Open Fifa Alltechs .reg File Click Yes Open Launcher</p>
          </div>
          <div class="col-md-4">
            <img src="src/images/2.jpg" class="img-responsive">
          </div>
        </div><!--end of row-->
        <hr>

        <div class="row">
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <span class="glyphicon glyphicon-envelope"></span>
                <h3>Additional Feature</h3>
                <p>Some additional features description. Its just displays some introductions of the features. Some additional features description. Its just displays some introductions of the features.</p>
              </div>
            </div>
          </div><!--end of col-md-4-->
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <span class="glyphicon glyphicon-pencil"></span>
                <h3>Additional Feature</h3>
                <p>Some additional features description. Its just displays some introductions of the features. Some additional features description. Its just displays some introductions of the features.</p>
              </div>
            </div>
          </div><!--end of col-md-4-->
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <span class="glyphicon glyphicon-ok"></span>
                <h3>Additional Feature</h3>
                <p>Some additional features description. Its just displays some introductions of the features. Some additional features description. Its just displays some introductions of the features.</p>
              </div>
            </div>
          </div><!--end of col-md-4-->
        </div><!--end of row-->
      </section>
    </div>
    <!-- End of Features -->

    <!-- call to action -->
    <section>
      <div class="well">
        <div class="container text-center">
          <h3>Subscribe for more free stuffs</h3>
          <p>Enter your name and email</p>

          <form action="" class="form-inline">
            <div class="form-group">
              <label for="subscription">Subscribe</label>
              <input type="text" class="form-control" id="subscription" placeholder="Your Name" />
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="text" class="form-control" id="email" placeholder="Your Email" />
            </div>
            <button type="submit" class="btn btn-default">Subscribe</button>
            <hr>
          </form>

        </div>
      </div>
    </section>
    <!-- end call to action -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../backend/src/js/jquery-2.2.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../backend/src/js/bootstrap.min.js"></script>
  </body>
</html>