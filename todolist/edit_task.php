<?php 
	session_start();
	require('task_id/taskid.php');
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
	else
	{
		$id= $user->getID();

		$unsecure = substr($taskid,3);
		$tsid = base64_decode($unsecure);
		
		$ttitle="";
		$tdes ="";
		$date ="";

		$result= $user->task_eidt($tsid);
		foreach($result as $row)
		{   
			$result['ttitle']=$row['task_title'];
			$result['tdes']=$row['task_description'];
			$result['date']=$row['date'];
					   
		}
	}	
?>

<?php require('header/profile_header.html');?> 
				            <a class = "navbar-brand" href = "#"> Profile </a>
			            </div>
			            <div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
							   <li class="log-form"><a href="Log_in.php" ><span class="glyphicon glyphicon-log-out licon"></span>Log Out</a></li>
							</ul>
						</div>
		           </div>
	
	            </nav>
			    
			</section>
			<!--Start Middle Body-->
			<section>
			    <div class="row row-style">
				    <!--Start Side Menu-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="profile_page.php" class="home-style" >Home</a></li>
							<li class="update"><a href="profile_page.php" class="update-style" >Update</a></li>
							<li class="delete"><a href="delete_page.php" class="delete-style" >Delete</a></li>
							<li class="create_tdlist"><a href="create_tdl.php" class="create_tdlist-style" >Create ToDo List</a></li>
							<li class="edit_tdlist"><a href="edit_todo.php" class="edit_tdlist-style" >Edit ToDo List</a></li>
							
						</ul>
					</div>
					<!--End Side Menu-->
					<div class="col-md-7 col-md-offset-1 col2-style">
                        <div class="panel panel-primary panel-style">
						<div class="panel panel-primary panel-style">
							   <div class="panel-heading ph-style">Welcome User</div>
							   <div class="panel-body panel-body-style">
							       <!--Start Form--><!--?id=<?php echo $id;?>&tid=<?php echo $tid;?> -->
								   <form action="task_update.php" class="form-horizontal" role="form" method="POST">
								   
                                        <div class="form-group">
                                           <label class="control-label col-md-3" for="ttitle">Task Title:</label>
                                           <div class="col-md-5">
                                               <input type="ttitle" class="form-control" name="ttitle" placeholder="Task Title" value="<?php echo "".$result['ttitle']."" ?>">
											</div>
										</div>
										
                                        <div class="form-group">
										    <label class="control-label col-md-3" for="tdes">Task Description:</label>
											<div class="col-md-5"> 
												<input type="tdes" class="form-control" name="tdes" placeholder="Task Description" value="<?php echo "".$result['tdes']."" ?>">
												 
											</div>
									   </div>
									   <div class="form-group ">
										    <label class="control-label col-md-3" for="date">Date-Time:</label>
											<div class="col-md-5"> 
												<input type="date" class="form-control" name="date" placeholder="Task Date-Time" value="<?php echo "".$result['date']."" ?>">
												
											</div>
									   </div>
										<div class="form-group"> 
											<div class="col-md-offset-3 col-md-5 btn-style">
											  <button type="submit" class="btn btn-primary btn-lg " name="update">Update</button>
											</div>
										</div>
									</form>
									<!--End Form-->
							    </div>
						</div>
				    </div>
			    </div>   
			</section>
			<!--End Middle body-->
<?php require('footer/profile_footer.html');?> 	   