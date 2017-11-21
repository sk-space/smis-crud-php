<?php
    include('../include/config.php');
    include('../include/class.php');
    session_start(); 
    $username = $_SESSION['username'];
    
    $_SESSION['url_visit_2'] = $_SESSION['url_visit_1'];
    $_SESSION['pageURL'] = $user->url();
    //echo '<br><strong>This is backpage url</strong> '.$_SESSION['url_visit_2'];
    if(!isset($_SESSION['user'])){?>
        <script type="text/javascript">alert("Log in first");</script><?php
        header("location: ../../frontend/login.php");
    }
    include('view.php');
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
                                    <i class="glyphicon glyphicon-list"></i> Usergroup
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-2">
                            <ol style="list-style: none; ">
                                <li><i class="glyphicon glyphicon-list"></i>&nbsp;&nbsp;<a href="list/usergroup.php">List</a></li>
                                <li><i class="glyphicon glyphicon-pencil" style="font-size:12px; border: solid 1px #F5F5F5;"></i>&nbsp;&nbsp;<a href="create/usergroup.php">Create</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#on" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                <span class="text"><b>Usergroup</b> <small><i>Status ON</i></small></span>
                              </a>
                            </li>
                            <li role="presentation" class="next">
                              <a href="#off" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
                                <span class="text"><b>Usergroup</b> <small><i>Status OFF</i></small></span>
                              </a>
                            </li>
                        </ul><hr>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="on" aria-labelledby="home-tab">
                                <!-- Usergroup Status On -->
                                <div class="panel panel-primary filterable">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"> User Groups <small style="text-transform: capitalize;"><i>Status ON</i></small></h3>
                                    </div>
                                    <table class="table">
                                        <thead class="info">
                                            <tr class="filters">
                                                <th>S.N.</th>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <!-- <th>Detail</th> -->
                                                <th>Code</th>
                                                <th>Created At</th>
                                                <th>Posted By</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $i = 1;

                                          $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                            $limit = 4; //if you want to dispaly 10 records per page then you have to change here
                                            $startpoint = ($page * $limit) - $limit;
                                            $statement = "`usergroup` WHERE `status` = 'ON' order by `id` ASC"; //you have to pass your query over here
                                            $sql = "SELECT * FROM {$statement} LIMIT {$startpoint}, {$limit}";
                                            $query = mysqli_query($connection, $sql);
                                          
                                          // $query = $user->onUsergroup();
                                          while($result = mysqli_fetch_assoc($query)){?>
                                            <tr class="filters">
                                                <td>&nbsp;&nbsp;<?php echo $i++; ?></td>
                                                <td><?php echo $result['id']; ?></td>
                                                <td><?php echo $result['title']; ?></td>
                                                <!-- <td><?php echo $result['details']; ?></td> -->
                                                <td><?php echo $result['code']; ?></td>
                                                <td><?php echo $result['created_at']; ?></td>
                                                <td><?php echo $result['postby_id']; ?></td>
                                                <td><?php echo $result['status']; ?></td>
                                                <td>
                                                    <a href="view/usergroup.php?id=<?PHP echo $result['id'] ?>">
                                                      <button class="btn btn-success btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                                    <a href="update/usergroup.php?id=<?PHP echo $result['id']; ?>">
                                                      <button class="btn btn-primary btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i></button></a>
                                                    <a href="delete/usergroup.php?id=<?PHP echo $result['id']; ?>"
                                                                onClick="return confirm('Are you sure to delete the record ? ')">
                                                              <button class="btn btn-danger btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-trash"></i></button></a>



                                                </td>
                                            </tr>
                                            <?php
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
                                <!-- Usergroup Status Off -->                                
                                <div class="panel panel-primary filterable">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"> User Group  <small style="text-transform: capitalize;"><i>Status OFF</i></small></h3>
                                    </div>
                                    <table class="table">
                                        <thead class="info">
                                            <tr class="filters">
                                                <th>S.N.</th>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <!-- <th>Detail</th> -->
                                                <th>Code</th>
                                                <th>Updated At</th>
                                                <th>Posted By</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                          $i = 1;

                                          $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                            $limit = 4; //if you want to dispaly 10 records per page then you have to change here
                                            $startpoint = ($page * $limit) - $limit;
                                            $statement = "`usergroup` WHERE `status` = 'OFF' order by `id` ASC"; //you have to pass your query over here

                                            $query = mysqli_query($connection, "select * from {$statement} LIMIT {$startpoint} , {$limit}");
                                          
                                          $query = $user->offUsergroup();
                                          while($result = mysqli_fetch_assoc($query)){?>
                                            <tr class="filters">
                                                <td>&nbsp;&nbsp;<?php echo $i++; ?></td>
                                                <td><?php echo $result['id']; ?></td>
                                                <td><?php echo $result['title']; ?></td>
                                                <!-- <td><?php echo $result['details']; ?></td> -->
                                                <td><?php echo $result['code']; ?></td>
                                                <td><?php echo $result['updated_at']; ?></td>
                                                <td><?php echo $result['postby_id']; ?></td>
                                                <td><?php echo $result['status']; ?></td>
                                                <td>
                                                   <a href="view/usergroup.php?id=<?PHP echo $result['id'] ?>">
                                                      <button class="btn btn-success btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-eye-open"></i></button></a>
                                                    <a href="update/usergroup.php?id=<?PHP echo $result['id']; ?>">
                                                      <button class="btn btn-primary btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i></button></a>
                                                    <a href="delete/usergroup.php?id=<?PHP echo $result['id']; ?>"
                                                                onClick="return confirm('Are you sure to delete the record ? ')">
                                                              <button class="btn btn-danger btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-trash"></i></button></a>



                                                </td>
                                            </tr>
                                            <?php
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

