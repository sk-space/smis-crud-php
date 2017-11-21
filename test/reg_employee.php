<!DOCTYPE html>
<?php
  include('include/config.php');
  include('include/class.php');

  if(isset($_POST['register'])){ 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usergroup_id = $_POST['usergroup'];

    $result = $object->register($first_name, $last_name, $address, $contact, $email, $username, $password);

    if($result == 1){
      echo '<script type="text/javascript">alert("Registration Sucessful");</script>';
      // Instance Login 
      $sql = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email'";
      $query = mysql_query($sql);
      $rows = mysql_fetch_assoc($query);
      echo '<pre>';
      print_r($rows);
      echo '</pre>'; 
      $result = $object->login($username, $password);
      $_SESSION['username'] = $username;
      header('location: backend.php');

    }
    else if($result == 2){
      echo '<script type="text/javascript">alert("Username and Email Already Used! ");</script>';
    }
    else if($result == 3){
      echo '<script type="text/javascript">alert("Username Already Taken! ");</script>';
    }
    else if($result == 4){
      echo '<script type="text/javascript">alert("Email already Exists! ");</script>';
    }
    else{
      echo '<script type="text/javascript">alert("Registration Fialed! Try Again");</script>';
    }  
  }
?>

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="src/js/jquery-2.2.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/js/bootstrap.min.js"></script>
  </body>
</html>
