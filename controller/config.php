<?php

	session_start();

	require 'db/db.php';
	require_once 'email.php';


	$errors = array();
	$fullname = "";
	$username = "";
	$email	  = "";
	
	//if user click on create account
	if(isset($_POST['sign-up'])){
		$fullname		= $_POST['fullname'];
		$username		= $_POST['username'];
		$email			= $_POST['email'];
		$password		= $_POST['password'];
		$passwordConf	=$_POST['passwordConf'];

	
//validation
		if(strlen($fullname)<3){  // Length Of The Input 
        	$errors['fullname'] ="Fullname Too Small";
        }
		if(empty($fullname)){
			$errors['fullname'] = "Name Required";
		}
		$finder = preg_match_all('#(confirm|alert|prompt|src|var|svg)#i', $fullname);
		if($finder){
			$errors['fullname'] = "XSS Detected !";	
		}

		if(empty($username)){
			$errors['username'] = "Username Required";
		}
		$finder = preg_match_all('#(confirm|alert|prompt|src|var|svg)#i', $username);
		if($finder){
			$errors['fullname'] = "XSS Detected!";	
		}	

		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Invalid Email";
		}
		if(empty($email)){
					$errors['email'] = "Email Required";
		}

		if(strlen($_POST['password'])<5){  // Length Of The Input 
			$errors['password'] = "Password Too Weak";	
		}
		if(empty($password)){
					$errors['password'] = "Password Required";
		}
		if($password !== $passwordConf){
			$errors['password'] = "The Two Password do not Match";
		}

	//check duplicate email by Prepared Statements 
		//prepare and bind
	$qaueryemail = "SELECT * FROM users WHERE email=? LIMIT 1"; //limit--> for just ONE record
	$stmt = $connection->prepare($qaueryemail);  
	$stmt->bind_param('s',$email); // s --> String
	$stmt->execute();
	$result = $stmt->get_result(); 
	$usercount = $result->num_rows; //check emails in Database
	$stmt->close();

	if($usercount > 0){
		$errors['email'] = "Email already Exists";
	}
	// save users in database;

	if(count($errors) === 0){
		$password = password_hash($password, PASSWORD_DEFAULT); //encrypt hash :)
		$token = sha1(mt_rand(1, 90000) . 'SALT'); //To prevent CSRF 
		$vefication = false;
		//prepare stmt and bind
		$sql = "INSERT INTO users (fullname,username,email,password,vefication,token) VALUES (?,?,?,?,?,?)";
		$stmt = $connection->prepare($sql);
		$stmt->bind_param('ssssbs',$fullname,$username,$email,$password,$vefication,$token);

	if ($stmt->execute()){
		// login user session
		 $user_id = $connection->insert_id; //func to get last query in db
		 $_SESSION['id']		 = $user_id;
		 $_SESSION['username']	 = $username;
		 $_SESSION['email'] 	 = $email;
		 $_SESSION['vefication'] = $vefication;

		 sendVerificationEmail($email,$token,$username); //invoke func from email.php page

		 //set Welcomed message
		 $_SESSION['message'] = "You Are Now Loged in!";
		 header('location: homepage.php');
		 exit();
	}else{
		$errors['db_error'] = "Failed to register";
	}
}

}

//if user click on login
	if(isset($_POST['log-in'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	
//validation
	if(empty($username)){
		$errors['username'] = "Username Or Email required";

	}
	if(empty($password)){
		$errors['password'] = "Password Required";
	}

	if(count($errors) === 0){
		//prepare stmt
	$stmt = $connection->prepare("SELECT * FROM users WHERE email=? OR username=? LIMIT 1");
	$stmt->bind_param("ss",$username,$username);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_assoc(); //if user exist

	if(password_verify($password,$user['password'])) {
		 $_SESSION['id']		 = $user['id'];
		 $_SESSION['username']	 = $user['username'];
		 $_SESSION['email'] 	 = $user['email'];
		 $_SESSION['vefication'] = $user['vefication'];
		 //set Welcomed message
		// header( "refresh:5;url=homepage2.php" );
		 header('location: homepage2.php');
		 exit();
	}else{
	$errors['login_fail'] = "Wrong Email or Password";
	}
	}
	
}

	// user logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['id']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['vefication']);
	}

	//verify user by token
	function verifyUser($token)
	{
		global $connection; // to be accessable in function
		global $mysqli_query;
		$query = "SELECT * FROM users WHERE token='$token' LIMIT 1";
		$result = mysqli_query($connection,$query);

		if(mysqli_num_rows($result) > 0 ){ //mean if user exist with this token 
			$user = mysqli_fetch_assoc($result);
			$update_query = "UPDATE users SET vefication=1 WHERE token='$token'";
			if(mysqli_query($connection,$update_query)){
				//log user in 
		 $_SESSION['id']		 = $user['id'];
		 $_SESSION['username']	 = $user['username'];
		 $_SESSION['email'] 	 = $user['email'];
		 $_SESSION['vefication'] = 1;
		 //set Welcomed message
		 header('location: homepage2.php');
		 exit();
			}
		}else{
			echo "User not Found";
		}

	}

	//if user click on forgot password 
		if(isset($_POST['forgot-password'])){
			$email = $_POST['email'];

		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Invalid Email";
		}
		if(empty($email)){
					$errors['email'] = "Email Required";
		}

		if(count($errors) == 0){
			//prepare stmt and bind
			$queryforgot="SELECT * FROM users WHERE email=? LIMIT 1";
			$stmt =$connection->prepare($queryforgot);
			$stmt->bind_param('s',$email);
			$stmt->execute();
			$result = $stmt->get_result();
			$user = $result->fetch_assoc();
			$token = $user['token'];
			sendPasswordResetLink($email,$token,$username);
		}
}
	//if user click on resest-password
	if(isset($_POST['resest-password']))
	{
		$password = $_POST['password'];
		$passwordConf = $_POST['passwordConf'];

		if(strlen($_POST['password'])<5){
			$errors['password'] = "Password Too Weak";	
		}
		if(empty($password)){
					$errors['password'] = "Password Required";
		}
		if($password !== $passwordConf){
			$errors['password'] = "The Two Password do not Match";
		}	
		$password = password_hash($password, PASSWORD_DEFAULT); //encrypt hash :)
		$email = $_SESSION['email'];
		if(count($errors)==0){
			
			$query = "UPDATE users SET password='$password' WHERE email='$email'";
			$result = mysqli_query($connection,$query);
			if ($result) {
				header('location: login.php');
				exit(0);
			}
		}	
	}

	//Function reset password by token 
	function resetPassword($token)
	{
		global $connection; // to be accessable in function
		global $mysqli_query;
		$query = "SELECT * FROM users WHERE token='$token' LIMIT 1";
		$result = mysqli_query($connection,$query);
		$user = mysqli_fetch_assoc($result);
		 $_SESSION['email'] = $user['email'];
		 header('location: reset_password.php');
		 exit(0);
	}

