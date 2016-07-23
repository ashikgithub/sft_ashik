<?php
     
    /*database connection*/	 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = '';
	$dbname="my_database";
	

	$db = mysqli_connect($dbhost, $dbuser, $dbpass);
	if (!$db) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}


?>