<?php 
	session_start();
	require('db_connection/db_connection.php');
	require('task_id/taskid.php');
	include 'procedure.php'; 
	include 'function.php'; 

	if( !empty(check_authentication()) )
	{
		header("Location:Log_in.php");
	}
	else
	{	$selected_val = $_POST['select_status'];
		 if(isset($_POST['update']))
		{
			
			//echo $selected_value; die();
			list($stmt)=status_Update($selected_val,$taskid);
			//var_dump($selected_val); exit;
			 //echo $result; die();
		    if($stmt)
			{
			  header('Location:show_task.php');
			}
		}
	}
   
	   
		//mysqli_close($db);
?>