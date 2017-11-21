<?php
	class AdminClass{

		public function execute($sql){
			if(empty($sql)){
	            return mysql_error();
	        }
	        else{
	            return mysql_query($sql);
	        }
		}

		public function admin(){
			$sql = "SELECT * FROM `admin` WHERE `usergroup_id` = '1' OR '2' ";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function user(){
			$sql = "SELECT *, `usergroup`.`title` FROM `users` INNER JOIN `usergroup` ON `users`.`usergroup_id` = `usergroup`.`id` ORDER BY `users`.`id` DESC";
			//echo '<br><br>'.$sql;
			$result  =  $this->execute($sql);

			/*$rows = mysql_fetch_assoc($result);
			while($rows){
			echo '<pre>';
			print_r($rows);
			echo '</pre>';
			echo '<br><br>I am here...';
			die();}*/
			if($result){
	            return $result;
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
		    $query = mysql_query($sql);
		    // $rows = mysql_fetch_assoc($query);
		    $result = mysql_num_rows($query);
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
				$run = mysql_query($sql);
				// echo '<br><br>This is query run: '.$run;
				// die();
				$sql = "SELECT `id` FROM `employee` ORDER BY `id` DESC LIMIT 1";
				// echo "'<br><br>".$sql;
				$query1 = mysql_query($sql);
				while($data = mysql_fetch_array($query1)){
					echo '<br> This is the recent id: '.$data['id'];
					$username = $first_name.$data['id'];
		  		}
		  		/*** Insert the details in user ***/
		        $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `usergroup_id`, `remarks`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`, `last_login`) VALUES ('', '$username', '$email', MD5('$username'), '$usergroup_id', '', '1', '1', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '1', '')";
				// echo '<br><br>This is to insert into User '.$sql;
				// die();
				$query1 = mysql_query($sql);

		        echo "<br>".$query." AND ".$query1;
		        //die();
				if($query && $query1){
					return 1;
				}
				else{
				  echo mysql_error();
				  die();
				}
			}
		    while ($rows = mysql_fetch_assoc($query)) {
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

		/*****************************************/
		/****** DEPARTMENT Options Starts ********/
		/*****************************************/
		public function department(){
			$sql = "SELECT * FROM `department`";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function createDepartment($dept_name, $status, $id){
			$sql = "SELECT * FROM `department` WHERE `dept_name` = '$dept_name'";
		    $query = mysql_query($sql);
		    // $rows = mysql_fetch_assoc($query);
		    $result = mysql_num_rows($query);
		    //echo '<br>'.$result;
		    // echo $rows['email'];
		    // echo '<pre>';
		    // print_r($rows);
		    // echo '</pre>';
		    // die();
		    if(!$result){
		     	echo '<br>Original Entry<br>';
		     	$sql = "INSERT INTO `department` (`id`, `dept_name`, `remarks`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$dept_name', '', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status')";
		     	$query = mysql_query($sql);
		     	if($query){
		     		header('location: ../department.php');
		     	}
		    }
		    while ($rows = mysql_fetch_assoc($query)) {
		      /*echo '<pre>';
		      print_r($rows);
		      echo '</pre>';*/
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
			// die();
			$sql = "SELECT * FROM `department` WHERE `id` <> '$id' AND `dept_name` <> '$dept_name' ";			
			
			$query = $this->execute($sql);
			// echo '<br><br>'.$sql;
			while($result = mysql_fetch_assoc($query)){
				/*echo '<pre>';
				print_r($result['id']);
				print_r($result['dept_name']);
				echo '</pre>';*/

				if($new_id == $result['id'] && $new_dept_name == $result['dept_name']){
					return 1;
				}
				else if($new_id == $result['id']){
					return 2;
				}
				else if($new_dept_name == $result['dept_name']){
					return 3;
				}
				else{	
					$sql = "UPDATE `department` SET `id` = '$new_id', `dept_name` = '$new_dept_name', `status` = '$status', `postby_id` = '$postby_id', `verifiedby_id` = '$verifiedby_id' WHERE `id` = '$id' ";
					$query1 = $this->execute($sql);
					if($query1){
						header('location: ../department.php');
						// return 0;
					}			
				}
			}
			// die();
		}

		public function deleteDepartment($id){
			echo '<br><br>This is id to delete: '.$id;
			$sql = "DELETE FROM `department` WHERE id = $id";
			$query  =  $this->execute($sql);
	        if($query)
	        {
	            header('location: ../department.php');
	        }
		}
		/****** Department Options End ********/

		/******************************************/
		/****** DESIGNATION Options Starts ********/
		/******************************************/

		public function designation(){
			$sql = "SELECT * FROM `designation`";
			$query = $this->execute($sql);
			if($query){
				return $query;
			}
		}

		public function createDesignation($title, $status, $id){
			$sql = "SELECT * FROM `designation` WHERE `title` = '$title'";
		    $query = mysql_query($sql);
		    // $rows = mysql_fetch_assoc($query);
		    $result = mysql_num_rows($query);
		    //echo '<br>'.$result;
		    // echo $rows['email'];
		    // echo '<pre>';
		    // print_r($rows);
		    // echo '</pre>';
		    // die();
		    if(!$result){
		     	echo '<br>Original Entry<br>';
		     	$sql = "INSERT INTO `designation` (`id`, `title`, `postby_id`, `verifiedby_id`, `created_at`, `updated_at`, `verified`, `status`) VALUES ('', '$title', '$id', '$id', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '1', '$status')";
		     	$query = mysql_query($sql);
		     	if($query){
		     		return 1;
		     		// header('location: ../designation.php');
		     	}
		    }
		    while ($rows = mysql_fetch_assoc($query)) {
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
			while($result = mysql_fetch_assoc($query)){
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
			echo '<br><br>This is id to delete: '.$id;
			$sql = "DELETE FROM `designation` WHERE id = $id";
			$query  =  $this->execute($sql);
	        if($query)
	        {
	            header('location: ../../designation.php');
	        }
		}


		/****** Designation Options End ********/

		public function url(){
			$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$validURL = str_replace("&", "&amp;", $url);

			return $validURL;

		}

	}





	$user = new AdminClass();
?>