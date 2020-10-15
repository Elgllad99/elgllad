<?php


	require 'controller/config.php';

				// verify the user using token
		if(isset($_GET['token'])){
			$token = $_GET['token'];
			verifyUser($token); //func
		}
		
				// Reset the password
		if(isset($_GET['password-token'])){
			$passwordToken = $_GET['password-token'];
			resetPassword($passwordToken); //func
		}		
		/*if($_SERVER['REQUESTMETHOD'] = 'POST'){
			header( "refresh:5;url=homepage2.php" );
		}*/
			
			//destroy session
		if(!isset($_SESSION['id'])){
		header('location: login.php');
	}
		
?>
<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta charset="UTF-8">
			<!-- bootstrap 4 css -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/homepage.css">
		<title>Homepage</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-5 offset-md-4 form-div login">

				<?php if(isset($_SESSION['message'])): ?>	
					<div class="alert <?php echo $_SESSION['alert-class'] ?>">
					<?php?>
						<p class="p"><?php echo $_SESSION['message']; ?></p>
						<?php
						unset($_SESSION['message']);
						unset($_SESSION['alert-class']);
					?>	
					</div>
				<?php endif;?>

					<span> * This page is for training only</span>
					<div class="training">
					<p>Hello <span>Dr: Amr</span>, I hope you like this Task ☺♥ Your student <span><i>"Mohamed Mohamed Fathey Hamoda"</i></span></p>
					
					<div class="welcome">
					<h3> Welcome - <span><?php echo $_SESSION['username']?> :)</span></h3>
					</div>
					<a href="homepage.php?logout=1" class="logout">Logut</a>



					<div class="alert alert-warning">
						You Need To Verify Your Account.
						Pleas Sign in to your Email Accout and Clcik On The Verification Link:
						<strong style="color:#0040ff"><?php echo $_SESSION['email'] ?></strong>
					</div>
					
						<button type="button" name="verfied" class="btn btn-block btn-lg btn-success">I Am Verfied ! </button>
					

				</div>
			</div>
		</div>


	</body>
</html>