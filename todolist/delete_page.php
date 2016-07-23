<?php 
	session_start();
	require_once 'Model/input.php';
	$user = new input();
	if(!$user->getID()){
		header("Location:Log_in.php");
		exit;
	}
	else
	{
		$id= $user->getID();
		$DELETE = $user->delete($id);
		if($DELETE)
		{
	?>
			<script>
				alert("Data Successfully Deleted");
			</script>
	<?php
		}
		header('location:profile_page.php');
	}

		
			

?>
