<?php // *************check session*****************	session_start();	if( !isset( $_SESSION['email'] ) && !isset( $_SESSION['pass'] ) )	{		header("location:signin.php");	}	include 'config.php';	if(isset($_REQUEST['id']))	{//*************delete.php****************		$id= $_REQUEST['id'] ;		$Query = "DELETE FROM tbl_contact WHERE st_contact_id= $id ";		mysql_query($Query);		header('location:userprofile.php');	}	else	{		header('location:signin.php');	}?>