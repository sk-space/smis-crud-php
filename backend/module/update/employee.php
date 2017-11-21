<?php
    include('../include/config.php');
    include('../include/class.php');
    session_start(); 
    $username = $_SESSION['username'];
    $_SESSION['url_visit_2'] = $_SESSION['url_visit_1'];
    //echo '<br><strong>This is backpage url</strong> '.$_SESSION['url_visit_2'];
    if(!isset($_SESSION['user'])){?>
        <script type="text/javascript">alert("Log in first");</script><?php
        header("location: ../../frontend/login.php");
    }
    include('view.php');
?>
<style type="text/css">
    section{
        border: 1px solid #ccc;
        padding-top: 20px;
    }
</style>

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
                                    <i class="glyphicon glyphicon-list"></i> Employee
                                </li>
                            </ol>
                        </div>
                        <div class="col-md-2">
                            <ol style="list-style: none; ">
                                <li><i class="glyphicon glyphicon-list"></i>&nbsp;&nbsp;<a href="">List</a></li>
                                <li><i class="fa fa-plus-square" style="font-size:17px;"></i>&nbsp;&nbsp;<a href="create/employee.php">Create</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Employees</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr class="filters">
                                    <th><b style="font-size:15px; color:#313131;">S No.</b></th>
                                    <!-- <th><b style="font-size:15px; color:#313131;">ID</b></th> -->
                                    <th><b style="font-size:15px; color:#313131;">First Name</b></th>
                                    <th><b style="font-size:15px; color:#313131;">Last Name</b></th>
                                    <th><b style="font-size:15px; color:#313131;">Address</b></th>
                                    <th><b style="font-size:15px; color:#313131;">Contact</b></th>
                                    <th><b style="font-size:15px; color:#313131;">Department</b></th>
                                    <th><b style="font-size:15px; color:#313131;">Designation</b></th>
                                    <th><b style="font-size:15px; color:#313131;">Appointed At</b></th>
                                    <th><b style="font-size:15px; color:#313131;">Status</b></th>
                                </tr>
                            </thead>
                            <tbody>
                          	<?php 
                              $i = 0;
                              $query = $user->employees();
                              while($result = mysql_fetch_assoc($query)){?>
                                <tr>
                                    <?php $i++; ?>
                                    <td>&nbsp;&nbsp;<?php echo $i; ?></td>
                                    <td><?php echo $result['first_name']; ?></td>
                                    <td><?php echo $result['last_name']; ?></td>
                                    <td><?php echo $result['address']; ?></td>
                                    <td><?php echo $result['contact']; ?></td>
                                    <td><?php echo $result['dept_name']; ?></td>
                                    <td><?php echo $result['title']; ?></td>
                                    <!-- <td><?php echo $result['apointed_at']; ?></td> -->
                                    <td><?php echo $result['status']; ?></td>
                                    <td>
                                        <a href="view1.php?id=<?PHP echo $result['id']; ?>">
                                          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                                        <a href="edit1.php?id=<?PHP echo $result['id']; ?>">
                                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a href="delete1.php?id=<?PHP echo $result['id']; ?>"
                                            onClick="return confirm('Are you sure to delete the record ? ')">
                                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                                </tr><?php
                            }
                            ?>
                            </tbody>
                        </table>
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

