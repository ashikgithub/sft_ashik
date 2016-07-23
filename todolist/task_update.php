<?php 
	session_start();
	require('task_id/taskid.php');
    require_once 'Model/input.php';
	$user = new input();

	if(!$user->getSession() && !$user->getID())
	{
		header("Location:Log_in.php");
		exit;
	}
  		$unsecure = substr($taskid,3);
		$tsid = base64_decode($unsecure);  
  
	if(isset($_POST['update']))			
	{
		$ttitle = $_POST['ttitle'];
		$tdes = $_POST['tdes']; 
		$date = $_POST['date']; 
	}
		$result = $user->updateTask($ttitle,$tdes,$date,$tsid);
		if($result)
		{
?>
			<script>alert("Task Successfully Updated");</script>
<?php		
		}
	
?>
	   
		//mysqli_close($db);
