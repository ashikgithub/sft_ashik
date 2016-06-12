<?php// **********************start database connection and session********************	include 'config.php';	session_start();	if(!isset($_SESSION['email']) && !isset($_SESSION['pass']) && ($_SESSION['email'] && $_SESSION['pass'])=='')	{		header("location:signin.php");		exit;	}	$id = $_SESSION['id'];	$EMAIL = $_SESSION['email'];	$PASSWORD =$_SESSION['pass'];?><!DOCTYPE HTML>  <html> 	<header>		<title>Contact</title>		<meta charset="utf-8"/>		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>		<link rel = "stylesheet" href = "css/bootstrap.min.css"/>		<link rel = "stylesheet" href = "css/styles.css"/>		<link rel = "stylesheet" href = "css/custom.css"/>				<script src="js/bootstrap.min.js"></script>		<script src="js/jquery.min.js"></script>	</header><body><!-- ******************start backend php code for registration********************* -->			<?php 				include 'config.php'; 				$success_rmessage=$error_message="";				$firststname=$lastname=$address=$email=$contact_date=$phone=$selectOption =$addNew="" ;				$firststnameErr=$lastnameErr=$addressErr=$emailErr=$contact_dateErr=$phoneErr=$imgerror="" ;				$err1= $err2= $err3=$err4=$err5=$err6 = $err7="" ;				$errors = array();/* ******************input field validation********************* */				if (isset($_POST['send'])) 				{							if (!preg_match("/^[a-zA-Z ]*$/", $_POST['firststname']))					{						$errors['firststnameErr']="Please enter your valid first name";						$err1 =$errors['firststnameErr'];					}					if (!preg_match("/^[a-zA-Z ]*$/", $_POST['lastname']))					{						$errors['lastnameErr']="Please enter your valid last name";						$err2 =$errors['lastnameErr'];					}					if (!preg_match("/[A-Za-z0-9\-\\,.]+/", $_POST['address']))					{						$errors['addressErr']="invalid address";						$err3 =$errors['addressErr'];					}					 if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))					{							$errors['emailErr']="invalid email";						$err4 =$errors['emailErr'];					}					if ( !preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/", $_POST['contact_date']) )//2012-09-12					{						$errors['contact_dateErr']="invalid date format";						$err5 =$errors['contact_dateErr'];					}					if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $_POST['phone']))					{						$errors['phoneErr']="invalid phone number";						$err6 =$errors['phoneErr'];					}					else if(empty($_POST['taskOption']))					{						echo "Please select one item";					}												//$st_contact_id=$_POST['st_contact_id'];						$firststname = $_POST['firststname'];						$lastname = $_POST['lastname'];						$address = $_POST['address'];						$email = $_POST['email'];						$contact_date = $_POST['contact_date'];						$phone = $_POST['phone'];						$taskoption  = $_POST['taskOption'];						//$email_exists = mysql_query("SELECT email FROM tbl_contact WHERE email = '$email' ");							$statement=$db->prepare("select email from tbl_contact where email =? ");						$statement->execute(array($email));						$count=$statement->rowCount();/* ******************check, if any error occurs ********************* */					if(empty($errors))					{/* ******************check, if any email that is newly creates, are exist or not in database ********************* */						if($count>0)						{	session_start();							echo "email already exist";						}/* ******************check, if any email are not exist do continue********************* */						else 						{	/* ******************uploading image********************************************** */							$file_name=$_FILES["image_file"]["name"];							$file_ext = substr( $file_name, strripos($file_name, '.') );/* ******************check the extention of uploaded file(png/jpg)format*********************** */							if( ($file_ext  == ".png") || ($file_ext == ".jpg"))							{								$target_path1= 'upload/'.$file_name;								$target_path=move_uploaded_file($_FILES["image_file"]["tmp_name"],'upload/'.$file_name);															$statement=$db->prepare("INSERT INTO tbl_contact (st_contact_id,firststname,lastname,address,email,contact_date,phone,image_name,rel_status) VALUES(?,?,?,?,?,?,?,?,?)");										$statement->execute(array($id,$firststname,$lastname,$address,$email,$contact_date,$phone,$target_path1,$taskoption));								$success_rmessage ="inserted sucessfully";															}							else							{								$imgerror= "your uploaded file must be in png or jpg format";							}											}					}				}											?><!-- ******************start wrapper****************** --><div class="wrapper"><!-- *********start container******************************* -->	<div class="container">		<div class="contact_main col-md-offset-2 col-md-8">			<div class="col-md-12 col-sm-12  contact_header text-center">				<h2>CIF Of					<?php 						$statement2=$db->prepare("select * from registraion where st_id=?");						$statement2->execute(array($id));						$result2=$statement2->fetchAll();						foreach($result2 as $row)						{							echo $row['fastname'].' '.$row['lastname'];						}					?>				</h2><!-- ******************start menu of index page ************ -->									<div class="menu col-md-offset-6 col-md-5 text-right">					<ul>						<li><a href="userprofile.php">Home</a></li>						<li><a href="addContactType.php">New Circle</a></li>					</ul>				</div>			</div><!-- ************registration form for newly comming user**** -->		<form class = "form-horizontal contact_main_form" method="post" action="" enctype="multipart/form-data"> <!-- ******start code in html for newer user contanct*********-->			<div class="form-group  ">					<label class=" col-md-2 col-md-offset-2 text-right" for="usrFN" > First Name: </label>					<div class="col-md-5  ">						<input type = "text" class = "form-control " id="usrFN" placeholder="enter your first name" name="firststname" value='<?php echo $firststname;?>' required>						<p class="error"><?php echo $err1;?></p>					</div>				</div>								<div class="form-group">					<label for="usrLN" class="col-md-2 col-md-offset-2 text-right" >Last Name: </label>					<div class="col-md-5 ">						<input type = "text" class = "form-control " id="usrLN" placeholder="enter your last name" name="lastname" value= '<?php echo $lastname;?>' required>						<p class="error"><?php echo $err2;?></p>					</div>				</div>				<div class="form-group">					<label for="ADDRESS" class="col-md-2 col-md-offset-2 text-right">Address: </label>					<div class="col-md-5 ">						<input type = "text" class = "form-control col-md-6 datepicker" id="ADDRESS" placeholder="enter your address" name="address" value='<?php echo $address;?>' required>						<p class="error"><?php echo $err3;?></p>					</div>				</div>												<div class="form-group">					<label for="Email" class="col-md-2 col-md-offset-2 text-right" >Email: </label>					<div class="col-md-5 ">						<input type = "text" class = "form-control col-md-6" id="Email" placeholder="enter your email" name="email" value='<?php echo $email;?>' required>						<p class="error"><?php echo $err4;?></p>					</div>				</div>				<div class="form-group">					<label for="DATE" class="col-md-2 col-md-offset-2 text-right">Date: </label>					<div class="col-md-5 ">						<input type = "text" class = "form-control col-md-6" id="DATE" placeholder="2016-05-19" name="contact_date" value='<?php echo $contact_date;?>' required>						<p class="error"><?php echo $err5;?></p>					</div>				</div>								<div class="form-group">					<label for="phn" class="col-md-2 col-md-offset-2 text-right">Phone: </label>					<div class="col-md-5 ">						<input type = "text" class = "form-control col-md-6" id="phn" placeholder="017-5296-9287" name="phone" value='<?php echo $phone;?>' required>						<p class="error"><?php echo $err6;?></p>					</div>				</div>				<div class="form-group">					<div class="">						<div class="C_Group">							<div class="col-md-3 col-md-offset-1">								<span class="label label-warning C_lable1">Select Any Group:</span>							</div>							<div class="contact_category col-md-6">								<?php 									include 'config.php';									$statement1=$db->prepare("SELECT DISTINCT rel_name FROM tbl_contact_type WHERE st_contact_id=?");									$statement1->execute(array($id));									$result=$statement1->fetchAll();								?>								<select required class="category_select" name="taskOption">									<option value='' active>Select One</option>									<?php										foreach($result as $row)										{											echo '<option value=" '.$row['rel_name'].' ">'.$row['rel_name'].'</option>';										}									?>								</select>							</div>													</div>												</div>				</div>								<div class="form-group">					<label class="col-md-2 col-md-offset-2 text-right col-md-6">Profile Photo: </label>					<input name="image_file" type="file" required>					<p class="error col-md-offset-1 "><?php echo $imgerror;?></p>				</div>								<div class="form-group" > 					<div class="col-md-offset-1 text-center">						<input class="btn btn-primary" type="submit" value="Create" name="send">					</div>				</div>				<?php 					if(isset($success_rmessage))					{						echo $success_rmessage;					}											echo $error_message;									?>		</form>		<input type="hidden" name="id" value= "<?php echo $id;?>" >		</div>	</div></div>	</body></html>