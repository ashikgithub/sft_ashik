<?php
	/*require_once "Model/input.php";*/

	spl_autoload_register(function($class){
		include "Model/".$class.".php";
	});
	$user = new input();
	if($user->getSession())
	{
		header('location:profile_page.php');
		exit;
	}
?>
<?php 

    $message="";
	 $fname="";
	 $lname="";
	 
	 $session="";
	 $roll="";
	 $error_email="";
	 $pwd="";
	
	//cse11Batch
	$users="user";
	$admin="admin";
	$admin_mail="cseku.palash2011@gmail.com";
	$message='';
?>
<?php require('header/header.html');?>
            <!--Navbar -->
	        <section>
			    <nav class="navbar navbar-style navbar-fixed-top">
					<div class="container">
						<div class="navbar-header ">
							<button type = "button" class = "navbar-toggle navbar-btn-style" data-toggle = "collapse" data-target = "#navbar-collapse">
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>				 
							</button>
				            <a class = "navbar-brand" href = "#"> Log In Form </a>
			            </div>
						<!--Right Menu-->
			            <div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
							   <li class="reg-form"><a href="Form1.php" ><span class="glyphicon glyphicon-user ricon"></span>Registration</a></li>
							   
							</ul>
						</div>
						<!--Right Menu-->
		           </div>
	
	            </nav>
			</section>
			<!--Main Form-->
	        <section>
				 <div class="container container-bg">
					 <div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="panel panel-primary panel-style">
							   <div class="panel-heading ph-style">Log In Form</div>
							   <div class="panel-body panel-body-style">
							       <div class="alert-danger">
								       <?php if(!empty($message)):?>
									   <p><?php echo $message ?></p>
									   <?php endif ?>
								   </div>
			
								  
 <form action="Log_in.php" class="form-horizontal" role="form" method="POST">
		<?php
			if($_SERVER["REQUEST_METHOD"]== 'POST')
			{
				if(isset($_POST['login']))
				{
					$email =$_POST['email'];
					$pwd =$_POST['pwd'];
					if(empty($email) || empty($pwd))
					{
						echo "<span style='color:red' >Both Field Must Be Required!!!</span>";
					}
					else
					{
						$password=MD5($pwd);

						 $user->setPass($password);	
						 $user->setEml($email);
							
						$login = $user->login();
						if($login)
						{
							header("location:profile_page.php");
						}
						else
						{
							echo "<span class='loggin'> invalid email and password !!!</span>";
						}
					
						
						
					}

				}
			}
			

			
?>						   



									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="email">Email:</label>
											<div class="col-md-5"> 
												<input type="email" class="form-control" name="email" placeholder="Enter Your Email" >
												<i class="form-control-feedback glyphicon glyphicon-envelope"></i>
											</div>
									   </div>
									   
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="pwd">Password:</label>
											<div class="col-md-5"> 
												<input type="password" class="form-control" name="pwd" placeholder="Enter Your Password" >
												<i class="form-control-feedback glyphicon glyphicon-lock"></i>
											</div>
									   </div>
										<div class="form-group"> 
											<div class="col-md-offset-3 col-md-5 btn-style">
											  <button type="submit" class="btn btn-primary btn-lg " name="login">Log In</button>
											</div>
										</div>
									</form>
							   </div>
							</div>
						</div>
					 </div>
				 
				  </div>
		        </section>
		
		
<?php require('footer/footer.html');?>