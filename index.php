<?php
	require_once 'controller/config.php';
	
?>

<DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title>Register</title>
		<link rel="stylesheet" href="css/Normalize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.min.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">
	</head>
	<body>
		
		<div class="container">
			<div class="form">
				<form action="index.php" method="POST">
				<div class="title">
					<h1>Registration</h1>
					<h2>All Field Mandatory</h2><br><br>
				</div>
				<div class="error">
				<?php if(count($errors) > 0): ?>
					
						<?php foreach ($errors as $error): ?> 
							<li><?php echo $error ;?></li>
						<?php endforeach ?>
				<hr></hr>
				<?php endif ;?>
				</div>

				<div class="input_field">
					<label> &nbsp &nbsp name</label>
					<input type="text" name="fullname" style="font-size:20px"  value="<?php echo $fullname ;?>" placeholder="Your full name">
					<i class="fas fa-signature"></i>
				</div>
				<div class="input_field">
					<label> &nbsp &nbsp username</label>
					<input type="text" name="username" style="font-size:20px" value="<?php echo $username ?>" placeholder="Username">
					<i class="fas fa-user"></i>
				</div>
				<div class="input_field">
					<label> &nbsp &nbsp Email</label>
					<input type="email" name="email" style="font-size:20px"  value="<?php echo $email ;?>"  placeholder="Email">
					<i class="far fa-envelope"></i>
				</div>
				<div class="input_field">
					<label> &nbsp &nbsp Password</label>
					<input type="password" name="password" style="font-size:20px" placeholder="Password">
					<i class="fas fa-lock"></i>
				</div>
				<div class="input_field">
					<label> &nbsp &nbsp Confirm Password</label>
					<input type="password" name="passwordConf" style="font-size:20px" placeholder="Confirm-Password">
					<i class="fas fa-lock"></i>
				</div>
				<div>
					<input type="submit" name="sign-up" style="color:white"  value ="CREATE ACCOUNT">
				</div>
				<div class="send0">
					<a href="login.php">i'am already a member !</a><br>
				</div>
					<div class="social-media">
					<div class="item-facebook">
					<a href="https://www.facebook.com/login"><i class="fab fa-facebook-f"></i></a>	
					</div>
					<div class="item-pinterest">
						<a href="https://www.pinterest.com/login/"><i class="fab fa-pinterest"></i></a>
					</div>					
					<div class="item-twitter">
						<a href="https://twitter.com/twitt_login?lang=ar"><i class="fab fa-twitter"></i></a>
					</div>
				</div>
				</form>
			</div>
		</div>

	</body>
</html>