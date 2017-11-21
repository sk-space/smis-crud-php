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

  $sql = "SELECT * FROM `usergroup` WHERE `status` = 'ON'";
  $query1 = $user->execute($sql);
  $sql = "SELECT * FROM `authitem` WHERE `status` = 'ON'";
  $query2 = $user->execute($sql);
  $sql = "SELECT * FROM `itemgroup` WHERE `status` = 'ON'";
  $query3 = $user->execute($sql);
  /*
  while($result = mysqli_fetch_assoc($query1)){
    echo '<br><br><pre>';
    print_r($result['title']);
    echo '</pre>';
  }
  while($result = mysqli_fetch_assoc($query2)){
    echo '<br><br><pre>';
    print_r($result['title']);
    echo '</pre>';
  }
  die();*/

  $_SESSION['url_visit_3'] = $_SESSION['url_visit_2'];
  //echo '<br><br>This is me again '.$_SESSION['url_visit_3'];

  if(isset($_POST['create'])){ 
    $usergroup_id = $_POST['usergroup'];
    $authitem_id = $_POST['authitem'];
    $itemgroup_id = $_POST['itemgroup'];
    $access = $_POST['access'];
    $status = $_POST['status'];

    // echo '<br><br> Print: '.$usergroup_id.' and '.$authitem_id.' and '.$access;
    // die();

    $result = $user->createAuthority($usergroup_id, $authitem_id, $itemgroup_id, $access, $status, $id);
    if($result == 1){
        header('location: ../authority.php');
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
                    <i class="glyphicon glyphicon-leaf"></i> <a href="../authority.php">Authority</a>
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
                    <strong>Authority Already Set !</strong> Choose Another Parameters Or Update Existing.
                  </div><?php                  
                  // $result2 = mysqli_fetch_assoc($query2);
                }?>

            <section>
              <form class="form-horizontal" action="" method="post" >
                <div class="row">
                  <h4>Instutional Details</h4>
                  <!-- Selection Dropdown-->
                  <div class="col-sm-6 left">
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Select Usergroup</label>
                      <?php
                        echo "<select  class='form-control' id='exampleInputName2' name='usergroup'>";
                        echo "<option value='' disabled selected>Select Usergroup</option>";
                        while($result = mysqli_fetch_assoc($query1)){
                          echo "<option value='".$result['id']."'>".$result['title']."</option>";
                        }
                        echo "</select >";
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Select Itemgroup</label>
                      <?php
                        echo "<select  class='form-control' id='exampleInputName2' name='itemgroup'>";
                        echo "<option value='' disabled selected>Select Itemgroup</option>";
                        while($result = mysqli_fetch_assoc($query3)){
                          echo "<option value='".$result['id']."'>".$result['title']."</option>";
                        }
                        echo "</select >";
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Select Authitem</label>
                      <?php
                        echo "<select  class='form-control' id='exampleInputName2' name='authitem'>";
                        echo "<option value='' disabled selected>Select Authitem</option>";
                        while($result = mysqli_fetch_assoc($query2)){
                          echo "<option value='".$result['id']."'>".$result['title']."</option>";
                        }
                        echo "</select >";
                      ?>
                    </div>
                  </div>

                  <div class="col-sm-6 right">
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Select Access</label>
                      <select class='form-control' id='exampleInputName2' name='access'>
                          <option disabled selected><i>Select Status</i></option>
                          <option value='YES'>YES</option>
                          <option value = "NO">NO</option>
                        </select>
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
