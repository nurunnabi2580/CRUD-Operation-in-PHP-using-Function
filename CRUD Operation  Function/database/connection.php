<?php
	
	$serverName="localhost";
	$userName="root";
	$password="";
	$dbName="table_all";
	$con=mysqli_connect($serverName,$userName,$password,$dbName);
	if ($con) {
		// echo "Database connection success";
	}
	else{
		echo "Error".$con->connect_error();
	}