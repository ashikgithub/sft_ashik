<?php 
	/*Select created database*/
	session_start();
	require('db_connection/db_connection.php');
	
$id=$_SESSION['id'];
//var_dump($id); exit;
	if(!isset($_SESSION['id']) && ($_SESSION['id']==''))
	{
		header("location:Log_in.php");
		exit;
	}
	
	
	$message='';
	//$email= $_SESSION['user_email'];
	//$pass = $_SESSION['user_pwd'];

?>
<?php require('header/header.html');?>

	        <div class="brand">Admin Section</div>
	        <!--Navbar-->
	        <section>
			 <nav class="navbar navbar-style" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button type = "button" class = "navbar-toggle navbar-btn-style" data-toggle = "collapse" data-target = "#navbar-collapse">
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>
								<span class="icon-bar ib-color"></span>				 
							</button>
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
				    <!--Start Side Menu-->
				    <div class="col-md-2 col1-style">
						<ul class="nav nav-stacked nav-style">
							<li class="home"><a href="index.php" class="edit_home-style" >Home</a></li>
							<li class="show"><a href="index.php" class="show_task-style" >Show Data</a></li>
							<li class="pending"><a href="index.php" class="pending_task-style" >Newly Users</a></li>
							<li class="complete"><a href="index.php" class="complete_task-style" >Data Upload</a></li>
							
						</ul>
					</div>
					<!--End Side Menu-->
					<!--Start User Data table-->  
					<div class="col-md-9  col2-style">
                        <div class="panel panel-primary panel-style">
						  <div class="panel-heading ph-style">All Users Data</div>
						  <div class="panel-body panel-body-style">
						    <div class="row">
								<div class="col-md-12">
									 <table class="table">
										<thead>
										  
										  <tr>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Email</th>
											<th>Session</th>
											<th>Roll</th>
											<th>Subject</th>
											<th>Type</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
												
												$statement = $db->prepare(" select * from users where user_id=? ");
												$statement->execute(array($id));
												$result = $statement->fetchAll();
												foreach($result as $row)
												{
													if($row['user_type'] == "admin")
													{ 
												
														
														$statement1 = $db->prepare(" select * from users ");
														$statement1->execute();
														$result1= $statement1->fetchAll();
														foreach($result1 as $row)
														{
															
														
												?>	
														<tr>
														   <td><?php echo $row['user_fname']; ?></td>
														   <td><?php echo $row['user_lname']; ?></td>	
														   <td><?php echo $row['user_email']; ?></td>	
														   <td><?php echo $row['user_session']; ?></td>	
														   <td><?php echo $row['user_roll']; ?></td>
														   <td><?php echo $row['user_subject']; ?></td>
														   <td><?php echo $row['user_type']; ?></td>
														   <td>
															  <a href="admin_edit.php?id=<?php echo $row['user_id'];?>" class="btn btn-warning">Edit</a>
															  <a onclick="return confirm('Are you sure?')" href="admin_delete.php?id=<?php echo $row['user_id'];?>" class="btn btn-danger">Delete</a>
														   </td>
														</tr>
													<?php		
														}
													}
													else
													{
														header("location:Log_in.php");
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
					<!--End user data table-->
			    </div>   
			</section>
			
<?php require('footer/profile_footer.html');?> 		   
