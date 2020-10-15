<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);	//to see any errors;

	require 'sensitive.php';

	$connection = new mysqli(DB_HOST,DB_USER,DB_PASS, DB_NAME);
	
	if ($connection->connect_error){
		die('Connection Failed:' . $connection->connect_error);
		
	}


?>