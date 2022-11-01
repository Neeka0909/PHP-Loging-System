<?php
session_start();

	if (isset($_POST['submit'])){
		
		include_once 'conn.inc.php';
		
		$first = mysqli_real_escape_string($db_conn, $_POST['fname']);
		$last = mysqli_real_escape_string($db_conn, $_POST['lname']);
		$email = mysqli_real_escape_string($db_conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($db_conn, $_POST['upwd']);
		
		//Error handlers
		//Check for empty feild
		
		if (empty($first) || empty($last) || empty($email) || empty($pwd)){
			header("Location: ../signup.php?signup=empty");
			exit();
		}else{
			 //check input feild are valid
			if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
				header("Location: ../signup.php?signup=invalid");
				
					
				exit();
			} else{
				//check email are valid
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					header("Location: ../signup.php?signup=invalidemail");
					
					exit();
				}else{
					$sql = "SELECT * FROM users WHERE user_email = '$email'";
					$result = mysqli_query($db_conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					
						if($resultCheck > 0){
							header("Location: ../signup.php?signup=usertaken");
							exit();
							
						}else{
							//hashing the pwd
							$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
							//insert user data into database
							$sql = "INSERT INTO users (user_first, user_last, user_email, user_pwd) VALUES ('$first', '$last','$email','$hashedPwd');";
							mysqli_query($db_conn, $sql);

							$sqli = "SELECT * FROM users WHERE user_email = '$email'";
							$data = mysqli_query($db_conn, $sqli);
							$row = mysqli_fetch_assoc($data);
															
								$_SESSION['u_id'] = $row['user_id'];
								$_SESSION['u_firet'] = $row['user_first'];
								$_SESSION['u_last'] = $row['user_last'];
								$_SESSION['u_email'] = $row['user_email'];
								$_SESSION['u_uid'] = $row['user_uid'];
					
							
							header("Location: ../index.php"); 
							exit();
						}
				}
			}
		}
		
	}else{
		header("Location: ../signup.php?error");
		exit();
	}