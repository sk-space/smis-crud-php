<?php
    ob_start();
    include('../../include/config.php');
    include('../../include/class.php');
    include('view.php');

    session_start(); 
    $username = $_SESSION['username'];
    $query1 = $user->users();   // for postby_id
    $query2 = $user->users();   //for verified_id
    $result1 = mysqli_fetch_assoc($query1);
    $result2 = mysqli_fetch_assoc($query2);

    $id = $_GET['id'];    // current authority id
    $query = $user->viewAuthority($id);
    $result = mysqli_fetch_assoc($query);
    // echo '<br><br>new_ugid: '.$result['status'];
    $query01 = $user->viewAuthority($id);
    $result01 = mysqli_fetch_assoc($query01);
    $ugid = $result01['usergroup_id'];
    $aiid = $result01['authitem_id'];

    // echo '<br><br>'.$ugid.' and '.$aiid;
    // die();

    $query11 = $user->listUsergroup(); 
    // die();
    $query12 = $user->listItemgroup();
    $query13 = $user->listAuthitem();
    // echo '<br><br>'.$result['usergroup_id'];  // current authority name
    // echo '<br><br>This is me old '.$id.' and '.$title;

    if(isset($_POST['update'])){
      $new_id = $_POST['id'];
      $new_ugid = $_POST['usergroup'];
      $new_igid = $_POST['itemgroup'];
      $new_aiid = $_POST['authitem'];
      $access = $_POST['access'];
      $status = $_POST['status'];
      $postby_id = $_POST['postby_id'];
      $verifiedby_id = $_POST['verifiedby_id'];

      echo '<br><br>This is me new one ID: '.$new_id.' and UG: '.$new_ugid.' and IG: '.$new_igid.' and AI: '.$new_aiid.' and '.$access.' and '.$status.' and PID: '.$postby_id.' and VID:'.$verifiedby_id;
      // die();

      $query0 = $user->updateAuthority($id, $ugid, $aiid, $new_id, $new_ugid, $new_igid, $new_aiid, $access, $status, $postby_id, $verifiedby_id);
        
              if($query0 == 0){
                // echo 'suscesjflk';
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
      <section class="main">
        <div class="center">
            <ol class="breadcrumb">
                <li>
                    <i class="glyphicon glyphicon-home"></i><a href="<?php echo $_SESSION['url_visit_2']; ?>"> Dashboard</a>
                </li><li>
                    <i class="glyphicon glyphicon-leaf"></i> <a href="../authority.php">Authority</a>
                </li>
                <li class="active">
                    <i class="fa fa-cubes"></i> Update
                </li>
            </ol><br>
            <?php 
              if($query0 == 1){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Authority ID Already Exists !</strong> Choose Another ID.
                  </div><?php 
              }
              if($query0 == 2){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Authority Already Exists !</strong> Choose Another Authority Or Update Existing.
                  </div><?php                 
              }
              /*if($query0 == 3){?>
                  <div class="alert alert-warning fade in" style="width: 100%; margin: -20px 0px 20px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Authority Title Already Exists !</strong> Choose Another Title.
                  </div><?php                 
              }*/
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
                            <input type="text" class="form-control"  name="id" value="<?php echo $result['id']?>">
                          </div>
                        </div>                                        
                        <div class="form-group">
                            <label for="exampleInputName2"  class="control-label">Usergroup</label>
                            <div class="">
                                <?php
                                    echo "<select  class='form-control' id='exampleInputName2' name='usergroup'>";
                                    // echo "<option disabled selected>Select User</option>";
                                    echo "<option value='".$result['usergroup_id']."' selected readonly>".$result['usergroup']."</option>";
                                    while($result11 = mysqli_fetch_assoc($query11)){
                                      if($result['usergroup_id'] != $result11['id'])
                                        echo "<option value='".$result11['id']."'>".$result11['title']."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                        </div>                                  
                        <div class="form-group">
                            <label for="exampleInputName2"  class="control-label">Itemgroup</label>
                            <div class="">
                                <?php
                                    echo "<select  class='form-control' id='exampleInputName2' name='itemgroup'>";
                                    // echo "<option disabled selected>Select User</option>";
                                    echo "<option value='".$result['itemgroup_id']."' selected readonly>".$result['itemgroup']."</option>";
                                    while($result12 = mysqli_fetch_assoc($query12)){
                                      if($result['itemgroup_id'] != $result12['id'])
                                        echo "<option value='".$result12['id']."'>".$result12['title']."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName2"  class="control-label">Authitem</label>
                            <div class="">
                                <?php
                                    echo "<select  class='form-control' id='exampleInputName2' name='authitem'>";
                                    // echo "<option disabled selected>Select User</option>";
                                    echo "<option value='".$result['authitem_id']."' selected readonly>".$result['authitem']."</option>";
                                    while($result13 = mysqli_fetch_assoc($query13)){
                                      if($result['authitem_id'] != $result13['id'])
                                        echo "<option value='".$result13['id']."'>".$result13['title']."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName2"  class="control-label">Access</label>
                          <div class="">
                            <select class='form-control' id='exampleInputName2' name='access'>
                              <option disabled><i>Select Access</i></option>
                              <?php 
                                  if($result['access'] == 'NO'){
                                    echo "<option value = 'YES'>YES</option>";
                                    echo "<option value='NO' selected>".$result['access']."</option>";
                                  }
                                  else if($result['access'] == 'YES'){
                                      echo "<option value='YES' selected>".$result['access']."</option>";
                                      echo "<option value = 'NO'>NO</option>";
                                  }
                                  else{
                                    echo "<option value='' disabled selected>Select Access</option>";
                                      echo "<option value='YES'>YES</option>";
                                      echo "<option value = 'NO'>NO</option>";
                                  }
                              ?>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-6 right">
                        <div class="form-group">
                            <label for="exampleInputName2"  class="control-label">Post By</label>
                            <div class="">
                                <?php
                                    echo "<select  class='form-control' id='exampleInputName2' name='postby_id'>";
                                    // echo "<option disabled selected>Select User</option>";
                                    echo "<option value='".$result1['id']."' selected>".$result1['fullname']."</option>";
                                    while($result1 = mysqli_fetch_assoc($query1)){
                                        echo "<option value='".$result1['id']."'>".$result1['fullname']."</option>";
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
                                    while($result2 = mysqli_fetch_assoc($query2)){
                                        echo "<option value='".$result2['id']."'>".$result2['fullname']."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                        </div>
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
                    </div>
                </div>

                <div class="row submit">
                  <button type="submit" name="update" type="button" class="btn btn-primary">Update</button>
                </div>
              </form>
            </section>
        </div>
    </section>