<?php
include('include/config.php');
include('include/class.php');
include('view.php');
?>
<style>
table th{
	background-color: #337ab7;
	color: #eeefff;
}
</style>
<?php
$output = '';
$table = `department`;
// $sql = "SELECT DISTINCT '$table'.`id` as `id`, '$table'.`dept_name` as `name`, '$table'`.`created_at` as `created_at`, '$table'.`updated_at` as `updated_at`, `admin`.`fullname` as `postby` FROM '$table' INNER JOIN `admin` ON `admin`.`id` = '$table'.`postby_id` WHERE `dept_name` LIKE '%".$_POST['search']."%' ";
$sql ="SELECT * FROM '$table'";
$query = mysql_query($sql);
echo 'It prints: '.$query;
while($row = mysql_fetch_array($query)){
	echo '<pre>';
	print_r($row);
	echo '</pre>';
}
die();

if(mysql_num_rows($query)>0){
	$output .= '<br><i><h4 align="center">Search Result: </i></h4>';
	$output .= '<div class="table-responsive ">
					<table class="table table-hover">
						<th>ID</th>&nbsp;&nbsp;&nbsp;
						<th>Department Name</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Posted By</th>
						<th>Tools</th>';
						while($row = mysql_fetch_array($query)){
							$output .= '
								<tr>
									<td>'.$row['id'].'</td>
									<td>'.$row['name'].'</td>
									<td>'.$row['created_at'].'</td>
									<td>'.$row['updated_at'].'</td>
									<td>'.$row['postby'].'</td>
									<td>
                                        <a href="view/department.php?id='. $row['id'] .'">
                                          <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                                        <a href="update/department.php?id='. $row['id'] .'">
                                          <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <a  href="#delete" data-toggle="modal">
                                          <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
									</td>
								</tr>
							';
						}
						echo $output;
}
else{
	echo "Data Not Found !";
}
?>