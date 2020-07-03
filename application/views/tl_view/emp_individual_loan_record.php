<!DOCTYPE html>
<html>
<head>
	<title>Emp loan Record</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">




</head>
<body>


<section id="container">
    		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				  <a class="navbar-brand" href="#">IndoVision Services Private Ltd.</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
						  <div class="collapse navbar-collapse" id="navbar">
						    <ul class="navbar-nav ml-auto">
						      
						      <li class="nav-item">
						        <a class="nav-link" href="#">Logout<span class="fa fa-power-off"></span></a>
						      </li>
						      
						    </ul>
				    
				  		</div>
			</nav>
</section> &nbsp;&nbsp;

<section id="container">
<div class="row col-md-12">
	
	<div class="col-md-3">
				
        <ul class="nav flex-column ">
					<li class="nav-item bg-white rounded" style="border:1px skyblue solid;">
			              <a class="nav-link" href="#">

			                <span class="fas fa-tachometer-alt">Dashboard</span>
			              </a>
			        </li>
			        <li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
			              <a  class="nav-link text-success" href="">
					    	Employee Management system <span class="fas fa-plus"></span>
					    </a> 
			        </li>
					  <li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
					    <a  class="nav-link text-success" href="">
					    	Loan Management system <span class="fas fa-plus"></span>
					    </a> 
					</li>
					<li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
			              <a  class="nav-link text-success" href="">
					    	Performance Management system <span class="fas fa-plus"></span>
					    </a> 
			        </li>
			        <li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
			              <a  class="nav-link text-success" href="">
					    	Attendance Management system <span class="fas fa-plus"></span>
					    </a> 
			        </li>
			        <li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
			              <a  class="nav-link text-success" href="">
					    	Timesheet Management system <span class="fas fa-plus"></span>
					    </a> 
			        </li>
			        <li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
			              <a  class="nav-link text-success" href="">
					    	Ticket Management system <span class="fas fa-plus"></span>
					    </a> 
			        </li>
			        <li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
			              <a  class="nav-link text-success" href="">
					    	Asset Management system <span class="fas fa-plus"></span>
					    </a> 
			        </li>
			        <li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
			              <a  class="nav-link text-success" href="">
					    	Salary Management system <span class="fas fa-plus"></span>
					    </a> 
			        </li>
			        
						
				</ul>
  </div>
	
	&nbsp;&nbsp;
	<div class="col-md-8 mx-auto">
		

		<div class="conatiner rounded" style="border:1px skyblue solid;">
			
		 <h2 class="text-center">Employee Loan Records</h2>
		 		
			
        <div class="card border-white ml-auto">
        			
			<div class="card-body"> 	

					<div class="col-sm-12 row"> 
						<div class="col-sm-8"></div>
								<div class="col-sm-4">
									<div class="input-group">
												 <div class="input-group-prepend">
												      <span class="input-group-text">
												      	<span class="fa fa-search"></span>
												      </span>
												   </div>
												   <input type="text" class="form-control" id="myInput" placeholder="search">
									</div>
								</div>
					</div>
					&nbsp;&nbsp;&nbsp;
					
		
				
			<form method='post' action="<?php echo base_url(); ?>/LoanAdmin/updateEmpLoanLists">
			   <!-- <div class="table-responsive"> -->
				<table id="myTable" class="table table-hover  table-responsive">
  					<thead class="thead-light">
  						

						<th nowrap>Loan-ID</th>
						
						<th nowrap>Employee ID</th>
						<th nowrap>Loan Applied Date</th>
						<th nowrap>Loan Amount</th>
						<th nowrap>Max Loan Amount</th>

						<th nowrap>Loan Type</th>
						<th nowrap>Repayment Type</th>
						<th nowrap>TL Approval</th>

						<th nowrap>Approval Status</th>
						
						 <th nowrap>Recovery Status</th>
						 
						

					</thead>
					
					
				
			<?php
					
				if($data)
				{
					// $data[0]->id; die;
					foreach($data as $user => $value) 
					{

						
				
			?>	 	<tbody id="search">
						<tr>
						
						<td><?php echo $value->loan_id; ?></td>
						<td><?php echo $value->emp_id; ?></td>
						<td><?php echo $value->appliedDate; ?></td>
						<td><?php echo $value->amount; ?></td>
						<td><?php echo $value->max_amount; ?></td>

						<td><?php echo $value->loan_type; ?></td>
						<td><?php echo $value->repayment_type; ?></td>
						<td id="tl_approval<?php echo $value->id; ?>"><?php echo $value->TL_approval; ?></td>
						
						<td id="aprove<?php echo $value->id; ?>"><?php echo $value->approvalStatus; ?></td>
						
						

						<td id="recovery<?php echo $value->id; ?>"><?php echo $value->recoveryStatus; ?></td> 
						
						
							<script type="text/javascript">
		             	
									aprove=document.getElementById("aprove<?php echo $value->id; ?>");
									tl_aprove=document.getElementById("tl_approval<?php echo $value->id; ?>");
							                                     
									recover=document.getElementById("recovery<?php echo $value->id; ?>");
	    							
									
									if(recover.innerHTML=="pending")
									{
										recover.style.color="#1c92d2";

										recover.style.textTransform= "uppercase";
										recover.style.fontWeight= "bold";
										//
									}
									else
									{
										recover.style.color="green";
										recover.style.textTransform= "uppercase";
										recover.style.fontWeight= "bold";

									}

									if(aprove.innerHTML=="pending")
									{
										//recover.style.color="red";
										aprove.style.color="#1c92d2";
										aprove.style.textTransform= "uppercase";
										aprove.style.fontWeight= "bold";
										
									}
									else
									{
										if(aprove.innerHTML=="approved")
										{
											aprove.classList.add("text-success");
											//aprove.span.class("fa-check-circle");
											aprove.style.textTransform= "uppercase";
											aprove.style.fontWeight= "bold";
											

										}
										else
										{
												aprove.style.color="red";
												aprove.style.textTransform= "uppercase";
												aprove.style.fontWeight= "bold";
												

										}
									}
										
										
									if(tl_aprove.innerHTML=="pending")
									{
										//recover.style.color="red";
										tl_aprove.style.color="#1c92d2";
										tl_aprove.style.textTransform= "uppercase";
										tl_aprove.style.fontWeight= "bold";
										
									}
									else
									{
										if(tl_aprove.innerHTML=="approved")
										{
												tl_aprove.classList.add("text-success");
												tl_aprove.style.textTransform= "uppercase";
												tl_aprove.style.fontWeight= "bold";
												tl_aprove.innerHTML="&#10004";

												
										}
										else
										{
											    tl_aprove.classList.add("text-danger");
												tl_aprove.style.textTransform= "uppercase";
												tl_aprove.style.fontWeight= "bold";
												tl_aprove.innerHTML="&#x274C";
										}
									}

						

								
							</script>
							
						</tr>
					</tbody>
							
						            
					 <?php
								}
							}
							else
							{
								echo "failure";
							}
						?>
							 
				
						
						
				</table>
			<!-- </div> -->

					
		    </form>
		</div>
		<!-- Script -->
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script type="text/javascript">
				$(document).ready(function(){

				  
						                $('#myInput').on("keyup", function() { 
						                    var value = $(this).val().toLowerCase(); 
						                    $("#search tr").filter(function() { 
						                        $(this).toggle($(this).text() 
						                        .toLowerCase().indexOf(value) > -1) 
						                    }); 
						                }); 
						          
						       

				});
				</script>
                 		
       	
		            
		
		
        
</div>
</div>



</div>
</div>
        
		
		

	
</section>



</body>
</html>