<?php



	class Project{

		public function  adminlogin($username, $password){
			include('config.php');
			$sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = MD5('$password') AND `status` = 'ON'";
			echo $sql;
			$query  =  mysqli_query($connection, $sql);
			// $rows = mysqli_fetch_assoc($query);
			// echo '<pre>';
		 //    print_r($rows);
		 //    echo '</pre>';
		 //    die();	
        	if(mysqli_num_rows($query)==1){
				if($query){
					$data=mysqli_fetch_array($query);
                    session_start();
                    $_SESSION['user'] = $data['username'];
                    return 1;
				}
			}
		}

		public function login($username, $password){
			include('config.php');
			$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = MD5('$password') AND `status` = 'ON'";
			$query = mysqli_query($connection, $sql);
			if(mysqli_num_rows($query) == 1){
				if($query){
					$data = mysqli_fetch_array($query);
                    session_start();
                    $_SESSION['user'] = $data['username'];
                    return 1;
				}
			}

		}

		public function adminCheck($username){
			include('config.php');
			$sql = "SELECT * FROM `users` WHERE `username` = '$username' ";
			$query = mysqli_query($connection, $sql);
			$data = mysqli_fetch_assoc($query);
			// echo $data['usergroup_id']." it ends here";
			// die();
			if($data['usergroup_id'] == 1 || $data['usergroup_id'] == 2)
				return 1;
			else
				return 0;
		}

	}
	
	$object = new Project();
?>
