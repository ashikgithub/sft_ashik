<?php
	session_start();
	include 'function.php';
	require('db_connection/db_connection.php');
	include 'procedure.php'; 

	$taskstatus='New';
	
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
							   <li class="log-form"><a href="logout.php" ><span class="glyphicon glyphicon-log-out licon"></span>Log Out</a></li>
							</ul>
						</div>
		           </div>
	
	            </nav>
			    
			</section>
			<section>
			    <div class="row row-style">
				    <!--Start Side Menu-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="profile_page.php" class="edit_home-style" >Home</a></li>
							<li class="pending"><a href="pending_task.php" class="pending_task-style" >Pending Tasks</a></li>
							<li class="complete"><a href="completed_task.php" class="complete_task-style" >Completed Tasks</a></li>
							<li class="finding"><a href="finding_task.php" class="finding_task-style" >Finding Specific Tasks</a></li>
						</ul>
					</div>
					<!--End Side Menu-->
					<!--Start pending task table-->
					<div class="col-md-9  col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">Your Task List</div>
						  <div class="panel-body panel-body-style">
						    <div class="row">
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
												/***********
												##	calll task_pending() function to view user pending task
												************/
												list($result)= task_Pending($ID,$taskstatus);
												foreach($result as $row)
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
												
										?>
										</tbody>
									  </table>
								</div>
							</div>
							
						  </div>
						</div>					
						
				    </div>
					<!--End pending task table-->
			    </div>   
			</section>
			
<?php require('footer/profile_footer.html');?> 	    
