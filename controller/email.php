<?php
	
	require_once 'vendor/autoload.php';
	require_once 'db/sensitive.php';

	// Create the Transport
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
	  ->setUsername(EMAIL)
	  ->setPassword(PASSWORD);
	

	// Create the Mailer using your created Transport
	$mailer = new Swift_Mailer($transport);

	//func to email verification
	function sendVerificationEmail($userEmail,$token,$username) 
	{
		global $mailer; // to be access function
		$body = '<!DOCTYPE html>
				<html>
					<head>
						<meta charset="UTF-8">
						<title>Verify Email</title>
					</head>
					<body>
						<div class="wrapper">
						<p>
							<strong>Hello!</strong><br><br/>
							Thank you for registering for my application. Your new account has been created,
							 please click on the link below to verify your email address.
						</p>
						<a href="http://localhost/Faculty-Task/homepage.php?token=' . $token . '">
							Verify your email address</a>
						</div>
					</body>
				</html>';
			// Create a message
	$message = (new Swift_Message('Hello '.$username. ' - verify your email address'))
	  ->setFrom(EMAIL)
	  ->setTo($userEmail)
	  ->setBody($body, 'text/html');
	  ;

	// Send the message
	$result = $mailer->send($message);


	}

	//func to recover password
	function sendPasswordResetLink($userEmail,$token,$username){
		global $mailer; // to be access function
		$body = '<!DOCTYPE html>
				<html>
					<head>
						<meta charset="UTF-8">
						<title>Recover Email</title>
					</head>
					<body>
						<div class="wrapper">
						<p>
							<strong>Hello!</strong><br><br/>
							Pleas Click On The Link below To Reset Password
						</p>
						<a href="http://localhost/Faculty-Task/homepage.php?password-token=' . $token . '">
							Reset Password</a>
						</div>
					</body>
				</html>';		
			// Create a message
	$message = (new Swift_Message('Hello '.$username. ' - Reset Your password'))
	  ->setFrom(EMAIL)
	  ->setTo($userEmail)
	  ->setBody($body, 'text/html');
	  ;

	// Send the message
	$result = $mailer->send($message);


	}