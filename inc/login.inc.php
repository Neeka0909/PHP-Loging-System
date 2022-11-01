<?php
	session_start();
	
	
	
if (isset($_POST['submit'])){
	
	include_once 'conn.inc.php';
	
	$uid = mysqli_real_escape_string($db_conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($db_conn, $_POST['upwd']);
	
		$sql = "SELECT * FROM users WHERE user_email = '$uid'";
		$result = mysqli_query($db_conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck < 1){
			header("Location: ../login.php");
			$_SESSION['incorrect'] = "Uname_incorrect";
			exit();
		} else{
			if ($row = mysqli_fetch_assoc($result)){
				//de hashed pwd
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if($hashedPwdCheck == false){
					header("Location: ../login_erorr.php");
					$_SESSION['incorrect']= "pwd_incorrect";
					exit();
				} elseif($hashedPwdCheck == true){
					//log in user 
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
		
		
	} else{
	header("Location: ../index.php?login=error");
	exit();
}