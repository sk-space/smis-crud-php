<?php
  include('../../include/config.php');
  include('../../include/class.php');
  include('view.php');

  $_SESSION['url_visit_3'] = $_SESSION['url_visit_2'];
  //echo '<br><br>This is me again '.$_SESSION['url_visit_3'];

  if(isset($_POST['create'])){ 
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $paddress = $_POST['paddress'];
    $taddress = $_POST['taddress'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $usergroup_id = $_POST['usergroup'];
    $department_id = $_POST['department'];
    $designation_id = $_POST['designation'];
    $employeetype_id = $_POST['employeetype'];

    echo '<br><br>This is not sent yet '.$department_id;

    $result = $user->register($first_name, $middle_name, $last_name, $paddress, $taddress, $contact, $email, $usergroup_id, $department_id, $designation_id, $employeetype_id);

    if($result == 1){
      echo '<script type="text/javascript">alert("Registration Sucessful");</script>';
      // Instant Login 
      /*$sql = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email'";
      $query = mysql_query($sql);
      $rows = mysql_fetch_assoc($query);
      echo '<pre>';
      print_r($rows);
      echo '</pre>'; 
      $result = $object->login($username, $password);
      $_SESSION['username'] = $username;*/
      header('location: ../employees.php');

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
                    <i class="glyphicon glyphicon-user"></i> <a href="../employee.php">Employees</a>
                </li>
                <li class="active">
                    <i class="fa fa-user-plus"></i> Create
                </li>
            </ol><br>
            <section>
              <form class="form-horizontal" action="" method="post" >
                <div class="row">
                  <h4>Instutional Details</h4>
                  <!-- Selection Dropdown-->
                  <div class="col-sm-6 left">
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">User Group</label>
                      <div class="">
                        <input type="text" value="3" class="form-control"  name="usergroup" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Select Department</label>
                      <div class="">
                        <?php
                          $query = $user->department();
                          echo "<select class='form-control' id='exampleInputName2' name='department'>";
                            echo "<option disabled selected><i>Select Department</i></option>";
                            while ($row = mysql_fetch_array($query)) {
                              echo "<option value='" . $row['id'] ."'>" . $row['dept_name'] ."</option>";
                            }
                          echo "</select>";
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Select Designation</label>
                      <div class="">
                        <?php
                          $sql = "SELECT * FROM `designation`";
                          $query = mysql_query($sql);
                          // $query = $user->designation();
                          echo "<select class='form-control' id='exampleInputName2' name='designation'>";
                            echo "<option disabled selected><i>Select Designation</i></option>";
                            while($row = mysql_fetch_assoc($query)){
                              echo "<option value='".$row['id']."'>".$row['title']."</option>";
                            }
                          echo "</select>";
                        ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Select Employee Type</label>
                      <div class="">
                        <?php
                          $sql = "SELECT * FROM `employeetype`";
                          $query = mysql_query($sql);
                          echo "<select class='form-control' id='exampleInputName2' name='employeetype'>";
                            echo "<option disabled selected><i>Select Employee Type</i></option>";
                            while($row = mysql_fetch_assoc($query)){
                              echo "<option value='".$row['id']."'>".$row['title']."</option>";
                            }
                          echo "</select>";
                        ?>
                      </div>
                    </div>
                  </div>
                  <!-- End of Selection Dropdown -->

                  <!-- Uploads -->
                  <div class="col-sm-6  right">
                    <div class="form-group ">
                      <label for="exampleInputName2"  class="control-label">Select Your Photo</label>
                      <input class="btn" type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputName2"  class="control-label">Upload Your Citizenship</label>
                      <input class="btn" type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputName2"  class="control-label">Upload Your Resume</label>
                      <input class="btn" type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                  </div>
                  <!-- End of uploads -->
                </div>
                <br><br>
                <div class="row">
                  <h4>Personal Details</h4>
                  <div class="col-sm-6 left">
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">First Name</label>
                      <div class="">
                        <input name="first_name" type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Middle Name</label>
                      <div class="">
                        <input name="middle_name" type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Last Name</label>
                      <div class="">
                        <input name="last_name" type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Permanent Address</label>
                      <div class="">
                        <input name="paddress" type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 right">
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Contact Number</label>
                      <div class="">
                        <input name="contact" type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Email</label>
                      <div class="">
                        <input name="email" type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName2"  class="control-label">Current Address</label>
                      <div class="">
                        <input name="taddress" type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row submit">
                  <button type="submit" name="create" type="button" class="btn btn-primary">Register</button>
                </div>
              </form>
            </section>
        </div>
    </section>
    </div>
