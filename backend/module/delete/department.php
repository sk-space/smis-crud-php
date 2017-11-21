<?php
ob_start();
  include('../../include/config.php');
  include('../../include/class.php');
  include('view.php');
    $id = $_GET['id'];
     // echo '<br><br>'.$id;
     // die();
    $query = $user->deleteDepartment($id);
    if($query == 1){
      header('location: ../department.php');
      ob_flush();
      exit();
    } 

?>