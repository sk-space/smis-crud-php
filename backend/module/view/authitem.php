<?php
    include('../../include/config.php');
    include('../../include/class.php');
    session_start();
    $id = $_GET['id'];

    $_SESSION['url_visit_2'] = $_SESSION['url_visit_1'];
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
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                <li>
                                    <i class="glyphicon glyphicon-home"></i>  <a href="<?php echo $_SESSION['url_visit_2']; ?>">Dashboard</a>
                                </li>
                                <li class="">
                                    <i class="glyphicon glyphicon-list"></i>  <a href="../authitem.php">Authitem</a>
                                </li>
                                <li class="active">
                                    <i class="glyphicon glyphicon-eye-open"></i> View
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Authitem</h3>
                        </div>
                            <?php
                            echo '<br><br>This is $id: '.$id;
                              $query = $user->viewAuthitem($id);
                              while($result = mysqli_fetch_assoc($query)){
                                
                                    echo "<pre>";
                                    print_r($result);
                                    echo "</pre>";
                                
                            }?>
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

