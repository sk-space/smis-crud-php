<!DOCTYPE html>

<?php
error_reporting(0);
include('include/config.php');
include('include/class.php');
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $object->login($username, $password);

            if($result == 1){
                $_SESSION['username'] = $username;
                $result = $object->adminCheck($username);
                if($result == 1)
                    header('location: ../backend/adminpanel.php');
                else
                    header('location: ../backend/index.php');
            }
            else{?>
            <div class="alert alert-danger fade in" style="width: 60%; margin: auto;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Invalid!</strong> Use authenticate username and passowrd only.
              </div><?php
            }
    }
?>
<html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="src/css/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="src/css/bootstrap.css" rel="stylesheet">
        <link href="src/css/bootstrap.min.css" rel="stylesheet">
        <link href="src/css/bootstrap-theme.css" rel="stylesheet">
        <link href="src/css/bootstrap-theme.min.css" rel="stylesheet">
    </head>
    <body class="bg">
        <form id="login-form" class="login-form" name="form1" method="post" action="">
            <div class="h1">Login Form</div>
            <div id="form-content">
                <div class="group">
                    <label for="email">Username</label>
                    <div><input id="email" name="username" class="form-control required" type="name" placeholder="Username" required autofocus></div>
                </div>
               <div class="group">
                    <label for="name">Password</label>
                    <div><input id="password" name="password" class="form-control required" type="password" placeholder="Password" required></div>
                </div>
                <div class="group submit">
                    <label class="empty"></label>
                    <div><input name="submit" type="submit" value="Submit" >
                    <a href="index.php"><button type="button" class="btn btn-info button">Home</button></a></div>
                </div>
            </div>
        </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="src/js/jquery-2.2.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/js/bootstrap.min.js"></script>
    </body>
</html>

