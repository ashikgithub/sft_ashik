<?php// ************connect database and start session	include 'config.php';	session_start();	if(!isset($_SESSION['email']) && !isset($_SESSION['pass']) && ($_SESSION['email'] && $_SESSION['pass'])=='')	{		header("location:signin.php");		exit;	}		$id= $_SESSION['id'] ;		$EMAIL = $_SESSION['email'];	$PASSWORD =$_SESSION['pass'];	?><!DOCTYPE HTML>  <html> 	<header>		<title>Admin Profile</title>		<meta charset="utf-8"/>		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>		<link rel = "stylesheet" href = "css/bootstrap.min.css"/>		<link rel = "stylesheet" href = "css/styles.css"/>		<link rel = "stylesheet" href = "css/custom.css"/>		<link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>		<script src="js/bootstrap.min.js"></script>		<script src="js/jquery.min.js"></script>	</header><body>	<div class="wrapper">		<div class="container admin_page"><!-- *************admin profile******************************--><!-- *************admin panel title*********-->			<div class="">				<div class="col-md-12 text-center admin_header">					<h1>Welcome To Admin</h1>				</div>			</div><!-- *************profile picture of admin******************************-->			<div class="">				<div class="col-md-2 admin_photo">					<?php						$statement = $db->prepare("select * from registraion where email=? and pass=? and st_id=?");						$statement->execute(array($EMAIL,$PASSWORD,$id));						$result = $statement->fetchAll();												foreach($result as $row)						{	//**************check the logged id is a user or not*****************************							if($row['type']==2)							{								$i=0;								foreach($result as $row)								{									$i++;					?>									<img src="<?php echo $row['image_name']; ?>" alt=""/>							<?php									}							}//********************* if logged id is a user then cont. it**********************							else							{								header('location:signin.php');							}						}							?>				</div>				<div class="col-md-8 col-md-offset-2 admin_menu">					<ul class="admin_menu_ul">						<li><a href="adminprofile.php">Home </a></li>						<li><a href="dashboard.php">View All</a></li>						<!-- <li><a href="adminContact.php">Add Contact</a></li> -->						<?php							foreach($result as $row)							{																	if($row['type']==2)								{									$i=0;									$_SESSION['auid']= $row['st_id'];									$_SESSION['auEmail']= $row['email'];									$_SESSION['auPass']= $row['pass'];																		foreach($result as $row)									{										$i++;						?>														<li><a href="adminUpdate.php">Edit</a></li>						<?php									}								}								else								{									header('location:signin.php');								}							}						?>									<li><a href="logout.php">Sign Out</a></li>					</ul>					<div class="">						<div class="Visit_User">							<div class="col-md-4 col-md-offset-1 ">								<span class="label label-primary user_lable">Visit User Conatact Book:</span>							</div>							<div class="col-md-4">								<?php 									$statement1 = $db->prepare("select distinct rel_status FROM tbl_contact");									$statement1->execute();//SELECT * FROM tbl_contact 									$result1 = $statement1->fetchAll();																?>								<select onchange="location=this.value;">									<option value="adminViewContact" active>View User Contact</option>									<?php 										foreach($result1 as $row)										{											//echo '<option value=" '.$row['rel_name'].' ">'.$row['rel_name'].'</option>';											//echo "<option value='userViewContactGroup.php?uid=".$row['st_contact_id'].' &&  var= '.$row['rel_name']."'>".$row['rel_name']."</option>";											echo "<option value=' adminViewContact.php?av_id=" .$row['rel_status']. " '> ".$row['rel_status']." </option>";										}//.$row['st_contact_id'].									?>								</select>							</div>						</div>					</div>				</div>			</div>			<div class="">				<div class="col-md-12 text-left admin_name">					<?php						$statement2 = $db->prepare("select * from registraion where email=? and pass=? ");						$statement2->execute(array($EMAIL,$PASSWORD));						$result2 = $statement2->fetchAll();						foreach($result2 as $row)						{	//**************check the logged id is a user or not*****************************														if($row['type']==2)							{								$i=0;								foreach($result2 as $row)								{									$i++;					?>									<h1 class="name_title">										<?php  echo $row['fastname']. " " .$row['lastname']; ?>									</h1>							<?php									}							}							else							{								header('location:signin.php');							}						}							?>				</div>							</div>			<div class="row">				<div class="col-md-6 part1_label text-left">						<label class="labling">Email</label><br>					<label class="labling">Session</label><br>					<label class="labling">Roll No</label><br>					<label class="labling">Subject Name</label>				</div>				<div class="col-md-6 part1_input text-left">					<?php						foreach($result2 as $row)						{															if($row['type']==2)							{								$i=0;								foreach($result2 as $row)								{									echo $row['email'];									echo "<br>";									echo $row['session'];										echo "<br>";									echo $row['roll'];									echo "<br>";									echo $row['subj'];									}							}							else							{								header('location:signin.php');							}						}					?>				</div>			</div>							</div>	</div><!-- -*****************script for delete conformation -->			<script>					function Confirm_Delete()					{					  return confirm("Are you sure you want to delete?");					 					}			</script>	</body></html>