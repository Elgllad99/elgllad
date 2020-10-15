<?php


	require 'controller/config.php';
			
			//destroy session
		if(!isset($_SESSION['id'])){
		header('location: login.php');
	}
		
?>
<!DOCTYPE html>
<html dir="ltr">
	<head>
		<meta charset="UTF-8">
		<title>Homepage</title>
		<link rel="stylesheet" href="css/homepage2.css">
		<link rel="stylesheet" href="fontawesome-free-5.5.0-web/css/all.css">

	</head>
	<body>
		<div class="container">
			<div class="side-bar">
				<header>faculty <i class="fas fa-atom" id="science"></i>f science</header>
				<ul>	
					<li><a href="#"><i class="fas fa-th"></i>The Academic Schedule</a></li>
					<li><a href="#"><i class="fas fa-chevron-circle-right"></i>Second Term Records 2020</a></li>
					<li><a href="#"><i class="fas fa-chevron-circle-left"></i>Second Term Results 2020</a></li>					
					<li><a href="#"><i class="fas fa-th-list"></i>desires scientific science</a></li>
					<li><a href="#"><i class="fas fa-th-list"></i>desires scientific mathematics</a></li>
					<li><a href="#"><i class="fas fa-exclamation-circle"></i>Enrollment Problems</a></li>
					<li><a href="#"><i class="fas fa-clipboard-check"></i>Enrollment Printing</a></li>
					<li><a href="#"><i class="fas fa-envelope"></i>Academic mail </a></li>
					<li><a href="#"><i class="fas fa-list-ol"></i>Colleg List</a></li>
					<li><a href="#"><i class="far fa-question-circle"></i>Suggestion and Complains</a></li>
					<li><a href="#"><i class="fas fa-cogs"></i>Setting</a></li>
					<a href="homepage.php?logout=1" class="logout"><i class="fas fa-sign-out-alt"></i>Logut</a>
				</ul>
				</ul>
			</div>
		</div>

		<section></section>
	</body>
</html>