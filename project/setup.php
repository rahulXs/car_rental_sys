<?php
	$host = "localhost";
	$user = "root";
	$pass = "streakmysql";
	$db = "car_rental_sys";
	
	$conn = mysqli_connect($host, $user, $pass , $db);
	if (!$conn) {
    	die("Connection failed: ".mysqli_connect_error());
	}
?>
