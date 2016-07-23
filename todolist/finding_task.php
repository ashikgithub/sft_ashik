<?php
	session_start();
	include 'function.php';
	require('db_connection/db_connection.php');
	include 'procedure.php';
	
	$start_date="";
	$end_date="";
	
	if( !empty(check_authentication()) )
	{
		header("Location:Log_in.php");
	}
	else
	{
		/**************
		##	decrypt session id
		**************/	
		$ID=decrypt($_SESSION['id'],$key); 
		/**************
		##	decrypt session token_Number
		**************/	
		$TK=decrypt($_SESSION['tk_number'],$key);
		/**************
		##	this check_userAuthentication_query() function check a valid user
		**************/	
		list($rslt)=check_userAuthentication_query($ID);
		foreach($rslt as $row)
		{
			if(($row['token'] != $TK)  || ($row['user_id'] != $ID))
			{ 
				header("Location:Log_in.php");
			}
		}
	}
?>
<?php require('header/profile_header.html');?> 
				            <a class = "navbar-brand" href = "#"> Profile </a>
			            </div>
			            <div class="collapse navbar-collapse" id="navbar-collapse">
						    
							
							<ul class="nav navbar-nav navbar-right">
							   <li class="log-form"><a href="Log_in.php?action=logout" ><span class="glyphicon glyphicon-log-out licon"></span>Log Out</a></li>
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
							<li class="home"><a href="profile_page.php" class="edit_home-style" >Home</a></li>
							<li class="show"><a href="show_task.php" class="show_task-style" >Show Tasks</a></li>
							<li class="pending"><a href="pending_task.php" class="pending_task-style" >Pending Tasks</a></li>
							<li class="complete"><a href="completed_task.php" class="complete_task-style" >Completed Tasks</a></li>
							<li class="finding"><a href="finding_task.php" class="finding_task-style" >Finding Specific Tasks</a></li>
						</ul>
					</div>
					<!--End Menu-->
					<!--start complted task table-->
					<div class="col-md-9  col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">Your Task List</div>
						  <div class="panel-body panel-body-style">
								<div class="row">
									<div class="col-md-12">
										<form method="POST" action="finding_task.php" class="form-horizontal" role="form">
										
											<div class="form-group has-feedback has-feedback-right">
												<label class="control-label col-md-3" for="sdate">Start Date:</label>
												<div class="col-md-5"> 
													<input type="text" class="form-control sdate-time"id="datetimepicker" name="sdate" placeholder="Your Task Start Date" required>
													<i class="form-control-feedback glyphicon glyphicon-calendar"></i>
												</div>
											</div>
											<div class="form-group has-feedback has-feedback-right">
												<label class="control-label col-md-3" for="edate">End Date:</label>
												<div class="col-md-5"> 
													<input type="text" class="form-control edate-time"id="datetimepicker" name="edate" placeholder="Your Task End Date" required>
													<i class="form-control-feedback glyphicon glyphicon-calendar"></i>
												</div>
											</div>
											<div class="form-group has-feedback has-feedback-right"> 
												<div class="col-md-offset-3 col-md-5 btn-style">
													<button type="submit" class="btn btn-primary btn-lg " name="submit">Submit</button>
												</div>
											</div>
										</form>
										
								    </div>
									<div class="col-md-12">
									    <table class="table">
										<thead>
										  <tr>
											<th>Task Title</th>
											<th>Task Description</th>
											<th>Date-Time</th>
											<th>Status</th>
										  </tr>
										</thead>
										<tbody>
										
											<?php 
											if ($_SERVER["REQUEST_METHOD"] == "POST")	
											{
		
												//$start_date = $end_date = "";
												if(isset($_POST['submit']))
												{
													$start_date = $_POST['sdate'];
													$end_date = $_POST['edate'];
																									
											        if(!empty($start_date) && !empty($end_date) )
			                                        {
														/*
														$stmt= $db->prepare("select task_title, task_description,date,task_status from to_do_lists where user_id=? and date>=? and date<?");
														$stmt->execute(array($id,$start_date,$end_date));
														$results=$stmt->fetchAll();
														*/
														list($results)=specific_task($ID,$start_date,$end_date);
														foreach($results as $row)
														{
										?>
															<tr>
															   <td><?php echo $row['task_title']; ?></td>
															   <td><?php echo $row['task_description']; ?></td>	
															   <td><?php echo $row['date']; ?></td>	
															   <td><?php echo $row['task_status']; ?></td>
															</tr>
										  
										  
									<?php
														}
													}
												}
											 }
										?>
										</tbody>
									  </table>
									</div>
							    </div>
						  </div>
							
						</div>
					</div>					
						
				    
					<!--End complted task table-->
			    </div>   
			</section>
			
<?php require('footer/profile_footer.html');?> 	
