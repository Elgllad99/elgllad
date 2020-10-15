<?php
	require_once 'controller/config.php';
?>

<DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title>Forgot Password</title>
		<link rel="stylesheet" href="css/Normalize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.min.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">

	</head>
	<body>
		
		<div style="border-radius:17px" class="container">
			<div class="form">
				<form action="forget_password.php" method="POST">
				<div class="title">
					<h1 class="head" style="font-weight:700;color:tomato;font-size:20px;margin:25px auto">Recover your Password</h1>
				</div>
				<p style="text-align:ltr;line-height:20px;margin:25px 25px 5px 25px;font-weight:400;color:white;">Pleas enter Your email address you used to sign up on this Form and we will assist you in recovering your password.</p>
				<div class="error2">
					<?php if(count($errors)>0): ?>
						<?php foreach ($errors as $error):?>
							<li><?php echo $error ?></li><br>
						<?php endforeach;?>
					<?php endif;?>
				</div>

				<div class="input_field">
					
					<input  type="text" name="email" style="font-size:20px;" value="<?php echo $email; ?>" placeholder="your Email">
					<i class="fas fa-envelope"></i>
				</div>
				<div class="login0">
					<input style="color:tomato;border-color:tomato;" type="submit" name="forgot-password"  value ="Recover Your Password">
				</form>
			</div>
		</div>
	</body>
</html>