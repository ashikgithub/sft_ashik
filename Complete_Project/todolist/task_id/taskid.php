<?php 
	
	$taskid='';
	if(isset($_GET['Tid']))
	{
		$taskid= $_GET['Tid'];
	
	}
	/* create encode and decode by base64_decode($string);
	$original = 123;
	$secure = rand(100,999).base64_encode($original);
	$unsecure = substr($secure,3);
	$unsecure = base_64_decode($unsecure);
	echo $unsecure; // will display 123*/
	?>