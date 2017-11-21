<?php
  ob_start();
  include('../../include/config.php');
  include('../../include/class.php');
  include('view.php');
  //session_start();

  /*** FOR POST BY ID ***/
  $username;  // came from the module->users.php to identify the current admin
  echo '<br><br>Username: '.$username;
  $sql = "SELECT * FROM `admin` WHERE `username` = '$username' ";
  $query = $user->execute($sql);
  while($row = mysqli_fetch_assoc($query)){
    $id = $row['id'];
  }
  echo '<br>ID: '.$id;
  /*** FOR POST BY ID ***/

  $sql1 = "SELECT * FROM `usergroup` WHERE `status` = 'ON'";
  $query1 = $user->execute($sql1);

  $_SESSION['url_visit_3'] = $_SESSION['url_visit_2'];
  //echo '<br><br>This is me again '.$_SESSION['url_visit_3'];

  if(isset($_POST['create'])){ 
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $usergroup_id = $_POST['usergroup'];
    $status = $_POST['status'];



    // echo '<br><br> Print: FULLNAME: '.$fullname.' and USERNAME: '.$username.' and USERGROUP: '.$usergroup_id.' and EMAIL: '.$email.' and PASSWORD: '.$password.' and STATUS: '.$status;
    // die();
    if($password == $cpassword){
      // echo '<br><br> Print: PASSWORD: '.$password.' and C-PASSWORD: '.$cpassword;
      // die();
      if($usergroup_id == 1 || $usergroup_id == 2){
        // echo '<br><br> Print: UG_ID: '.$usergroup_id;
        // die();
        $result = $user->createAdmin($id, $fullname, $username, $email, MD5($password), $usergroup_id, $status);
        // $result2 = $user->createUsers($fullname, $username, $email, $password, $usergroup_id, $status);
        if($result == 1){
          header('location: ../users.php');
        }
      }else{
        $result = $user->createUsers($id, $fullname, $username, $email, MD5($password), $usergroup_id, $remarks, $status);
        if($result == 1){
            header('location: ../users.php');
        }
      }
    }

    /*if($result == 1){
      // echo '<script type="text/javascript">alert("Department Created Sucessfully ");</script>';
?>
      <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Department Created Sucessfully.
          </div><?php
      header('location: ../department.php');

    }*/
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
      <section class="main">
        <div class="center">
            <ol class="breadcrumb">
                <li>
                    <i class="glyphicon glyphicon-home"></i><a href="<?php echo $_SESSION['url_visit_2']; ?>"> Dashboard</a>
                </li><li>
                    <i class="glyphicon glyphicon-leaf"></i> <a href="../users.php">Users</a>
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

                if($password != $cpassword){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Password Do Not Match !</strong> Re-Enter Password Correctly.
                  </div><?php 
                }
                if($result == 2){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Username Already Taken !</strong> Choose Another Username Or Update Existing One.
                  </div><?php          
                }
                if($result == 3){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Email Already Taken !</strong> Choose Another Email Or Update Existing One.
                  </div><?php          
                }
                if($result == 4){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Username And Email Already Taken !</strong> Choose Another Username and Email Or Update Existing One.
                  </div><?php          
                }
                ?>
            <section>
              <form class="form-horizontal" action="" method="post" >
                <div class="row">
                  <h4>Instutional Details</h4>
                  <!-- Selection Dropdown-->
                  <div class="col-sm-6 left">
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Full Name</label>
                      <div class="">
                        <input type="text" class="form-control"  name="fullname" placeholder="Enter Full Name" autofocus  >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Username</label>
                      <div class="">
                        <input type="text" class="form-control"  name="username" placeholder="Enter Username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Email</label>
                      <div class="">
                        <input type="email" class="form-control"  name="email" placeholder="Enter Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Password</label>
                      <div class="">
                        <input type="password" class="form-control"  name="password" placeholder="Enter Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Confirm Password</label>
                      <div class="">
                        <input type="password" class="form-control"  name="cpassword" placeholder="Confrim Password">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 right">
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
                  <button type="submit" name="create" class="btn btn-primary">Create</button>
                </div>
              </form>
            </section>
        </div>
    </section>
    </div>
