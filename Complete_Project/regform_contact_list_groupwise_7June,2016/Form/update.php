<?php // *******start database connection and session*****	session_start();	include 'config.php';	if(!isset($_SESSION['email']) && !isset($_SESSION['pass']) && ($_SESSION['email'] && $_SESSION['pass'])=='')	{		header("location:signin.php");		exit;	}	$id = $_SESSION['id'];	$EMAIL = $_SESSION['email'];	$PASSWORD =$_SESSION['pass'];?><!-- ******update only for user******--><!DOCTYPE HTML>  <html> 	<header>		<title>Update</title>		<meta charset="utf-8"/>		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>		<link rel = "stylesheet" href = "css/bootstrap.min.css"/>		<link rel = "stylesheet" href = "css/styles.css"/>		<script src="js/bootstrap.min.js"></script>		<script src="js/jquery.min.js"></script>	</header>	<body>	<div class="wrapper">		<div class="container">			<div class="login_main col-md-offset-2 col-md-8">				<div class="col-md-12 col-sm-12  reg_header text-center">					<h2>Update Registration Form</h2><!-- *******************menu section for user**************************** -->					<div class="menu col-md-offset-7 col-md-5 text-right">						<ul>							<li><a href ="userprofile.php">Home</a></li>							<li><a href="logout.php"> Sign Out</a></li>													</ul>					</div>				</div>													<?php					/*						$Query = "SELECT * FROM registraion WHERE st_id = '$id' ";						$result = mysql_query($Query);					 */					$fastname_old = $lastname_old=$email_old = $session_old= $roll_old=$subj_old=$pass_old=$image_old="";					$err1= $err2= $err3=$err4=$err5=$err6 = $err7="" ;					$statement1=$db->prepare("SELECT * FROM registraion WHERE st_id =? ");					$statement1->execute(array($id));					$result1=$statement1->fetchAll();															//**********php code for take existing field value*****					foreach($result1 as $row)					{						$fastname_old=$row['fastname'];						$lastname_old=$row['lastname'];						$email_old=$row['email'];						$session_old=$row['session'];						$roll_old=$row['roll'];						$subj_old=$row['subj'];						//$pass_old=$row['pass'];						$image_old=$row['image_name'];					}									?>																<?php 										$fastnameErr = $lastnameErr = $emailErr = $sessionErr = $rollErr = $subjErr = $imgerror = $passErr =$success_rmessage="";//*****************input field validation**************************					$errors = array();						if(isset($_POST['send']))					{							if (!preg_match("/^[a-zA-Z ]*$/", $_POST['fastname']))						{							$errors['fastnameErr']="Please enter your valid first name";							$err1 =$errors['fastnameErr'];						}						if (!preg_match("/^[a-zA-Z ]*$/", $_POST['lastname']))						{							$errors['lastnameErr']="Please enter your valid lastt name";							$err2 =$errors['lastnameErr'];						}						if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))								{								$errors['emailErr']="invalid email";							$err3 =$errors['emailErr'];						}						if (!preg_match("/^[0-9-]*$/", $_POST['session']))						{							$errors['sessionErr']="invalid session";							$err4 =$errors['sessionErr'];						}						if ( !preg_match("/^[0-9]*$/", $_POST['roll']) )						{							$errors['rollErr']="roll number must be integer";							$err5 =$errors['rollErr'];						}						if (!preg_match("/^[a-zA-Z]*$/", $_POST['subj']))						{							$errors['subjErr']="invalid subject name";							$err6 =$errors['subjErr'];						}							$fastname = $_POST['fastname'];							$lastname = $_POST['lastname'];							$email = $_POST['email'];								$session = $_POST['session'];							$roll = $_POST['roll'];							$subj = $_POST['subj'];							//$pass = MD5($_POST['pass']);							if(empty($errors))							{//******** php code for file(image) upload *********								$file_name=$_FILES["image_file"]["name"];								$file_ext = substr( $file_name, strripos($file_name, '.') );//***verify img extention in .jpg & .png fornat*****										if(!empty($file_name))								{									if( ($file_ext  == ".png") || ($file_ext == ".jpg"))									{										$target_path1= 'upload/'.$file_name;											$target_path=move_uploaded_file($_FILES["image_file"]["tmp_name"],'upload/'.$file_name);										/*										$Query = "UPDATE registraion SET fastname='$_POST[fastname]', lastname='$_POST[lastname]', email= '$_POST[email]',										session= '$_POST[session]',roll= '$_POST[roll]',subj= '$_POST[subj]', pass= '$pass', 										image_name= '".$target_path1."' WHERE st_id='$id' ";										mysql_query($Query);										*/										$statement2=$db->prepare("UPDATE registraion SET fastname =?, lastname =?, email =?, session =?, roll =?, subj =?,image_name =? WHERE st_id =?");												$statement2->execute(array($fastname,$lastname,$email,$session,$roll,$subj,$target_path1,$id));										$success_rmessage ="updated sucessfully";																			}									else									{										$imgerror= "your uploaded file must be in png or jpg format ";									}								}										$target_path1= 'upload/'.$file_name;											$target_path=move_uploaded_file($_FILES["image_file"]["tmp_name"],'upload/'.$file_name);										/*										$Query = "UPDATE registraion SET fastname='$_POST[fastname]', lastname='$_POST[lastname]' ,  										session= '$_POST[session]',roll= '$_POST[roll]',subj= '$_POST[subj]', pass= ''$pass'', 										WHERE st_id='$id' ";										mysql_query($Query);										echo "updated successfully";										*/										$statement3=$db->prepare("UPDATE registraion SET fastname =?, lastname =?, email =?, session =?, roll =?, subj =? WHERE st_id =?");												$statement3->execute(array($fastname,$lastname,$email,$session,$roll,$subj,$id));										$success_rmessage ="updated sucessfully";							}						}				?>						<!-- ********** html input form for user update******-->				<form class = "form-horizontal" method="post" action="update.php" enctype="multipart/form-data">  <!--update.php --><!-- ***************** user first name***************-->									<div class="form-group  ">						<label class=" col-md-2 col-md-offset-2 text-right" for="usrFN" > First Name: </label>						<div class="col-md-5  ">							<input type = "text" class = "form-control " id="usrFN" value="<?php echo $fastname_old; ?>" name="fastname" required>							<p class="error"><?php echo $err1;?></p>						</div>					</div><!-- ***************** user last name***************-->							<div class="form-group">						<label for="usrLN" class="col-md-2 col-md-offset-2 text-right" >Last Name: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control " id="usrLN" value="<?php echo $lastname_old; ?>" name="lastname" required>							<p class="error"><?php echo $err2;?></p>						</div>					</div>	<!-- ***************** user email name*******************-->							<div class="form-group">						<label for="Email" class="col-md-2 col-md-offset-2 text-right" >Email: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="Email" value="<?php echo $email_old; ?>" name="email" >						<p class="error"><?php echo $err3;?></p>						</div>					</div><!-- ***************** user session*******************-->							<div class="form-group">						<label for="SESSION" class="col-md-2 col-md-offset-2 text-right">Session: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6 datepicker" id="SESSION" value="<?php echo $session_old; ?>" name="session" required>							<p class="error"><?php echo $err4;?></p>						</div>					</div><!-- ***************** user rolll*******************-->								<div class="form-group">						<label for="ROLL" class="col-md-2 col-md-offset-2 text-right">Roll: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="ROLL" value="<?php echo $roll_old; ?>" name="roll" required>							<p class="error"><?php echo $err5;?></p>						</div>					</div><!-- ***************** user subject name*******************-->										<div class="form-group">						<label for="sjt" class="col-md-2 col-md-offset-2 text-right">Subject: </label>						<div class="col-md-5 ">							<input type = "text" class = "form-control col-md-6" id="sjt" value="<?php echo $subj_old; ?>" name="subj" required>							<p class="error"><?php echo $err6;?></p>						</div>					</div>	<!-- ***************** user image*******************-->							<div class="form-group">						<label class="col-md-2 col-md-offset-2 text-right col-md-6">Image: </label>						<input type="file" name="image_file">												<p class="error col-md-offset-1 "><?php echo $imgerror;?></p>						<p class="col-md-offset-2 "><?php echo $image_old;?></p>					</div><!-- ***************** submit updated info************** -->												<div class="form-group" > 						<div class="col-md-offset-1 text-center">							<p class="col-md-offset-2"><?php echo $success_rmessage;?></p>							<input class="btn btn-primary" type="submit" value="Update" name="send">						</div>						<input type="hidden" name="id" value="<?php echo $id;?>">					</div>									</form>			</div>		</div>	</div></body></html>