<?php
session_start();
	// $hostname = "localhost:3307";
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cnc";
			
	//connect to phpmyadmin
	$connect = mysqli_connect($hostname, $username, $password, $dbname)
			OR DIE ("Connection failed!");

?>
