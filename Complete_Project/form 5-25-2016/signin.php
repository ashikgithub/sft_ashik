 <?php /* *****************start session*************** */	include 'config.php';		$type="";	$messErr=$error_message="";	if( $_SERVER["REQUEST_METHOD"] == "POST")  // here post is in uppercase.	{			try		{			if(empty($_POST['email']))			{				throw new Exception('Email field cannot Be empty');							}			if(empty($_POST['pass']))			{				throw new Exception('password field cannot Be empty');			}			$email = $_POST['email'];			$pass=MD5($_POST['pass']);			$Query = "SELECT * FROM registraion WHERE email='$email' AND pass='$pass' ";			$result = mysql_query($Query);			$count = mysql_num_rows($result);			if($count ==1 )			{				session_start();				$_SESSION['email'] =$email;				$_SESSION['pass'] =$pass;				while($row = mysql_fetch_array($result))				{	// *************check loged id is a user or admin ******************					if($row['type']==2)					{						header('location:adminprofile.php?id='.$row['st_id']);											}					else					{						header('location:userprofile.php?id='.$row['st_id']);					}				}			}		else		{			$messErr = "Invalid Username or Password";		}		}		catch(Exception $e)		{			$error_message=$e->getMessage();		}	}?><!DOCTYPE HTML> <html> 	<header>		<title>Log In Form</title>		<meta charset="utf-8"/>		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>		<link rel = "stylesheet" href = "css/bootstrap.min.css"/>		<link rel = "stylesheet" href = "css/styles.css"/>		<script src="js/bootstrap.min.js"></script>		<script src="js/jquery.min.js"></script>			</header><body>	<div class="wrapper">		<div class="container">			<div class="sign_main col-md-offset-3 col-md-6">				<div class="col-md-12 col-sm-12  reg_header text-center">					<h2>User Log In</h2>				</div><!-- ******************html form for log in**************-->				<form class = "form-horizontal" method="post" action="signin.php" >  					<div class="form-group text-center">						<div class="col-md-6 col-md-offset-3">							<span class="error"><?php echo  $error_message;?></span>							<input type = "text" class = "form-control col-md-6" placeholder="enter your email id" name="email">						</div>					</div>										<div class="form-group text-center">						<div class="col-md-6 col-md-offset-3">							<span class="error"><?php echo  $error_message;?></span>							<input type = "password" class = "form-control" placeholder="enter your account password" name="pass">						</div>					</div>										<div class="form-group" > 						<div class="lgbtn  text-center ">							<span class="error"><?php echo  $messErr;?></span>							<input class="btn btn-primary BUTTON col-md-3  col-md-offset-5" type="submit" name="submit" value="Log In">							<a href="">Forget Password</a><br>						</div>											</div>				</form>			</div>					</div>	</div>	</body></html>