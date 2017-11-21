<?php
  ob_start();
  include('../../include/config.php');
  include('../../include/class.php');
  include('view.php');
  //session_start();

  /*** FOR POST BY ID ***/
  $username;
  $sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
  $query = $user->execute($sql);
  while($row = mysqli_fetch_assoc($query)){
    $id = $row['id'];
  }
  /*** FOR POST BY ID ***/

  $_SESSION['url_visit_3'] = $_SESSION['url_visit_2'];
  //echo '<br><br>This is me again '.$_SESSION['url_visit_3'];

  if(isset($_POST['create'])){ 
    $title = $_POST['title'];
    $remarks = $_POST['remarks'];
    $status = $_POST['status'];

    // echo '<br><br> Print: '.$title.' and '.$detail.' and '.$code;
    // die();

    $result = $user->createItemgroup($title, $remarks, $status, $id);
    if($result == 1){
        header('location: ../itemgroup.php');
    }
  }
?>
    <style type="text/css">
      section{
        border: 1px solid #ccc;
        padding: 20px 50px;
      }
      .submit{
        margin-top: 25px;
      }
      .left{
        width: 45%;
        margin-right: 50px;
        margin-left: 0px;
      }      
      .right{
        width: 45%;
      }
      .bg{
        background-color: #eee;
        border-radius: 5px;
      }
    </style>
    <div class="container">
      <section class="main create">
        <div class="center">
            <ol class="breadcrumb">
                <li>
                    <i class="glyphicon glyphicon-home"></i><a href="<?php echo $_SESSION['url_visit_2']; ?>"> Dashboard</a>
                </li><li>
                    <i class="glyphicon glyphicon-leaf"></i> <a href="../itemgroup.php">Itemgroup</a>
                </li>
                <li class="active">
                    <i class="fa fa-cubes"></i> Create
                </li>
            </ol><br>

                 <!--  <div class="alert alert-success fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Department Created Sucessfully !</strong>
                  </div> -->
                  <?php 
                if($result == 2){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Itemgroup Already Exists !</strong> Choose Another Title.
                  </div><?php          
                }?>
            <section>
              <form class="form-horizontal" action="" method="post" >
                <div class="row">
                  <h4>Instutional Details</h4>
                  <!-- Selection Dropdown-->
                  <div class="col-sm-6 left">
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Itemgroup Title</label>
                      <div class="">
                        <input type="text" class="form-control"  name="title" placeholder="Enter Itemgroup">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Description</label>
                      <div class=""><i>
                        <textarea rows="4" cols="46" name='remarks' placeholder=" About The Itemgroup..."></textarea></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 right">
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Status</label>
                      <div class="">
                        <select class='form-control' id='exampleInputName2' name='status'>
                          <option disabled selected><i>Select Status</i></option>
                          <option value='ON'>ON</option>
                          <option value = "OFF">OFF</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row submit">
                  <button type="submit" name="create" type="button" class="btn btn-primary">Create</button>
                </div>
              </form>
            </section>
        </div>
    </section>
    </div>
