<?php
	class AdminClass{

		public function execute($sql){
			include('config.php');
			// echo "This is here: ".$sql;
			if(empty($sql)){
	            return mysqli_error();
	        }
	        else{
	            return mysqli_query($connection, $sql);
	        }
		}

/********************************* SUPER ADMIN Atuthority *******************************************/
		public function superAdmin($username){
			$query = "SELECT * FROM `admin` WHERE `username` = '$username' ";
			$result = $this->execute($query);
			if($result){
				return 1;
			}

		}
/****************************************************************************************************/

		public function createAdmin($id, $fullname, $username, $email, $password, $usergroup_id, $status){
			echo '<br><br> Inside Print: P_BY_ID: '.$id.' FULLNAME: '.$fullname.' and USERNAME: '.$username.' and USERGROUP: '.$usergroup_id.' and EMAIL: '.$email.' and PASSWORD: '.$password.' and STATUS: '.$status;
			// die();
			$sql = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email' ";
			echo '<br>SQL: '.$sql;
			// die();
			$result = $this->execute($sql);
			$rows = mysqli_num_rows($result);
			echo '<br>RoWS: '.$rows;
			// die();
			if(!$rows){
				$sql1 = "INSERT INTO `admin` (`id`, `fullname`, `username`, `email`, `password`, `created_at`, `updated_at`, `status`) VALUES ('', '$fullname', '$username', '$email', '$password', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '$status')";
				echo '<br><br>'.$sql1;
		     	// die();
		     	$query1 = $this->execute($sql1);
		     	if($query1)
		     	{
		     		$sql2 = "INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `usergroup_id`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$fullname', '$username', '$email', '$password', '$usergroup_id', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status')";
		     		echo '<br><br>'.$sql2;
		     		// die();
		     		$query2 = $this->execute($sql2);
		     		if($query2){
			     		return 1;
			     	}
		     	}
	     	}
		    while ($data = mysqli_fetch_assoc($result)) {
		    	// echo '<pre>';
		    	// print_r($data['id']);
		    	// print_r($data['username']);
		    	// echo '</pre>';
		      if($data['username'] == $username){
		      	// echo '<br><br> USERNAME TAKEN!';
		      	return 2;
		      }
		      if($data['email'] == $email){
		      	// echo '<br><br> EMAIL TAKEN!';
		      	return 3;
		      }
		      if($data['username'] == $username && $data['email'] == $email){
		      	// echo '<br><br> USERNAME N EMAIL TAKEN!';
		      	return 4;
		      }
		    }
		}

		public function admin(){
			$sql = "SELECT * FROM `users` WHERE `usergroup_id` = '1' OR `usergroup_id` = '2' ";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function users(){
			$sql = "SELECT * FROM `users` WHERE `usergroup_id` = '1' OR `usergroup_id` = '2' ";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function employees(){
			$sql = "SELECT *, `department`.`dept_name`, `designation`.`title` FROM `employee` INNER JOIN `department` ON `employee`.`dept_id` = `department`.`id` INNER JOIN `designation` ON `employee`.`designation_id` = `designation`.`id` ORDER BY `employee`.`id` DESC";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		
		public function register($first_name, $middle_name, $last_name, $paddress, $taddress, $contact, $email, $usergroup_id, $department_id, $designation_id, $employeetype_id){
			echo '<br><br>This was sent '.$department_id;
			//die();
			$sql = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email'";
		    $query = mysqli_query($sql);
		    // $rows = mysqli_fetch_assoc($query);
		    $result = mysqli_num_rows($query);
		    echo '<br>'.$result;
		    // echo $rows['email'];
		    // echo '<pre>';
		    // print_r($rows);
		    // echo '</pre>';
		    // die();
		    if(!$result){
		     	echo '<br>Original Entry<br>';
		     	/*** Insert the details in employee ***/
				$sql = "INSERT INTO `employee` (`id`, `first_name`, `middle_name`, `last_name`, `paddress`, `taddress`, `contact`, `email`, `usergroup_id`, `dept_id`, `designation_id`, `employeetype_id`, `appointed_at`, `remarks`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$first_name', '$middle_name', '$last_name', '$paddress', '$taddress', '$contact', '$email', '$usergroup_id', '$department_id', '$designation_id', '$employeetype_id', '', '', '1', '1', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '1')";
				// echo "'<br><br>".$sql;
				$run = mysqli_query($sql);
				// echo '<br><br>This is query run: '.$run;
				// die();
				$sql = "SELECT `id` FROM `employee` ORDER BY `id` DESC LIMIT 1";
				// echo "'<br><br>".$sql;
				$query1 = mysqli_query($sql);
				while($data = mysqli_fetch_array($query1)){
					echo '<br> This is the recent id: '.$data['id'];
					$username = $first_name.$data['id'];
		  		}
		  		/*** Insert the details in user ***/
		        $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `usergroup_id`, `remarks`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`, `last_login`) VALUES ('', '$username', '$email', MD5('$username'), '$usergroup_id', '', '1', '1', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '1', '')";
				// echo '<br><br>This is to insert into User '.$sql;
				// die();
				$query1 = mysqli_query($sql);

		        echo "<br>".$query." AND ".$query1;
		        //die();
				if($query && $query1){
					return 1;
				}
				else{
				  echo mysqli_error();
				  die();
				}
			}
		    while ($rows = mysqli_fetch_assoc($query)) {
		      echo '<pre>';
		      print_r($rows);
		      echo '</pre>';

		      if($rows['username'] == $username && $rows['email'] == $email){
		      	return 2;
		      }
		      else if($rows['username'] == $username){
		      	return 3;
		      }      
		      else if($rows['email'] == $email){
		      	return 4;
		      }
		    }  
		    header('location: ../employees.php');
		    die();
		}

		public function authorize(){
			$sql = "SELECT `users`.`usergroup_id` AS `usergroup_id`, `authority`.`authitem_id` AS `authitem_id`, `authority`.`access` AS `access` FROM `users` INNER JOIN `authority` ON `users`.`usergroup_id` = `authority`.`usergroup_id` WHERE `users`.`username` = '$username'  ORDER BY `authitem_id` ASC";
		}


/**************************************************************************/
/********************** USERGROUP Options Starts **************************/
/**************************************************************************/

		public function createUsergroup($title, $detail, $code, $status, $id){
			// include('config.php');
			// echo '<br><br> Print inside: '.$title.' and "'.$detail.'" and '.$code;
    		// die();
			$sql = "SELECT * FROM `usergroup` WHERE `title` = '$title'";
			// echo '<br><br>'.$sql;
		    $query = $this->execute($sql);
		    // echo '<br><br><br><br><br>WTF: '.$query;
	     	// die();
		    // $rows = mysqli_fetch_assoc($query);
		    $result = mysqli_num_rows($query);
		    // echo '<br>'.$result;
		    // echo $rows['email'];
		    // echo '<pre>';
		    // print_r($rows);
		    // echo '</pre>';
		    // die();
		    if(!$result){
		     	// echo '<br>Original Entry<br>';
		     	$sql = "INSERT INTO `usergroup` (`id`, `title`, `details`, `code`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$title', '$detail', '$code', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status')";
		     	echo '<br><br>'.$sql;
		     	// die();
		     	$query = $this->execute($sql);
		     	// $result0 = mysqli_num_rows($query);
		    	// echo '<br>Num: '.$result0;
		     	// echo '<br><br>WTF: '.$query;
		     	// die();
		     	if($query){
		     		return 1;
		     		// header('location: ../usergroup.php');
		     	}
		    }
		    while ($rows = mysqli_fetch_assoc($query)) {
		      /*echo '<pre>';
		      print_r($rows);
		      echo '</pre>';*/
		      if($rows['title'] == $title){
		      	return 2;
		      }
		    }  

		}

		public function onUsergroup(){
			$sql = "SELECT * FROM `usergroup` WHERE `status` = 'ON'";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function offUsergroup(){
			$sql = "SELECT * FROM `usergroup` WHERE `status` = 'OFF' OR `status` = '' ORDER BY `id` ASC ";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function listUsergroup(){
			$sql = "SELECT * FROM `usergroup`";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function viewUsergroup($id){

			// include('config.php');
			// echo '<br><br>Inside ID: '.$id;
			// die();
			$sql = "SELECT * FROM `usergroup` WHERE `id` = '$id'";
			// echo '<br><br>Inside ID: '.$sql;
			$query = $this->execute($sql);

			// $query = mysqli_query($connection, $sql)

			// echo '<br><br>Inside IDs: '.$sql.' and '.$query;
			// die();
			if($query){
				return $query;
			}
		}

		public function updateUsergroup($id, $title, $new_id, $new_title, $detail, $code, $postby_id, $verifiedby_id, $new_status){
			// include('config.php');
			// echo '<br><br>This is me old inside: '.$id.' and '.$title;
			// echo '<br><br>This is me new inside: '.$new_id.' and '.$new_title.' and '.$new_status;
			// die();
			$sql = "SELECT * FROM `usergroup` WHERE `id` <> '$id' AND `title` <> '$title' ";			
			// echo '<br><br>'.$sql;
			// die();
			$query = $this->execute($sql);
			// echo '<br><br>'.$sql;
			while($result = mysqli_fetch_assoc($query)){
				/*echo '<pre>';
				print_r($result['id']);
				print_r($result['title']);
				echo '</pre>';*/

				if($new_id == $result['id'] && $new_title == $result['title']){
					// echo '<br><br>This is me new: '.$new_id.' and '.$new_title;
					return 1;
				}
				if($new_id == $result['id']){
					// echo '<br><br>This is me new id: '.$new_id;
					return 2;
				}
				if($new_title == $result['title']){
					// echo '<br><br>This is me new title: '.$new_title;
					return 3;
				}
			}

			// else{	
				$sql = "UPDATE `usergroup` SET `id` = '$new_id', `title` = '$new_title', `details` = '$detail', `code` = '$code', `status` = '$new_status', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id' WHERE `id` = '$id' ";
				// echo '<br>'.$sql;
				// die();
				$query1 = $this->execute($sql);
				if($query1){
					header('location: ../usergroup.php');
					// return 0;
				}			
			// }
			// die();
		}

		public function deleteUsergroup($id){
			$sql = "SELECT * FROM `usergroup` WHERE `id` = '$id'";
			$query = $this->execute($sql);
			while($result = mysqli_fetch_assoc($query)){
				if($result['status'] == 'ON'){
					$sql = "UPDATE `usergroup` SET `status` = 'OFF' WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}
				else{
					$sql = "DELETE FROM `usergroup` WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}

			}
		}
		
/**************************************************************************/
        /************** USERGROUP Options End ***************/
/**************************************************************************/


/**************************************************************************/
/************************* USERS Options Starts ***************************/
/**************************************************************************/


		public function onUsers($startpoint, $limit){
			$sql = "SELECT *,`users`.`id`, `users`.`username`, `users`.`email`, `users`.`status`, `users`.`postby_id` AS `postby_id`, `usergroup`.`title` FROM `users` INNER JOIN `usergroup` ON `users`.`usergroup_id` = `usergroup`.`id` WHERE `users`.`status` = 'ON' ORDER BY `users`.`id` DESC  LIMIT {$startpoint} , {$limit}";
			// echo '<br><br>'.$sql;
			// die();
			$result  =  $this->execute($sql);

			// while($rows = mysqli_fetch_assoc($result)){
			// 	echo '<br><br>Info: '.$rows['fullname'];
			// }
          	// die();
			if($result){
	            return $result;
	        }
		}

		public function offUsers(){
			$sql = "SELECT `users`.`id`, `users`.`username`, `users`.`email`, `users`.`status`, `users`.`postby_id` AS `postby_id`, `usergroup`.`title` FROM `users` INNER JOIN `usergroup` ON `users`.`usergroup_id` = `usergroup`.`id` WHERE `users`.`status` = 'OFF' ORDER BY `users`.`id` DESC";
			// echo '<br><br>'.$sql;
			$result  =  $this->execute($sql);

			// $rows = mysqli_fetch_assoc($result);
			if($result){
	            return $result;
	        }
		}

		public function listUsers(){
			$sql = "SELECT * FROM `users` WHERE `usergroup_id` != '0'";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function createUsers($id, $fullname, $username, $email, $password, $usergroup_id, $remarks, $status){
			$query = " SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email' ";
			$result = $this->execute($query);
			$rows = mysqli_num_rows($result);
			if(!$rows){
				// echo '<br>Original Entry<br>';
		     	$sql = "INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `usergroup_id`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$fullname', '$username', '$email', '$password', '$usergroup_id', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status')";
		     	echo '<br><br>'.$sql;
		     	// die();
		     	$query = $this->execute($sql);
		     	if($query){
		     		return 1;
		     	}
			}
		    while ($data = mysqli_fetch_assoc($result)) {
		      if($data['username'] == $username){
		      	return 2;
		      }
		      if($data['email'] == $email){
		      	return 3;
		      }
		      if($data['username'] == $username && $data['email'] == $email){
		      	return 4;
		      }
		    }
		}

		public function viewUsers($id){
			$sql = "SELECT `users`.`id`, `users`.`fullname`, `users`.`username`, `users`.`email`, `users`.`password`, `users`.`status`, `usergroup`.`id` AS `usergroup_id`, `usergroup`.`title` AS `usergroup`, `users`.`postby_id`, `users`.`verifiedby_id` FROM `users` INNER JOIN `usergroup` ON  `users`.`usergroup_id` = `usergroup`.`id` WHERE `users`.`id` = '$id'";
			// echo '<br><br>'.$sql;
			// die();
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function updateUsers($id, $new_fullname, $new_username, $new_email, $new_password, $new_cpassword, $new_ugid, $postby_id, $verifiedby_id, $status){
			// echo '<br><br>New FullName inside: '.$new_fullname;
   //    		die();
			$query = "SELECT * FROM `users` WHERE `id` <> '$id' ";
			// echo '<br><br>'.$query;
			// die();
			$result = $this->execute($query);
			while($data = mysqli_fetch_assoc($result)){
				// if($new_id == $data['id']){
				// 	return 2;
				// }
				if($new_username == $data['username']){
					return 3;
				}
				if($new_email == $data['email']){
					return 4;
				}
			}
			$query1 = "UPDATE `users` SET `fullname` = '$new_fullname', `username` = '$new_username', `email` = '$new_email', `password` = '$new_password', `usergroup_id` = '$new_ugid', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id', `status` = '$status' WHERE `id` = '$id' ";
			echo '<br><br><br>'.$query1;
			// die();
			$result = $this->execute($query1);
			if($query1){
				header('location: ../users.php');
				return 0;
			}
		}

		public function deleteUsers($id){
			$sql = "SELECT * FROM `users` WHERE `id` = '$id'";
			$query = $this->execute($sql);
			while($result = mysqli_fetch_assoc($query)){
				if($result['status'] == 'ON'){
					$sql = "UPDATE `users` SET `status` = 'OFF' WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}
				else{
					$sql = "DELETE FROM `users` WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}

			}
		}

/**************************************************************************/
        /************** USERS Options End ***************/
/**************************************************************************/


/**************************************************************************/
/********************** AUTHITEM Options Starts **************************/
/**************************************************************************/
		public function onAuthitem(){
			$sql = "SELECT * FROM `authitem` WHERE `status` = 'ON'";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function offAuthitem(){
			$sql = "SELECT * FROM `authitem` WHERE `status` = 'OFF' OR `status` = '' ORDER BY `id` ASC ";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function listAuthitem(){
			$sql = "SELECT * FROM `authitem`";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function createAuthitem($title, $detail, $status, $id){
			include('config.php');
			// echo '<br><br> Print inside: '.$title.' and "'.$detail.'" and '.$status.' and ID: '.$id ;
    		// die();
			$sql = "SELECT * FROM `authitem` WHERE `title` = '$title'";
			// echo '<br><br>'.$sql; 
			// die();
		    $query = mysqli_query($connection, $sql);
		    // echo '<br><br>'.$query; 
			// die();
		    // $rows = mysqli_fetch_assoc($query);
		    $result = mysqli_num_rows($query);
		    // echo '<br>'.$result;
		    // echo '<pre>';
		    // print_r($result);
		    // echo '</pre>';
		    // die();
		    if(!$result){
		     	// echo '<br>Original Entry<br>';
		     	$sql = "INSERT INTO `authitem` (`id`, `title`, `details`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$title', '$detail', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status')";
		     	// echo '<br><br>'.$sql;
		     	// die();
		     	$query = mysqli_query($connection, $sql);
		     	// echo '<br><br>'.$query;
		     	// die();
		     	if($query){
		     		return 1;
		     		// header('location: ../authitem.php');
		     	}
		    }
		    while ($rows = mysqli_fetch_assoc($query)) {
		      /*echo '<pre>';
		      print_r($rows);
		      echo '</pre>';*/
		      if($rows['title'] == $title){
		      	return 2;
		      }
		    }  

		}

		public function viewAuthitem($id){
			$sql = "SELECT `authitem`.`id`, `authitem`.`title`, `authitem`.`details`, `authitem`.`postby_id` AS `postby_id`, `authitem`.`verifiedby_id` AS `verifiedby_id`, `authitem`.`created_at`, `authitem`.`updated_at`, `authitem`.`status`, `users`.`fullname` AS `postedby` FROM `authitem` INNER JOIN `users` ON `authitem`.`postby_id` = `users`.`id` WHERE `authitem`.`id` = '$id'";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function updateAuthitem($id, $title, $new_id, $new_title, $detail, $postby_id, $verifiedby_id, $status){
			// echo '<br><br>This is me old inside: '.$id.' and '.$title;
			// echo '<br><br>This is me new inside: '.$new_id.' and '.$new_title;
			// echo '<br><br>This is me new inside '.$new_id.' and '.$new_title.' and '.$detail.' and '.$status.' and '.$postby_id.' and '.$verifiedby_id;
			// die();
			$sql = "SELECT * FROM `authitem` WHERE `id` <> '$id'";
			// echo '<br>'.$sql;
			// die();
			
			$query = $this->execute($sql);
			// echo '<br><br>'.$query;
			// die();
			while($result = mysqli_fetch_assoc($query)){
				/*echo '<pre>';
				print_r($result['id']);
				print_r($result['title']);
				echo '</pre>';*/

				if($new_id == $result['id'] && $new_title == $result['title']){
					// echo '<br><br>This is me new: '.$new_id.' and '.$new_title;
					return 1;
				}
				if($new_id == $result['id']){
					// echo '<br><br>This is me new id: '.$new_id;
					return 2;
				}
				if($new_title == $result['title']){
					// echo '<br><br>This is me new title: '.$new_title;
					return 3;
				}
			}
			// die();
			$sql = "UPDATE `authitem` SET `id` = '$new_id', `title` = '$new_title', `details` = '$detail', `status` = '$status', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id' WHERE `id` = '$id' ";
			// echo '<br>'.$sql;
			// die();
			$query1 = $this->execute($sql);
			if($query1){
				header('location: ../authitem.php');
				// return 0;
			}
		}

		public function deleteAuthitem($id){
			$sql = "SELECT * FROM `authitem` WHERE `id` = '$id'";
			$query = $this->execute($sql);
			while($result = mysqli_fetch_assoc($query)){
				if($result['status'] == 'ON'){
					$sql = "UPDATE `authitem` SET `status` = 'OFF' WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}
				else{
					$sql = "DELETE FROM `authitem` WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}

			}
		}

/**************************************************************************/
        /************** AUTHITEM Options End ***************/
/**************************************************************************/


/**************************************************************************/
/********************** ITEMGROUP Options Starts **************************/
/**************************************************************************/

	public function onItemgroup(){
		$sql = "SELECT * FROM `itemgroup` WHERE `status` = 'ON'";
		$query = $this->execute($sql);
		if($query){
			return $query;
		}
	}

	public function offItemgroup(){
		$sql = "SELECT * FROM `itemgroup` WHERE `status` = 'OFF' OR `status` = '' ORDER BY `id` ASC ";
		$query = $this->execute($sql);
		if($query){
			return $query;
		}
	}

	public function listItemgroup(){
		$sql = "SELECT * FROM `itemgroup`";
		$query = $this->execute($sql);
		if($query){
			return $query;
		}
	}

	public function createItemgroup($title, $remarks, $status, $id){
		// echo '<br><br> Print inside: '.$usergroup_id.' and '.$authitem_id.' and '.$access;
  		// die();
  		$sql = "SELECT * FROM `itemgroup` WHERE `title` = '$title' ";
  		$query = $this->execute($sql);
  		// echo '<br><br>'.$sql.' and '.$query;
  		// die();
  		$rows = mysqli_num_rows($query);
  		// echo '<br><br>'.$rows;
  		// die();
  		if(!$rows){
  			$sql = "INSERT INTO `itemgroup` (`id`, `title`, `remarks`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$title', '$remarks', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status') ";
  			// echo '<br><br>'.$sql;
  			// die();
  			$query = $this->execute($sql);
  			// echo '<br><br>'.$sql.' and '.$query;
  			// die();
  			if($query){
  				return 1;
  			}
  		}
  		while($result = mysqli_fetch_assoc($query)){
  			if($result['title'] == $title){
				/*echo '<br><br>Already Exists';
				die();*/
				return 2;
  			}
  		}
	}

	public function viewItemgroup($id){
		$sql = "SELECT `itemgroup`.`id`, `itemgroup`.`title`, `itemgroup`.`remarks`, `users`.`fullname` AS `postedby`, `itemgroup`.`postby_id`, `itemgroup`.`verifiedby_id`, `itemgroup`.`created_at`, `itemgroup`.`updated_at`, `itemgroup`.`verified`, `itemgroup`.`status` FROM `itemgroup` INNER JOIN `users` ON `itemgroup`.`postby_id` = `users`.`id` WHERE `itemgroup`.`id` = '$id'";
		// echo '<br><br>'.$sql;
		// die();
		$query = $this->execute($sql);
		// echo '<br><br>Already Exists'.$query;
		// die();
		if($query){
			return $query;
		}
	}

	public function updateItemgroup($id, $title, $new_id, $new_title, $remarks, $postby_id, $verifiedby_id, $status){
		echo '<br><br>This is me new inside '.$new_id.' and '.$new_title.' and '.$remarks.' and '.$status.' and '.$postby_id.' and '.$verifiedby_id;
		// die();
		$sql = "SELECT * FROM `itemgroup` WHERE `id` <> '$id'";
		echo '<br>'.$sql;
		// die();
		$query = $this->execute($sql);
		// echo '<br>'.$query;
		// die();

		while($result = mysqli_fetch_assoc($query)){
				/*echo '<pre>';
				print_r($result['id']);
				print_r($result['title']);
				echo '</pre>';*/

				if($new_id == $result['id'] && $new_title == $result['title']){
					// echo '<br><br>This is me new: '.$new_id.' and '.$new_title;
					return 1;
				}
				if($new_id == $result['id']){
					// echo '<br><br>This is me new id: '.$new_id;
					return 2;
				}
				if($new_title == $result['title']){
					// echo '<br><br>This is me new title: '.$new_title;
					return 3;
				}
			}
			// die();
			$sql = "UPDATE `itemgroup` SET `id` = '$new_id', `title` = '$new_title', `remarks` = '$remarks', `status` = '$status', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id' WHERE `id` = '$id' ";
			// echo '<br>'.$sql;
			// die();
			$query1 = $this->execute($sql);
			if($query1){
				header('location: ../itemgroup.php');
				// return 0;
			}
	}

	public function deleteItemgroup($id){
		$sql = "SELECT * FROM `itemgroup` WHERE `id` = '$id'";
		$query = $this->execute($sql);
		while($result = mysqli_fetch_assoc($query)){
			if($result['status'] == 'ON'){
				$sql = "UPDATE `itemgroup` SET `status` = 'OFF' WHERE `id` = '$id' ";
				$query  =  $this->execute($sql);
		        if($query){
		            return 1;
		        }					
			}
			else{
				$sql = "DELETE FROM `itemgroup` WHERE `id` = '$id' ";
				$query  =  $this->execute($sql);
		        if($query){
		            return 1;
		        }					
			}

		}
	}

/**************************************************************************/
        /************** ITEMGROUP Options End ***************/
/**************************************************************************/


/**************************************************************************/
/********************** AUTHORITY Options Starts **************************/
/**************************************************************************/
	public function onAuthority($startpoint, $limit){
		$sql = "SELECT `authority`.`id` AS `id`, `authority`.`access` AS `access`, `authority`.`postby_id` AS `postby_id`, `authority`.`verifiedby_id` AS `verifiedby_id`, `authority`.`created_at` AS `created_at`, `authority`.`updated_at` AS `updated_at`, `authority`.`verified` AS `verified`, `authority`.`status` AS `status`, `usergroup`.`title` AS `usergroup`, `itemgroup`.`title` AS `itemgroup`, `authitem`.`title` AS `authitem` FROM `authority` INNER JOIN `usergroup` ON `usergroup`.`id` = `authority`.`usergroup_id` INNER JOIN `itemgroup` ON `itemgroup`.`id` = `authority`.`itemgroup_id` INNER JOIN `authitem` ON `authitem`.`id` = `authority`.`authitem_id` WHERE `authority`.`status` = 'ON' ORDER BY `id` DESC  LIMIT {$startpoint} , {$limit}";
		// $sql = "select u.title, ai.title, a.id FROM `usergroup` u, `authority` a, `authitem` ai WHERE u.id = a.usergroup_id AND ai.id = a.authitem_id AND `a`.`status` = 'ON' LIMIT {$startpoint} , {$limit}";
		$query = $this->execute($sql);
		// echo '<br><br>'.$sql.' and '.$query;
			// die();
		if($query){
			return $query;
		}
	}

	public function offAuthority(){
		$sql = "SELECT `authority`.`id` AS `id`, `authority`.`access` AS `access`, `authority`.`postby_id` AS `postby_id`, `authority`.`verifiedby_id` AS `verifiedby_id`, `authority`.`created_at` AS `created_at`, `authority`.`updated_at` AS `updated_at`, `authority`.`verified` AS `verified`, `authority`.`status` AS `status`, `usergroup`.`title` AS `usergroup`, `itemgroup`.`title` AS `itemgroup`, `authitem`.`title` AS `authitem` FROM `authority` INNER JOIN `usergroup` ON `usergroup`.`id` = `authority`.`usergroup_id` INNER JOIN `itemgroup` ON `itemgroup`.`id` = `authority`.`itemgroup_id` INNER JOIN `authitem` ON `authitem`.`id` = `authority`.`authitem_id` WHERE `authority`.`status` = 'OFF' OR `authority`.`status` = '' ORDER BY `id` ASC ";
		$query = $this->execute($sql);
		if($query){
			return $query;
		}
	}

	public function listAuthority(){
		$sql = "SELECT * FROM `authority`";
		$query = $this->execute($sql);
		if($query){
			return $query;
		}
	}

	public function createAuthority($usergroup_id, $authitem_id, $itemgroup_id, $access, $status, $id){
		// echo '<br><br> Print inside: '.$usergroup_id.' and '.$authitem_id.' and '.$access;
  		// die();
  		$sql = "SELECT * FROM `authority` WHERE `usergroup_id` = '$usergroup_id' AND `authitem_id` = '$authitem_id' AND `itemgroup_id` = '$itemgroup_id' ";
  		$query = $this->execute($sql);
  		// echo '<br><br>'.$sql.' and '.$query;
  		// die();
  		$rows = mysqli_num_rows($query);
  		// echo '<br><br>'.$rows;
  		// die();
  		if(!$rows){
  			$sql = "INSERT INTO `authority` (`id`, `usergroup_id`, `itemgroup_id`, `authitem_id`, `access`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$usergroup_id', '$itemgroup_id', '$authitem_id', '$access', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status') ";
  			echo '<br><br>'.$sql;
  			// die();
  			$query = $this->execute($sql);
  			// echo '<br><br>'.$query;
  			// die();
  			if($query){
  				return 1;
  			}
  		}
  		while($result = mysqli_fetch_assoc($query)){
  			if($result['usergroup_id'] == $usergroup_id){
  				if($result['authitem_id'] == $authitem_id){
  					/*echo '<br><br>Already Exists';
  					die();*/
  					return 2;
  				}
  			}
  		}
	}

	public function viewAuthority($id){
			$sql = "SELECT `authority`.`id` AS `id`, `authority`.`usergroup_id` AS `usergroup_id`, `authority`.`itemgroup_id` AS `itemgroup_id`, `authority`.`authitem_id` AS `authitem_id`, `usergroup`.`title` AS `usergroup`, `itemgroup`.`title` AS `itemgroup`, `authitem`.`title` AS `authitem`, `authority`.`access` AS `access`, `authority`.`postby_id` AS `postby_id`, `authority`.`verifiedby_id` AS `verifiedby_id`, `authority`.`created_at` AS `created_at`, `authority`.`updated_at` AS `updated_at`, `authority`.`verified` AS `verified`, `authority`.`status` AS `status` FROM `authority` INNER JOIN `usergroup` ON `usergroup`.`id` = `authority`.`usergroup_id` INNER JOIN `itemgroup` ON `itemgroup`.`id` = `authority`.`itemgroup_id` INNER JOIN `authitem` ON `authitem`.`id` = `authority`.`authitem_id` WHERE `authority`.`id` = '$id' ";
			$query = $this->execute($sql);
			// echo '<br><br>Inside: '.$sql.' and '.$query;
			if($query){
				return $query;
			}
		}

		public function updateAuthority($id, $ugid, $aiid, $new_id, $new_ugid, $new_igid, $new_aiid, $access, $status, $postby_id, $verifiedby_id){
			echo '<br><br>This is me INSIDE one ID: '.$new_id.' and UG: '.$new_ugid.' and IG: '.$new_igid.' and AI: '.$new_aiid.' and '.$access.' and '.$status.' and PID: '.$postby_id.' and VID:'.$verifiedby_id;
			// die();
			$sql = "SELECT * FROM `authority` WHERE `id` <> '$id' ";
			echo '<br><br>'.$sql;
			// die();
			$query = $this->execute($sql);
			while($result = mysqli_fetch_array($query)){
				echo '<pre>';
				print_r($result['id']);
				print_r($result['access']);
				echo '</pre>';
				if($result['id'] == $new_id){// || $result['usergroup_id'] == $new_ugid && $result['authitem_id'] == $new_aiid ){
					// echo '<br><br> AUTHORITY ID ALREADY TAKEN!';
					// die();
					return 1;
				}
				if($result['usergroup_id'] == $new_ugid && $result['itemgroup_id'] == $new_igid && $result['authitem_id'] == $new_aiid ){
					// echo '<br><br> AUTHORITY ALREADY SET!';
					// die();
					return 2;
				}
				/*else{
					$sql = "UPDATE `authority` SET `id` = '$new_id', `usergroup_id` = '$new_ugid', `authitem_id` = '$new_aiid', `access` = '$access', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id', `status` = '$status' WHERE `id` = '$id' ";
					echo '<br><br>'.$sql;
					die();
					// $query = $this->execute($sql);
					if($query){
						header('location: ../authority.php');
						return 0;
					}	
				}*/
			}	
			// die();		
			$sql = "UPDATE `authority` SET `id` = '$new_id', `usergroup_id` = '$new_ugid', `itemgroup_id` = '$new_igid', `authitem_id` = '$new_aiid', `access` = '$access', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id', `status` = '$status' WHERE `id` = '$id' ";
			// echo '<br><br>'.$sql;
			// die();
			$query = $this->execute($sql);
			if($query){
				header('location: ../authority.php');
				return 0;
			}
			// die();
		}

		public function deleteAuthority($id){
			$sql = "SELECT * FROM `authority` WHERE `id` = '$id'";
			$query = $this->execute($sql);
			while($result = mysqli_fetch_assoc($query)){
				if($result['status'] == 'ON'){
					$sql = "UPDATE `authority` SET `status` = 'OFF' WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}
				else{
					$sql = "DELETE FROM `authority` WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}

			}
		}

/**************************************************************************/
        /************** AUTHORITY Options End ***************/
/**************************************************************************/


/**************************************************************************/
/********************** DEPARTMENT Options Starts ************************/
/**************************************************************************/
		public function onDepartment(){
			$sql = "SELECT * FROM `department` WHERE `status` = 'ON' ORDER BY `id` ASC ";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function offDepartment(){
			$sql = "SELECT * FROM `department` WHERE `status` = 'OFF' OR `status` = '' ORDER BY `id` ASC ";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function listDepartment(){
			$sql = "SELECT * FROM `department`";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function createDepartment($dept_name, $status, $id){
			$sql = "SELECT * FROM `department` WHERE `dept_name` = '$dept_name'";
		    $query = mysqli_query($sql);
		    $result = mysqli_num_rows($query);
		    if(!$result){
		     	echo '<br>Original Entry<br>';
		     	$sql = "INSERT INTO `department` (`id`, `dept_name`, `remarks`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$dept_name', '', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status')";
		     	$query = mysqli_query($sql);
		     	if($query){
		     		return 1;
		     	}
		    }
		    while ($rows = mysqli_fetch_assoc($query)) {
		      if($rows['dept_name'] == $dept_name){
		      	return 2;
		      }
		    }  

		}

		public function viewDepartment($id){
			$sql = "SELECT * FROM `department` WHERE `id` = '$id'";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function updateDepartment($id, $dept_name, $new_id, $new_dept_name, $status, $postby_id, $verifiedby_id){
			// echo '<br><br>This is me inside: '.$id.' and '.$dept_name;
			// echo '<br><br>This is me inside '.$id.' and '.$new_id;
			// die();
			$sql = "SELECT * FROM `department` WHERE `id` <> '$id' AND `dept_name` <> '$dept_name' AND `status` = 'ON' ";			
			
			$query = $this->execute($sql);
			// echo '<br><br>'. $sql.' and '.$query;
				while($result = mysqli_fetch_array($query)){
					// echo '<pre>';
					// print_r($result['id']);
					// print_r($result['dept_name']);
					// echo '</pre>';

					if($new_id == $result['id'] && $new_dept_name == $result['dept_name']){
						return 1;
					}
					else if($new_id == $result['id']){
						return 2;
					}
					else if($new_dept_name == $result['dept_name']){
						return 3;
					}
				}
				$sql = "UPDATE `department` SET `id` = '$new_id', `dept_name` = '$new_dept_name', `status` = '$status', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id' WHERE `id` = '$id' ";
				$query1 = $this->execute($sql);
				if($query1){
					return 0;
				}
				else{
					return mysqli_error();
					exit();
				}			
		}

		public function deleteDepartment($id){
			$sql = "SELECT * FROM `department` WHERE `id` = '$id'";
			$query = $this->execute($sql);
			while($result = mysqli_fetch_assoc($query)){
				if($result['status'] == 'ON'){
					$sql = "UPDATE `department` SET `status` = 'OFF' WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}
				else{
					$sql = "DELETE FROM `department` WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}

			}
		}

		public function searchDepartment(){
			$sql = "SELECT DISTINCT `department`.`id` as `id`, `department`.`dept_name` as `name`, `department`.`created_at` as `created_at`, `department`.`updated_at` as `updated_at`, `admin`.`fullname` as `postby` FROM `department` INNER JOIN `admin` ON `admin`.`id` = `department`.`postby_id` WHERE `dept_name` LIKE '%".$_POST['search']."%' ";
			$query  =  $this->execute($sql);
	        if($query){
	        	return $query;
	        }
		}
/**************************************************************************/
        /************** DEPARTMENT Options End ***************/
/**************************************************************************/


/**************************************************************************/
/********************** DESIGNATION Options Starts ************************/
/**************************************************************************/

		public function onDesignation(){
			$sql = "SELECT * FROM `designation` WHERE `status` = 'ON'";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function offDesignation(){
			$sql = "SELECT * FROM `designation` WHERE `status` = 'OFF' OR `status` = '' ORDER BY `id` ASC ";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function listDesignation(){
			$sql = "SELECT * FROM `designation`";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function createDesignation($title, $status, $id){
			$sql = "SELECT * FROM `designation` WHERE `title` = '$title'";
		    $query = mysqli_query($sql);
		    // $rows = mysqli_fetch_assoc($query);
		    $result = mysqli_num_rows($query);
		    //echo '<br>'.$result;
		    // echo $rows['email'];
		    // echo '<pre>';
		    // print_r($rows);
		    // echo '</pre>';
		    // die();
		    if(!$result){
		     	echo '<br>Original Entry<br>';
		     	$sql = "INSERT INTO `designation` (`id`, `title`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$title', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status')";
		     	$query = mysqli_query($sql);
		     	if($query){
		     		return 1;
		     		// header('location: ../designation.php');
		     	}
		    }
		    while ($rows = mysqli_fetch_assoc($query)) {
		      /*echo '<pre>';
		      print_r($rows);
		      echo '</pre>';*/
		      if($rows['title'] == $title){
		      	return 2;
		      }
		    }  

		}


		public function viewDesignation($id){
			$sql = "SELECT * FROM `designation` WHERE `id` = '$id'";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function updateDesignation($id, $title, $new_id, $new_title, $status, $postby_id, $verifiedby_id){
			// echo '<br><br>This is me old inside: '.$id.' and '.$title;
			// echo '<br><br>This is me new inside: '.$new_id.' and '.$new_title;
			// die();
			$sql = "SELECT * FROM `designation` WHERE `id` <> '$id' AND `title` <> '$title' ";			
			
			$query = $this->execute($sql);
			// echo '<br><br>'.$sql;
			while($result = mysqli_fetch_assoc($query)){
				/*echo '<pre>';
				print_r($result['id']);
				print_r($result['title']);
				echo '</pre>';*/

				if($new_id == $result['id'] && $new_title == $result['title']){
					// echo '<br><br>This is me new: '.$new_id.' and '.$new_title;
					return 1;
				}
				if($new_id == $result['id']){
					// echo '<br><br>This is me new id: '.$new_id;
					return 2;
				}
				if($new_title == $result['title']){
					// echo '<br><br>This is me new title: '.$new_title;
					return 3;
				}
				else{	
					$sql = "UPDATE `designation` SET `id` = '$new_id', `title` = '$new_title', `status` = '$status', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id' WHERE `id` = '$id' ";
					$query1 = $this->execute($sql);
					if($query1){
						header('location: ../designation.php');
						// return 0;
					}			
				}
			}
			// die();
		}

		public function deleteDesignation($id){
			$sql = "SELECT * FROM `designation` WHERE `id` = '$id'";
			$query = $this->execute($sql);
			while($result = mysqli_fetch_assoc($query)){
				if($result['status'] == 'ON'){
					$sql = "UPDATE `designation` SET `status` = 'OFF' WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}
				else{
					$sql = "DELETE FROM `designation` WHERE `id` = '$id' ";
					$query  =  $this->execute($sql);
			        if($query){
			            return 1;
			        }					
				}

			}
		}

		public function searchDesignation(){
			$sql = "SELECT DISTINCT `department`.`id` as `id`, `department`.`dept_name` as `name`, `department`.`created_at` as `created_at`, `department`.`updated_at` as `updated_at`, `admin`.`fullname` as `postby` FROM `department` INNER JOIN `admin` ON `admin`.`id` = `department`.`postby_id` WHERE `dept_name` LIKE '%".$_POST['search']."%' ";
			$query  =  $this->execute($sql);
	        if($query){
	        	return $query;
	        }
		}

/**************************************************************************/
        /************** DESIGNATION Options End ***************/
/**************************************************************************/





		public function url(){
			$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$validURL = str_replace("&", "&amp;", $url);

			return $validURL;

		}

		function pagination($query, $per_page = 10, $page = 1, $url = '?'){ 
			// include('config.php');     
	    	$query = "SELECT COUNT(*) as `num` FROM {$query}";
	    	$row = mysqli_fetch_array($this->execute($query));	
	    	$total = $row['num'];
	        $adjacents = "2"; 

	    	$page = ($page == 0 ? 1 : $page);  
	    	$start = ($page - 1) * $per_page;								
			
	    	$prev = $page - 1;							
	    	$next = $page + 1;
	    	$firstpage = 1;
	        $lastpage = ceil($total/$per_page);
	    	$lpm1 = $lastpage - 1;
	    	
	    	$pagination = "";
	    	if($lastpage > 1)
	    	{	
	    		$pagination .= "<ul class='pagination'>";
	                    $pagination .= "<li class='details'>Page $page of $lastpage</li>";
	                    if ($page >  1){ 
			                $pagination.= "<li><a href='{$url}page=$firstpage'>First</a></li>";
			    			$pagination.= "<li><a href='{$url}page=$prev'><<</a></li>";
			    		}else{
			    			$pagination.= "<li><a class='current'>First</a></li>";
			                $pagination.= "<li><a class='current'><<</a></li>";
			            }
	    		if ($lastpage < 7 + ($adjacents * 2))
	    		{	
	    			for ($counter = 1; $counter <= $lastpage; $counter++)
	    			{
	    				if ($counter == $page)
	    					$pagination.= "<li><a class='current'>$counter</a></li>";
	    				else
	    					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
	    			}
	    		}
	    		elseif($lastpage > 5 + ($adjacents * 2))
	    		{
	    			if($page < 1 + ($adjacents * 2))		
	    			{
	    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
	    				{
	    					if ($counter == $page)
	    						$pagination.= "<li><a class='current'>$counter</a></li>";
	    					else
	    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
	    				}
	    				$pagination.= "<li class='dot'>...</li>";
	    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
	    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
	    			}
	    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
	    			{
	    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
	    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
	    				$pagination.= "<li class='dot'>...</li>";
	    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
	    				{
	    					if ($counter == $page)
	    						$pagination.= "<li><a class='current'>$counter</a></li>";
	    					else
	    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
	    				}
	    				$pagination.= "<li class='dot'>..</li>";
	    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
	    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
	    			}
	    			else
	    			{
	    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
	    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
	    				$pagination.= "<li class='dot'>..</li>";
	    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
	    				{
	    					if ($counter == $page)
	    						$pagination.= "<li><a class='current'>$counter</a></li>";
	    					else
	    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
	    				}
	    			}
	    		}
	    		
	    		if ($page < $counter - 1){ 
	    			$pagination.= "<li><a href='{$url}page=$next'>>></a></li>";
	                $pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
	    		}else{
	    			$pagination.= "<li><a class='current'>>></a></li>";
	                $pagination.= "<li><a class='current'>Last</a></li>";
	            }
	    		$pagination.= "</ul>\n";		
	    	}
	    
	    
	        return $pagination;
	    } 

	}





	$user = new AdminClass();
?>