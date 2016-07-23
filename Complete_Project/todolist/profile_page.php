



<?php
	session_start();
   /*require_once 'Model/input.php';*/
	spl_autoload_register(function($class){
		include "Model/".$class.".php";
	});
	$user = new input();
	
	if(!$user->getSession() && !$user->getID())
	{
		header("Location:Log_in.php");
		exit;
	}
	$id= $user->getID();
?>


<?php require('header/profile_header.html');	?> 
				            <a class = "navbar-brand" href = "#"> Profile </a>
			            </div>
			            <div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
							   <li class="log-form"><a href="log_out.php" ><span class="glyphicon glyphicon-log-out licon"></span>Log Out</a></li>
							</ul>
						</div>
		           </div>
	
	            </nav>
			    
			</section>
			<section>

	<?php
		$fname=$lname=$email= $session=$roll=$subject=$pwd=$Email="";
		if($_SERVER["REQUEST_METHOD"]== 'POST')
		{
			if(isset($_POST['show']))
			{
				$result= $user->getUser($id);
				foreach($result as $row)
				{
					$fname=$row['user_fname'];
					$lname=$row['user_lname'];
					$email=$row['user_email'];
					$session=$row['user_session'];
					$roll=$row['user_roll'];
					$subject=$row['user_subject'];
				}
					
			}
		}
?>



			    <div class="row row-style">
				    <!--start Menubar-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="profile_page.php" class="home-style" >Home</a></li>
							
							<li class="update"><a href="profile_pageUpdate.php" class="update-style" >Update</a></li>
	<?php
		if(isset($_POST['show']))
		{
	?>
			<li class="delete"><a href="delete_page.php" class="delete-style" >Delete</a></li>
	<?php
		}
	?>
							
							<li class="show"><a href="show_task.php" class="delete-style" >Show Task</a></li>
							<li class="create_tdlist"><a href="create_tdl.php" class="create_tdlist-style" >Create ToDo List</a></li>
							
						</ul>
					</div>
					<!--End Menubar-->
					<!--start Middle body-->
					<div class="col-md-7 col-md-offset-1 col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">Update Your Data</div>
						  <div class="panel-body panel-body-style">
						    <form action="" class="form-horizontal" role="form" method="POST">
								<div class="form-group has-feedback has-feedback-right">
                                    <label class="control-label col-md-3" for="show">Show All Data:</label>
                                     <div class="col-md-5 btn-style">
										<button type="submit" class="btn btn-primary btn-lg " name="show">Show</button>
									</div> 
									
								</div>
								
							</form>
							 
						  </div>
						</div>					
						<div class="panel panel-primary panel-style">
							   <div class="panel-heading ph-style">Welcome User</div>
							   <div class="panel-body panel-body-style">
							       <div class="alert-danger alert-style">
								     <?php if(!empty($message)):?>
									   <p><?php echo $message ?></p>
									   <?php endif ?>  
								   </div>
								   <!--start Form-->
								   
								   <form action="" class="form-horizontal" role="form" method="POST">
								   
                                        <div class="form-group has-feedback has-feedback-right">
                                           <label class="control-label col-md-3" for="fname">First Name:</label>
                                           <div class="col-md-5">
                                               <input type="fname" class="form-control" name="fname" placeholder="Enter Your First Name" value="<?php echo $fname; ?>">
											   <i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
										</div>
										
                                        <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="lname">Last Name:</label>
											<div class="col-md-5"> 
												<input type="lname" class="form-control" name="lname" placeholder="Enter Your Last Name" value="<?php echo $lname; ?>">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="email">Email:</label>
											<div class="col-md-5"> 
												<input type="email" class="form-control" name="email" placeholder="Enter Your Email" value="<?php echo $email ;?>">
												<i class="form-control-feedback glyphicon glyphicon-envelope"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="session">Session:</label>
											<div class="col-md-5"> 
												<input type="session" class="form-control" name="session" placeholder="Enter Your Session" value="<?php echo $session; ?>">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="roll">Roll:</label>
											<div class="col-md-5"> 
												<input type="roll" class="form-control" name="roll" placeholder="Enter Your roll" value="<?php echo $roll; ?>">
												<i class="form-control-feedback glyphicon glyphicon-user"></i>
											</div>
									   </div>
									   <div class="form-group has-feedback has-feedback-right">
										    <label class="control-label col-md-3" for="subject">Subject:</label>
											<div class="col-md-5"> 
												<input type="subject" class="form-control" name="subject" placeholder="Enter Your Subject Name" value="<?php echo $subject; ?>">
												<i class="form-control-feedback glyphicon glyphicon-book"></i>
											</div>
									   </div>
									</form>
									  
								
									 <!--End Form-->
						</div>
					</div>
				</div>
					<!--End Middle body-->
			   <input type="hidden" name="id" value="<?php echo $id;?>">    
			</section>
	 
<?php require('footer/footer.html');?>  