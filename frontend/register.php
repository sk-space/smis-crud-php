<?php
  include('include/config.php');
  $sql = "SELECT * FROM `usergroup` WHERE `code` LIKE 'Register'";

?>
<!DOCTYPE HTML>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Responsive Template</title>

    <link href="src/css/layout.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="src/css/bootstrap.css" rel="stylesheet">
    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/bootstrap-theme.css" rel="stylesheet">
    <link href="src/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="container">
      <div class="dropdown">
        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Usergroup
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dLabel">
          <li data-toggle="modal" data-target="#emp_regform">A</li>
          <li data-toggle="modal" data-target="#std_regform">B</li>
        </ul>
      </div>
    </div>

    <!--Employee Registration Form Modal-->
    <div class="modal fade" id="emp_regform" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Employee Registration Form</h4>
          </div>
          <div class="modal-body">
            <div>
              <h2>Register Here</h2>
              <form name="registration" action="" method="POST">
                <div class="form-group left">
                  <label for="exampleInputEmail1">User Group</label>
                <input class="form-control" id="disabledInput" type="text" name="usergroup" value="3" disabled>
                </div>
                <div class="form-group left">
                <select class="form-control">
                  <option>Select Department</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
                <select class="form-control">
                  <option>Select Designation</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <select class="form-control">
                  <option>Select Employee Type</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>

                <div class="form-group left">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter full name" required>
                </div>
                <div class="form-group left">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter full name" required>
                </div>    
                <div class="form-group right">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter contact" required>
                </div>
                <div class="form-group right">
                  <label for="exampleInputEmail1">Contact</label>
                  <input type="text" name="contact" class="form-control" id="exampleInputEmail1" placeholder="Enter contact" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" required>
                </div>
                <div class="form-group left">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="register" type="button" class="btn btn-primary">Submit</button>
            <a href="login.php"><input type="button" class="btn btn-default" value="Sign In"></a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--Student Registration Form Modal-->
    <div class="modal fade" id="std_regform" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Student Registration Form</h4>
          </div>
          <div class="modal-body">
            <div>
              <h2>Register Here</h2>
              <form name="registration" action="" method="POST">
                <div class="form-group left">
                  <label for="exampleInputEmail1">User Group</label>
                <input class="form-control" id="disabledInput" type="text" name="usergroup" value="4" disabled>
                </div>
                <div class="form-group left">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter full name" required>
                </div>
                <div class="form-group left">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter full name" required>
                </div>    
                <div class="form-group right">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter contact" required>
                </div>

                <div class="form-group right">
                  <label for="exampleInputEmail1">Parents Full Name</label>
                  <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter contact" required>
                </div>
                <div class="form-group right">
                  <label for="exampleInputEmail1">Contact</label>
                  <input type="text" name="contact" class="form-control" id="exampleInputEmail1" placeholder="Enter contact" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" required>
                </div>
                <div class="form-group left">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="register" type="button" class="btn btn-primary">Register</button>
            <a href="login.php"><input type="button" class="btn btn-default" value="Sign In"></a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="src/js/jquery-2.2.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/js/bootstrap.min.js"></script>
  </body>

</html>