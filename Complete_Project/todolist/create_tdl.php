<?php 

	session_start();
	/*require_once 'Model/input.php';*/
	spl_autoload_register(function($class){
		include "Model/".$class.".php";
	});

	$user= new todoList();
	if(!$user->getSession() && !$user->getID()){
		header('Location:Log_in.php');
		exit;
	}
	$id = $user->getID();

	$status="New";
	$message='';
	 
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(isset($_POST['submit']))
			{
				
				$title = $_POST['ttitle']; 
				$description = $_POST['tdes'];  
				$datetime = $_POST['date-time'];
				
			   $stmt=$user->createList($id,$title,$description,$datetime,$status);
				if($stmt)
				{
			?>
					 <script>
						alert("Tod Do List created Successfully");
					 </script>
<?php
				}
		
				
			}
	
		}
		
	
	
	
	



?>
<?php require('header/profile_header.html');?> 
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
			    <div class="row row-style">
				    <!--Start Menu-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="profile_page.php" class="home-style" >Home</a></li>
							<li class="update"><a href="profile_page.php" class="update-style" >Update</a></li>
							<li class="delete"><a href="delete-page.php" class="delete-style" >Delete</a></li>
							<li class="create_tdlist"><a href="create_tdl.php" class="create_tdlist-style" >Create ToDo List</a></li>
							<li class="edit_tdlist"><a href="edit_todo.php" class="edit_tdlist-style" >Edit ToDo List</a></li>
						</ul>
					</div>
					<!--End Menu-->
					<div class="col-md-8 col-md-offset-1 col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">Add Your Task</div>
						  <div class="panel-body panel-body-style">
						    <div class="alert-danger alert-style">
								<?php if(!empty($message)):?>
							    <p><?php echo $message ?></p>
								<?php endif ?>
						    </div>
							<!--Start Form-->
						    <form method="POST" action="create_tdl.php?id=<?php echo $uid; ?>" class="form-horizontal" role="form" >
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="ttitle">Task Title:</label>
                                    <div class="col-md-5">
                                    <input type="ttitle" class="form-control" name="ttitle" placeholder="Your Task Title" required="1">
									</div>
								</div>
								<div class="form-group">
                                    <label class="control-label col-md-3" for="tdes">Task Description:</label>
                                    <div class="col-md-5">
                                    <input type="tdes" class="form-control" name="tdes" placeholder="Your Task Description" required="1">
									</div>
								</div>
								<div class="form-group has-feedback has-feedback-right">
									<label class="control-label col-md-3" for="date-time">Date-Time:</label>
									<div class="col-md-5"> 
										<input type="text" class="form-control"id="datetimepicker" name="date-time" placeholder="Your Task Date"  required="1">
										<i class="form-control-feedback glyphicon glyphicon-calendar"></i>
									</div>
							    </div>
								<div class="form-group has-feedback has-feedback-right"> 
									<div class="col-md-offset-3 col-md-5 btn-style">
										<button type="submit" class="btn btn-primary btn-lg " name="submit">Submit</button>
									</div>
								</div>
							</form>
							<!--End Form-->
						  </div>
						</div>					
						
				    </div>
			    </div>   
			</section>
	<?php require('footer/profile_footer.html');?> 		
	    