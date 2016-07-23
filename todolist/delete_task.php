<?php 
	session_start();
	require('task_id/taskid.php');
	require_once 'Model/input.php';
	$user = new input();

	$unsecure = substr($taskid,3);
	$tsid = base64_decode($unsecure);
	   	
	$stmt1 =$user->taskDelete($tsid);
	if($stmt1)
	{
		header('Location:show_task.php');
	}
		
?>