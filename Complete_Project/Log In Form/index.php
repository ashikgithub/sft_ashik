<?php /*	session_start();		if( !isset( $_SESSION['email'] ) && !isset( $_SESSION['pass'] ) )	{		header("location:signin.php");	}*/?><!DOCTYPE HTML>  <html> 	<header>		<title>Registration</title>		<meta charset="utf-8"/>		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>		<link rel = "stylesheet" href = "css/bootstrap.min.css"/>		<link rel = "stylesheet" href = "styles.css"/>		<script src="js/bootstrap.min.js"></script>		<script src="js/jquery.min.js"></script>			</header>	<body>		<div class="wrapper">		<div class="container">					<?php 				include 'config.php';								$success_rmessage=$error_message="";				if (isset($_POST['send'])) 				{ 											if( !empty($_POST['fastname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['session']) && !empty($_POST['roll']) && !empty($_POST['subj']) && !empty($_POST['pass']) )					{						$fastname = $_POST['fastname'];						$lastname = $_POST['lastname'];						$email = $_POST['email'];						$session = $_POST['session'];						$roll = $_POST['roll'];						$subj = $_POST['subj'];						/*$pass =MD5($_POST['pass']) ;*/						$pass = MD5($_POST['pass']);						$Query = "INSERT INTO registraion ( fastname, lastname, email, session, roll, subj, pass) VALUES ( '$fastname', '$lastname', '$email', '$session', '$roll', '$subj','$pass' )";						mysql_query($Query);												$success_rmessage="successfull";					}					else					{						$error_message="some error occurs during your submission";					}				}			?>			<div class="login_main col-md-offset-2 col-md-8">				<div class="col-md-12 col-sm-12  reg_header text-center">					<h2>Registration Form</h2>					<div class="menu col-md-offset-7 col-md-4 text-right">						<ul>							<li><a href="user.php"> Home </a></li>							<li><a href="logout.php"> Sign Out</a></li>							<!-- <a href ="" >Sign Out</a> -->						</ul>					</div>				</div>												<form class = "form-horizontal" method="post" action="index.php" >  									<div class="form-group  ">						<label class=" col-md-2 col-md-offset-2 text-right" for="usrFN" > First Name: </label>						<div class="col-md-5  ">							<input type = "text" class = "form-control " id="usrFN" placeholder="enter first name" name="fastname" required>													</div>					</div>										<div class="form-group">						<label for="usrLN" class="col-md-2 col-md-offset-2 text-right" >Last Name: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control " id="usrLN" placeholder="enter last name" name="lastname" required>													</div>											</div>											<div class="form-group">						<label for="Email" class="col-md-2 col-md-offset-2 text-right" >Email: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="Email" placeholder="enter email" name="email" required>													</div>					</div>										<div class="form-group">						<label for="SESSION" class="col-md-2 col-md-offset-2 text-right">Session: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6 datepicker" id="SESSION" placeholder="enter session" name="session" required>													</div>					</div>										<div class="form-group">						<label for="ROLL" class="col-md-2 col-md-offset-2 text-right">Roll: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="ROLL" placeholder="enter roll" name="roll" required>													</div>											</div>										<div class="form-group">						<label for="sjt" class="col-md-2 col-md-offset-2 text-right">Subject: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="sjt" placeholder="enter subject" name="subj" required>													</div>											</div>											<div class="form-group">						<label for="pwd" class="col-md-2 col-md-offset-2 text-right col-md-6">Password: </label>						<div class="col-md-5 ">							<input type = "password" class = "form-control" id="pwd" placeholder="enter password" name="pass" required>													</div>					</div>										<div class="form-group" > 						<div class="col-md-offset-1 text-center">							<input class="btn btn-primary" type="submit" value="Create Now" name="send">												</div>					</div>					<?php 						if(isset($success_rmessage))						{							echo $success_rmessage;						}													echo $error_message;											?>				</form>			</div>					</div>	</div>	</body></html>