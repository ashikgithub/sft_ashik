
<?php require('header/header.html');?>
      
<?php
session_start();
    spl_autoload_register(function($class){
	include "Model/".$class.".php";
	});
?>
<?php
	$message="";
	$messagePWD="";
	$fname="";
	$lname="";
	$email="";
	$session="";
	$roll="";
	$subject="";
	$pwd="";
	$error="";
?> 

<?php
	

	if(isset($_POST['submit'])){
	
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST['fname'])){
				$error['fname'] = "Your First Name Must Contain Letters and White Spaces!"; 
		}
		 if (!preg_match("/^[a-zA-Z ]*$/",$_POST['lname'])){
			$error['lname'] = "Your Last Name Must Contain Letters and White Spaces!"; 
		 }
		 if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$error['email'] = "Invalid email format"; 
		 }
		 if (!preg_match("/(\d{4})-(\d{4})/",$_POST['session'])){
			$error['session'] = "Your Session Must Contain Numbers(4 digits)-Numbers(4 digits)!"; 
		 }
		 if(!preg_match("/^[1-9][0-9]{0,15}$/",$_POST['roll'] )){
			 $error['roll'] = "Your Roll Must Contain Numbers!";
		 }
		 if(!preg_match("#[A-Za-z]+#",$_POST['subject'])){
			 $error['subject'] = "Your subject Must Contain Letters!";
		 }

		 if (strlen($_POST['pwd'] ) <= '8'){
				$error['pwd'] = "Your Password Must Contain At Least 8 Characters!";
		 }
			elseif(!preg_match("#[0-9A-Za-z]+#",$_POST['pwd'])){
				$error['pwd'] = "Password Must be at least 1 Number, 1 capital and 1 lowercase letter!";
				
			}

			
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$session = $_POST['session'];
			$roll = $_POST['roll'];
			$subject = $_POST['subject'];
			$pwd = MD5($_POST['pwd']);

	}

		if(!empty($error)){
				foreach ($error as $single_error)
					$message .=$single_error."<br>";
			}
			
			
			$ver = new input();
	 		$ver->setFname($fname);
	 		$ver->setLname($lname);
	 		$ver->setEmail($email);
	 		$ver->setSession($session);
	 		$ver->setRoll($roll);
	 		$ver->setSubject($subject);
	 		$ver->setPassword($pwd);
	 		
 ?>
	        <section>
			    <nav class="navbar navbar-style navbar-fixed-top">
					<div class="container">
						<div class="navbar-header">
							<button type = "button" class = "navbar-toggle navbar-btn-style" data-toggle = "collapse" data-target = "#navbar-collapse">
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>				 
							</button>
				            <a class = "navbar-brand" href = "#"> Registration Form </a>
			            </div>
						<!--Right Menu-->
			            <div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
							   <li class="reg-form"><a href="Form1.php" ><span class="glyphicon glyphicon-user ricon"></span>Registration</a></li>
							   <li class="log-form"><a href="Log_in.php" ><span class="glyphicon glyphicon-log-in licon"></span>Log IN</a></li>
							</ul>
						</div>
						<!--Right menu-->
		           </div>
	
	            </nav>
			</section>
			<!--Main Form-->
	        <section>



				 <div class="container container-bg">
					 <div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary panel-style">
							   <div class="panel-heading ph-style">Registration Form</div>
							   <div class="panel-body panel-body-style">
							       <div class="alert-success alert-style">
								       <?php if(!empty($message)):?>
									   <p><?php echo $message; ?></p>
									   <?php endif ?>

									    <?php if(!empty($Successful)):?>
									   <p><?php echo $Successful; ?></p><?php endif ?>
								   </div>
								   <form action="" class="form-horizontal" role="form" method="POST">
                           <?php
								if($ver->insert())
									echo "<span class='insert'> Insertion Successful</span>";
							?>
                                        <div class="form-group has-feedback has-feedback-right">
                                           <label class="control-label col-md-3" for="fname">First Name:</label>
                                           <div class="col-md-5">
                                               <input type="text" class="form-control" name="fname" placeholder="Enter Your First Name" required="1">
											   <i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
										</div>
										
                                        <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="lname">Last Name:</label>
											<div class="col-md-5"> 
												<input type="lname" class="form-control" name="lname" placeholder="Enter Your Last Name" required="1">
												 <i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="email">Email:</label>
											<div class="col-md-5"> 
												<input type="email" class="form-control" name="email" placeholder="Enter Your Email" required="1" >
												<i class="form-control-feedback glyphicon glyphicon-envelope"></i>
											</div>
											
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="session">Session:</label>
											<div class="col-md-5"> 
												<input type="session" class="form-control" name="session" placeholder="Enter Your Session" required="1">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="roll">Roll:</label>
											<div class="col-md-5"> 
												<input type="roll" class="form-control" name="roll" placeholder="Enter Your roll" required="1">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="subject">Subject:</label>
											<div class="col-md-5"> 
												<input type="subject" class="form-control" name="subject" placeholder="Enter Your Subject Name" required="1">
												<i class="form-control-feedback glyphicon glyphicon-book"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="pwd">Password:</label>
											<div class="col-md-5"> 
												<input type="password" class="form-control" name="pwd" placeholder="Enter Your Password" required="1">
												<i class="form-control-feedback glyphicon glyphicon-lock"></i>
											</div>
									   </div>
										<div class="form-group"> 
											<div class="col-md-offset-3 col-md-5 btn-style">
											  <button type="submit" class="btn btn-primary btn-lg " name="submit">Submit</button>
											</div>
										</div>
									</form>
							   </div>
							</div>
						</div>
					 </div>
				 
				  </div>
		        </section>
				




		      <!--End Form-->




		      
<?php require('footer/footer.html');?>