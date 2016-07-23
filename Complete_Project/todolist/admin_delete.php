<?php 
	session_start();
    require('db_connection/db_connection.php');
	$id=$_SESSION['id'];
	
		$stmt1 = $db->prepare("delete from users where user_id=? ");
		$stmt1->execute(array($id));
		//Destination 
		if($stmt1)
		{
		  header('Location:index.php');
		}
		//mysqli_close($db);
?>