<?php
// session_start();
// include('../include/config.php');
// include('../include/class.php');
//include('view.php');
include('search/department.php');
include('search/designation.php');
?>
<style>
.correction{
	margin-left: -15px;
	width: 96.5%;
}
.danger{
	color: red;	
}
table th{
	background-color: #337ab7;
	color: #eeefff;
}

</style>
<?php
$output = '';

$query = $_SESSION['data'];
// $sql = "SELECT DISTINCT `department`.`id` as `id`, `department`.`dept_name` as `name`, `department`.`created_at` as `created_at`, `department`.`updated_at` as `updated_at`, `admin`.`fullname` as `postby` FROM `department` INNER JOIN `admin` ON `admin`.`id` = `department`.`postby_id` WHERE `dept_name` LIKE '%".$_POST['search']."%' ";
// $query = $user->searchDepartment();

if(mysql_num_rows($query)>0){
	$output .= '<br><i><h4 align="center">Search Result: </i></h4>';
	$output .= '<div class="panel panel-primary correction">
					                 
                    <table class="table table-striped">
                        <thead class="info">
							<th>ID</th>
							<th>Department Name</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Posted By</th>
							<th></th>
                        </thead>
                        <tbody>';
						while($result = mysql_fetch_array($query)){
							$output .= '
								<tr>
									<td>'.$result['id'].'</td>
									<td>'.$result['name'].'</td>
									<td>'.$result['created_at'].'</td>
									<td>'.$result['updated_at'].'</td>
									<td>'.$result['postby'].'</td>
									<td>
                                        <a href="view/department.php?id='. $result['id'] .'">
                                          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                                        <a href="update/department.php?id='. $result['id'] .'">
                                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a  href="#delete" data-toggle="modal">
                                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
									</td>
								</tr>
							';
						}
	$output .='			</tbody>
					</table>
				<div>';
						echo $output;
}
else{
	$output .= '<i><h4 align="center">Search Result: </i></h4>';
	$output .= '<div class="panel panel-primary correction danger">					                 
                    <table class="table">
                    	<tbody>
                    		<center><h4 style="margin-bottom: 10px;"><i>Data Not Found !</i></center></h4>
                    	</tbody>
            		</table>
				<div>';
	echo $output;
}
?>