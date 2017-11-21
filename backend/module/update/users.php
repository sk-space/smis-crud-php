<?php
    ob_start();
    include('../../include/config.php');
    include('../../include/class.php');
    include('view.php');

    session_start(); 
    $username = $_SESSION['username'];
    $query1 = $user->admin();   // for postby_id
    $query2 = $user->admin();   //for verified_id
    $result1 = mysqli_fetch_assoc($query1);
    // echo '<br><br>';
    // echo 'Admin Here: '.$result1['fullname'];
    $result2 = mysqli_fetch_assoc($query2);

    $id = $_GET['id'];    // current user id
    $query = $user->viewUsers($id);
    $result = mysqli_fetch_assoc($query);
    // echo '<br><br>Current Id: '.$id.' and Pwd: '.$result['password'].' and postby_id: '.$result1['fullname'].' and status '.$result['status'];
    // die();
    // echo '<br><br>';
    // while($result = mysqli_fetch_assoc($query)){
    //   echo '<pre>';
    //   print_r($result);
    //   echo '</pre>';
    // }
    // die();
    $query11 = $user->listUsergroup();
    // $result11 = mysqli_fetch_assoc($query11);

    if(isset($_POST['update'])){
      $new_fullname = $_POST['fullname'];
      $new_username = $_POST['username'];
      $new_email = $_POST['email'];
      $new_password = $_POST['password'];
      $new_cpassword = $_POST['cpassword'];
      $new_ugid = $_POST['usergroup_id'];
      $postby_id = $_POST['postby_id'];
      $verifiedby_id = $_POST['verifiedby_id'];
      $status = $_POST['status'];
      // echo '<br><br>New FullName: '.$new_fullname;
      // die();
      if($new_password != ''){
        if($new_password == $new_cpassword){
          // echo '<br><br>This is me NOT NULL:  '.$new_id.' and Pwd: '.$new_password;
          // die();
          // echo '<br><br>New FullName 00: '.$new_fullname;
          // die();
          $query0 = $user->updateUsers($id, $new_fullname, $new_username, $new_email, MD5($new_password), $new_cpassword, $new_ugid, $postby_id, $verifiedby_id, $status);
          if($query0 == 0){
            // echo 'suscesjflk';
            header('location: ../users.php');
          }
        }
      }
      else{
        $new_password = $result['password'];
        $new_cpassword = $result['password'];
        // echo '<br><br><br>This is me NULL: '.$new_id.' and Password: '.$new_password;
        // die();
          // echo '<br><br>New FullName 00: '.$new_fullname;
          // die();
        $query0 = $user->updateUsers($id, $new_fullname, $new_username, $new_email, $new_password, $new_cpassword, $new_ugid, $postby_id, $verifiedby_id, $status);
        if($query0 == 0){
          // echo 'suscesjflk';
          header('location: ../users.php');
        }
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
      <section class="main">
        <div class="center">
            <ol class="breadcrumb">
                <li>
                    <i class="glyphicon glyphicon-home"></i><a href="<?php echo $_SESSION['url_visit_2']; ?>"> Dashboard</a>
                </li><li>
                    <i class="glyphicon glyphicon-leaf"></i> <a href="../users.php">Users</a>
                </li>
                <li class="active">
                    <i class="fa fa-cubes"></i> Update
                </li>
            </ol><br>
            <?php 
              if($new_password != $new_cpassword){?>
                <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Password Do Not Match !</strong> Re-Enter Password Correctly Or Do Not Update.
                </div><?php 
              }
              /*if($query0 == 2){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>User ID Already Exists !</strong> Choose Another ID.
                  </div><?php                 
              }*/
              if($query0 == 3){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Username Already Exists !</strong> Choose Another Username.
                  </div><?php                 
              }
              if($query0 == 4){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Email Already Exists !</strong> Choose Another Email.
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
                          <label for="exampleInputName2"  class="control-label">ID</label>
                          <div class="">
                            <input type="text" class="form-control"  name="id" value="<?php echo $result['id']?>" disabled>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName2"  class="control-label">Full Name</label>
                          <div class="">
                            <input type="text" class="form-control"  name="fullname" value="<?php echo $result['fullname']?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName2"  class="control-label">Username</label>
                          <div class="">
                            <input type="text" class="form-control"  name="username" value="<?php echo $result['username']?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName2"  class="control-label">Email</label>
                          <div class="">
                            <input type="text" class="form-control"  name="email" value="<?php echo $result['email']?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName2"  class="control-label">Password</label>
                          <div class="">
                            <input type="password" class="form-control"  name="password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName2"  class="control-label">Confirm Password</label>
                          <div class="">
                            <input type="password" class="form-control"  name="cpassword">
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-6 right">
                        <div class="form-group">
                          <label for="exampleInputName2"  class="control-label">Status</label>
                          <div class="">
                            <select class='form-control' id='exampleInputName2' name='status'>
                              <option disabled><i>Select Status</i></option>
                              <?php 
                                  if($result['status'] == 'OFF'){
                                    echo "<option value = 'ON'>ON</option>";
                                    echo "<option value='OFF' selected>".$result['status']."</option>";
                                  }
                                  else if($result['status'] == 'ON'){
                                      echo "<option value='ON' selected>".$result['status']."</option>";
                                      echo "<option value = 'OFF'>OFF</option>";
                                  }
                                  else{
                                    echo "<option value='' disabled selected>Select Status</option>";
                                      echo "<option value='ON'>ON</option>";
                                      echo "<option value = 'OFF'>OFF</option>";
                                  }
                              ?>
                            </select>
                          </div>
                        </div>                                        
                        <div class="form-group">
                            <label for="exampleInputName2"  class="control-label">Usergroup</label>
                            <div class="">
                                <?php
                                    echo "<select  class='form-control' id='exampleInputName2' name='usergroup_id'>";
                                    // echo "<option disabled selected>Select User</option>";
                                    echo "<option value='".$result['usergroup_id']."' selected>".$result['usergroup']."</option>";
                                    while($result11 = mysqli_fetch_assoc($query11))
                                    {
                                      // echo '<br><br>Bla bla bla...'.$result11['id'];
                                      if($result['usergroup'] != $result11['title'])
                                        echo "<option value='".$result11['id']."'>".$result11['title']."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2"  class="control-label">Post By</label>
                            <div class="">
                                <?php
                                    echo "<select  class='form-control' id='exampleInputName2' name='postby_id'>";
                                    // echo "<option disabled selected>Select User</option>";
                                    echo "<option value='".$result1['id']."' selected>".$result1['fullname']."</option>";
                                    while($result = mysqli_fetch_assoc($query1)){
                                        echo "<option value='".$result['id']."'>".$result['fullname']."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName"  class="control-label">Verified By</label>
                            <div class="">
                                <?php
                                    echo "<select  class='form-control' id='exampleInputName' name='verifiedby_id'>";
                                    // echo "<option disabled selected>Select User</option>";
                                    echo "<option value='".$result2['id']."'>".$result2['fullname']."</option>";
                                    while($result = mysqli_fetch_assoc($query2)){
                                        echo "<option value='".$result['id']."'>".$result['fullname']."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row submit">
                  <button type="submit" name="update" type="button" class="btn btn-primary">Update</button>
                </div>
              </form>
            </section>
        </div>
    </section>