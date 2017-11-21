<?php
include('view.php');
include('../include/config.php');
include('../include/class.php');
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
$limit = 3; 
$offset = ($page - 1)*$limit;
$query = "SELECT * FROM `designation` LIMIT $offset, $limit";
$result = mysql_query($query);
?>
<div class="container">
	<section class="main">
		<table class="table">
            <thead class="info">
                <tr class="filters">
                    <th><b>S No.</b></th>
                    <th><b>ID</b></th>
                    <th><b>Title</b></th>
                    <th><b>Created At</b></th>
                    <th><b>Updated At</b></th>
                    <th><b>Status</b></th>
                    <th></th>
                </tr>
            </thead>
            <tbody><?php
            $i = 1;
            while($row = mysql_fetch_array($result)){?>
            	<tr class="filters">
	                <td>&nbsp;&nbsp;<?php echo $i++; ?></td>
	                <td><?php echo $row['id']; ?></td>
	                <td><?php echo $row['title']; ?></td>
	                <td><?php echo $row['created_at']; ?></td>
	                <td><?php echo $row['updated_at']; ?></td>
	                <td><?php echo $row['status']; ?></td>
	                <td>
	                    <a href="view/designation.php?id=<?PHP echo $row['id'] ?>">
	                      <button class="btn btn-success btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-eye-open"></i></button></a>
	                    <a href="update/designation.php?id=<?PHP echo $row['id']; ?>">
	                      <button class="btn btn-primary btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i></button></a>
	                    <a href="delete/designation.php?id=<?PHP echo $row['id']; ?>"
	                                onClick="return confirm('Are you sure to delete the record ? ')">
	                              <button class="btn btn-danger btn-xs" style="padding-bottom: 3px;"><i class="glyphicon glyphicon-trash"></i></button></a>

					</td>
	            </tr><?php
            }
            ?>

        	</tbody>
        </table>
	</section>
</div>