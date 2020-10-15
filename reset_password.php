<?php
	require_once 'controller/config.php';
?>

<DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title>Reset Password</title>
		<link rel="stylesheet" href="css/Normalize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.min.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">

	</head>
	<body>
		
		<div style="border-radius:17px" class="container">
			<div class="form">
				<form action="reset_password.php" method="POST">
				<div class="title">
					<h1 class="head" style="margin:25px auto;color:#2fafc3">Reset password</h1>
				</div>
				<div class="error2">
					<?php if(count($errors)>0): ?>
						<?php foreach ($errors as $error):?>
							<li><?php echo $error ?></li><br>
						<?php endforeach;?>
					<?php endif;?>
				</div>
				<div class="input_field">
					<label> &nbsp &nbsp Enter New Password</label>
					<input type="password" name="password" style="font-size:20px" placeholder="Password">
					<i class="fas fa-lock"></i>
				</div>				
				<div class="input_field">
					<label> &nbsp &nbsp Confirm Password</label>
					<input type="password" name="passwordConf" style="font-size:20px" placeholder="Confirm-Password">
					<i class="fas fa-lock"></i>
				</div>
				<div class="login">
					<input type="submit" name="resest-password" style="color:white" value ="Login">
				</div>
				</form>
			</div>
		</div>
	</body>
</html>