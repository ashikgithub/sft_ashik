<?php 	session_start();		if( !isset( $_SESSION['email'] ) && !isset( $_SESSION['pass'] ) )	{		header("location:signin.php");	}	include 'config.php';	if(isset($_REQUEST['id']))	{		$id= $_REQUEST['id'] ;			}	else	{		header('location:user.php');	}?><!DOCTYPE HTML>  <html> 	<header>		<title>Update</title>		<meta charset="utf-8"/>		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>		<link rel = "stylesheet" href = "css/bootstrap.min.css"/>		<link rel = "stylesheet" href = "styles.css"/>		<script src="js/bootstrap.min.js"></script>		<script src="js/jquery.min.js"></script>			</header>	<body>		<div class="wrapper">		<div class="container">			<div class="login_main col-md-offset-2 col-md-8">				<div class="col-md-12 col-sm-12  reg_header text-center">					<h2>Update Registration Form</h2>					<div class="menu col-md-offset-7 col-md-4 text-right">						<ul>							<li><a href="user.php"> Home </a></li>							<li><a href="logout.php"> Sign Out</a></li>							<!-- <a href ="" >Sign Out</a> -->						</ul>					</div>				</div>								<?php 					$Query = "SELECT * FROM registraion WHERE st_id = '$id' ";					$result = mysql_query($Query);					$fastname_old = $lastname_old=$email_old = $session_old= $roll_old=$subj_old=$pass_old="";					while($row = mysql_fetch_array($result))					{						$fastname_old=$row['fastname'];						$lastname_old=$row['lastname'];						$email_old=$row['email'];						$session_old=$row['session'];						$roll_old=$row['roll'];						$subj_old=$row['subj'];						$pass_old=$row['pass'];											}					if(isset($_POST['send']))					{						$Query = "UPDATE registraion SET fastname='$_POST[fastname]', lastname='$_POST[lastname]' , email= '$_POST[email]', session= '$_POST[session]',roll= '$_POST[roll]',subj= '$_POST[subj]', pass= '$_POST[pass]' WHERE st_id=$id ";						mysql_query($Query);						echo "updated successfully";											}														?>				<form class = "form-horizontal" method="post" action="update.php?id=<?php  echo $id; ?> " >  <!--update.php -->									<div class="form-group  ">						<label class=" col-md-2 col-md-offset-2 text-right" for="usrFN" > First Name: </label>						<div class="col-md-5  ">							<input type = "text" class = "form-control " id="usrFN" value="<?php echo $fastname_old; ?>" name="fastname" required>													</div>					</div>										<div class="form-group">						<label for="usrLN" class="col-md-2 col-md-offset-2 text-right" >Last Name: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control " id="usrLN" value="<?php echo $lastname_old; ?>" name="lastname" required>													</div>											</div>											<div class="form-group">						<label for="Email" class="col-md-2 col-md-offset-2 text-right" >Email: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="Email" value="<?php echo $email_old; ?>" name="email" required>													</div>					</div>										<div class="form-group">						<label for="SESSION" class="col-md-2 col-md-offset-2 text-right">Session: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6 datepicker" id="SESSION" value="<?php echo $session_old; ?>" name="session" required>													</div>					</div>										<div class="form-group">						<label for="ROLL" class="col-md-2 col-md-offset-2 text-right">Roll: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="ROLL" value="<?php echo $roll_old; ?>" name="roll" required>													</div>											</div>										<div class="form-group">						<label for="sjt" class="col-md-2 col-md-offset-2 text-right">Subject: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="sjt" value="<?php echo $subj_old; ?>" name="subj" required>													</div>											</div>											<div class="form-group">						<label for="pwd" class="col-md-2 col-md-offset-2 text-right col-md-6">Password: </label>						<div class="col-md-5 ">							<input type = "password" class = "form-control" id="pwd" value="<?php echo $pass_old; ?>" name="pass" required>													</div>					</div>										<div class="form-group" > 						<div class="col-md-offset-1 text-center">							<input class="btn btn-primary" type="submit" value="Update" name="send">												</div>					</div>									</form>			</div>					</div>	</div>	</body></html>