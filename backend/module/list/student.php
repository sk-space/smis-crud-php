<?php
	session_start();
 	$_SESSION['url_visit_2'];
    echo '<br><strong>This is backpage url</strong> '.$_SESSION['url_visit_1'];
?>

<div class="container">
	<section class="main">
		<?php
			include('view.php');
		?>


    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?php echo $_SESSION['url_visit_2']; ?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-list"></i> Employee
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                  <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Users</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th><b style="font-size:15px; color:#313131;">S No.</b></th>
                                <th><b style="font-size:15px; color:#313131;">Email</b></th>
                                <th><b style="font-size:15px; color:#313131;">Password</b></th>
                                <th><b style="font-size:15px; color:#313131;">Status</b></th>
                            </tr>
                        </thead>
                        <tbody>
                      	<?php 
                          $i = 0;
                          $query = $user->user();
                          while($result = mysql_fetch_array($query)){
                          	?>
                            <tr>
                                <?php $i++; ?>
                                <td>&nbsp;&nbsp;<?php echo $i; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $result['password']; ?></td>
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