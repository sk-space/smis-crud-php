<?php
ob_start();
  include('../../include/config.php');
  include('../../include/class.php');
  include('view.php');
    $id = $_GET['id'];
     // echo '<br><br>'.$id;
     // die();
    $query = $user->deleteAuthitem($id);
    if($query == 1){
      header('location: ../authitem.php');
      ob_flush();
      exit();
    } 

?>