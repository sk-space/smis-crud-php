<?php
//error_reporting(0);
// include('include/config.php');
include('include/class.php');
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $object->adminlogin($username, $password);

            if($result){
                $_SESSION['username'] = $username;
                header('location: ../backend/adminpanel.php');
            }
            else{?>
            <div class="alert alert-danger fade in" style="width: 60%; margin: auto;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Invalid!</strong> Use authenticate username and passowrd only.
              </div><?php
            }
    }
    include('view.php');
?>
    <body class="container bg">
        <form id="login-form" class="login-form" name="form1" method="post" action="">
            <div class="info h1">Admin Login Form</div>
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
    </body>

