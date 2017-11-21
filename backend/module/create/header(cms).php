<?php
//error_reporting(0);
session_start(); 
  $username = $_SESSION['username'];
  $index = $_SESSION['url_visit_0'];
?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo $index ?>" class="navbar-brand" style="margin-right: 20px;">PS Softs</a>
        </div> <!-- End Header -->

        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">home</a></li>
            <li><a href="#about" data-toggle="modal">Welcome -<strong style="color: #DDD; text-transform: uppercase;">&nbsp;<?php echo $username; ?></a></strong></li> 
            <!--setting start-->
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">settings <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $index; ?>">view home page</a></li>
                <li><a href="#">change password</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo 'http://localhost/project/frontend/logout.php' ?>">log out</a></li>
              </ul>
            </li>
              <!--end of setting dropdown-->      
          </ul>
      </div>
    </nav>

    <!-- About Modal -->
    <div class="container">
      <div class="modal fade" id="about" role="dialog"> 
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title">Modal</h3>
            </div>
            <div class="modal-body">
              <p>This is a public service announcement this is only a test.</p>
            </div>
            <div class="modal-footer">              
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End of About Modal -->