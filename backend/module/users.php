<?php
// ob_start();
    include('../include/config.php');
    include('../include/class.php');
    include('view.php');
    session_start(); 
    $username = $_SESSION['username'];
    // echo '<br><br>$Username: '.$username;
    $_SESSION['url_visit_2'] = $_SESSION['url_visit_1'];
    $_SESSION['pageURL'] = $user->url();
    //echo '<br><strong>This is backpage url</strong> '.$_SESSION['url_visit_2'];
    if(!isset($_SESSION['user'])){?>
        <script type="text/javascript">alert("Log in first");</script><?php
        header("location: ../../frontend/login.php");
    }

    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
    // echo '<br><br>'.$username;  
    $query = $user->execute($sql);
    while($result = mysqli_fetch_array($query)){
        $ugid = $result['usergroup_id'];
        /*$aiid[] = $result['authitem_id'];
        $access[] = $result['access'];*/
    }
    // echo '<br><br> This is here: '.$ugid;

?>

<div class="container">
  <section class="main">
        <div id="wrapper">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-md-10">
                            <ol class="breadcrumb">
                                <li>
                                    <i class="glyphicon glyphicon-home"></i> <a href="<?php echo $_SESSION['url_visit_2']; ?>">Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="glyphicon glyphicon-list"></i> Users
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-2">
                            <ol style="list-style: none; ">
                                <li><i class="glyphicon glyphicon-list"></i>&nbsp;&nbsp;<a href="list/users.php">List</a></li>
                                <!-- <li><i class="glyphicon glyphicon-pencil" style="font-size:12px; border: solid 1px #F5F5F5;"></i>&nbsp;&nbsp;<a href="create/users.php">Create</a></li> -->
                                <?php
                                    if(/*($aiid[0] == 1 && $access[0] == 'YES') || */($ugid == 0 || $ugid == 1 || $ugid == 2)){
                                        echo '<li><i class="glyphicon glyphicon-pencil" style="font-size:12px; border: solid 1px #F5F5F5;"></i>&nbsp;&nbsp;<a href="create/users.php">Create</a></li>';
                                    }
                                    else{
                                        echo '<li><i class="glyphicon glyphicon-pencil" style="font-size:12px; border: solid 1px #F5F5F5;"></i>&nbsp;&nbsp;<a href="users.php"> X </a></li>';
                                    }
                                ?> 
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#on" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                <span class="text"><b> Users </b> <small><i>Status ON</i></small></span>
                              </a>
                            </li>
                            <li role="presentation" class="next">
                              <a href="#off" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
                                <span class="text"><b> Users </b> <small><i>Status OFF</i></small></span>
                              </a>
                            </li>
                        </ul><hr>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="on" aria-labelledby="home-tab">
                                <!-- Users Status On -->
                                <div class="panel panel-primary filterable">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><b> Users </b><small style="text-transform: capitalize;"><i>Status ON</i></small></h3>
                                    </div>
                                    <table class="table table-hover">
                                        <thead class="info">
                                            <tr class="filters">
                                                <th><b>S No.</b></th>
                                                  <th><b>ID</b></th>
                                                  <th><b>Username</b></th>
                                                  <th><b>Email</b></th>
                                                  <th><b>Password</b></th>
                                                  <!-- <th><b>Last Login</b></th> -->
                                                  <th><b>Usergroup</b></th>
                                                  <th><b>Posted By</b></th>
                                                  <th><b>Status</b></th>
                                                  <th></th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                            <?php 
                                              $i = 0;

                                              $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                              $limit = 15; //if you want to dispaly 10 records per page then you have to change here
                                              $startpoint = ($page * $limit) - $limit;
                                              $statement = "`users` WHERE `status` = 'ON' ORDER BY `id` DESC"; //you have to pass your query over here for the pagination
                                              // $sql = "SELECT * FROM {$statement} LIMIT {$startpoint}, {$limit}";
                                              $query = $user->execute($sql);

                                              $query = $user->onUsers($startpoint, $limit);
                                              // $result = mysqli_fetch_array($query);
                                              // echo '<br><br>Info: '.$result['username'];
                                              // die();
                                              while($result = mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>&nbsp;&nbsp;<?php echo $i; ?></td>
                                                    <td><?php echo $result['id']; ?></td>
                                                    <td><?php echo $result['username']; ?></td>
                                                    <td><?php echo $result['email']; ?></td>
                                                    <td><?php echo $result['password']; ?></td>
                                                    <!-- <td><?php echo $result['last_login']; ?></td> -->
                                                    <td><?php echo $result['title']; ?></td>
                                                    <td><?php echo $result['postby_id']; ?></td>
                                                    <td><?php echo $result['status']; ?></td>
                                                    <td>
                                                        <a href="view/users.php?id=<?php echo $result['id'] ?>">
                                                      <button class="btn btn-success btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                                    <a href="update/users.php?id=<?PHP echo $result['id']; ?>">
                                                      <button class="btn btn-primary btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i></button></a>
                                                    <a href="delete/users.php?id=<?PHP echo $result['id']; ?>"
                                                                onClick="return confirm('Are you sure to delete the record ? ')">
                                                              <button class="btn btn-danger btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-trash"></i></button></a>
                                                    </td>
                                                </tr><?php
                                            }
                                            ?>
                                          </tbody>
                                    </table>
                                </div>
                                <?php
                                    echo "<div id='pagingg' >";
                                    echo $user->pagination($statement, $limit, $page);
                                    echo "</div>";
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane  fade" id="off" aria-labelledby="profile-tab">
                                <!-- Users Status Off -->
                                <div class="panel panel-primary filterable">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><b> Users </b><small style="text-transform: capitalize;"><i>Status OFF</i></small></h3>
                                    </div>
                                    <table class="table table-hover">
                                        <thead class="info">
                                            <tr class="filters">
                                                <th><b>S No.</b></th>
                                                <th><b>Username</b></th>
                                                <th><b>Email</b></th>
                                                <!-- <th><b>Password</b></th> -->
                                                <!-- <th><b>Last Login</b></th> -->
                                                <th><b>Usergroup</b></th>
                                                <th><b>Posted By</b></th>
                                                <th><b>Status</b></th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                            <?php 
                                              $i = 0;

                                              $query = $user->offUsers();
                                              while($result = mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td>&nbsp;&nbsp;<?php echo $i; ?></td>
                                                    <td><?php echo $result['username']; ?></td>
                                                    <td><?php echo $result['email']; ?></td>
                                                    <!-- <td><?php echo $result['password']; ?></td> -->
                                                    <!-- <td><?php echo $result['last_login']; ?></td> -->
                                                    <td><?php echo $result['title']; ?></td>
                                                    <td><?php echo $result['postby_id']; ?></td>
                                                    <td><?php echo $result['status']; ?></td>
                                                    <td>
                                                        <a href="view/users.php?id=<?PHP echo $result['id'] ?>">
                                                      <button class="btn btn-success btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                                    <a href="update/users.php?id=<?PHP echo $result['id']; ?>">
                                                      <button class="btn btn-primary btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i></button></a>
                                                    <a href="delete/users.php?id=<?PHP echo $result['id']; ?>"
                                                                onClick="return confirm('Are you sure to delete the record ? ')">
                                                              <button class="btn btn-danger btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-trash"></i></button></a>
                                                    </td>
                                                </tr><?php
                                            }
                                            ?>
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    
                    
                        
                  <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
  </section>
</div>

