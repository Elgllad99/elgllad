<?php
	require_once 'controller/config.php';
		if(isset($_GET['token'])){
			$token = $_GET['token'];
			verifyUser($token); //func
		}
?>

<DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/Normalize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.min.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">

	</head>
	<body>
		
		<div style="border-radius:17px" class="container">
			<div class="form">
				<form action="login.php" method="POST">
				<div class="title">
					<h1 class="head" style="margin:25px auto">Login</h1>
				</div>
				<div class="error2">
					<?php if(count($errors)>0): ?>
						<?php foreach ($errors as $error):?>
							<li><?php echo $error ?></li><br>
						<?php endforeach;?>
					<?php endif;?>
				</div>

				<div class="input_field">
					<label> &nbsp &nbsp Email or username</label>
					<input type="text" name="username" style="font-size:20px" value="<?php echo $username; ?>" placeholder="Username or Email">
					<i class="fas fa-user"></i>
				</div>
				<div class="input_field">
					<label> &nbsp &nbsp Password</label>
					<input type="password" name="password" style="font-size:20px" placeholder="Password">
					<i class="fas fa-lock"></i>
				</div>
				<div class="login">
					<input type="submit" name="log-in" style="color:white" value ="LOGIN">
				</div>
				<div class="forgotPassword">
					<span><a href="forget_password.php">Forgot your Password?</a></span>	
				</div>				
				<div class="send">
					<a href="index.php">Not Yet A Member !</a>
				</div>

				</form>
			</div>
		</div>
	</body>
</html>