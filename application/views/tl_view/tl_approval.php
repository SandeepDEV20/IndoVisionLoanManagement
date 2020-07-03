<!DOCTYPE html>
<html>
<head>
	<title>TL Loan lists</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> 
    </script> 


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
			              <a  class="nav-link text-success" href="#">
					    	Employee Management system <span class="fas fa-plus"></span>
					    </a> 
			        </li>
					  <li class="nav-item bg-light rounded" style="margin-top:5px;border:1px solid #D6E9C6;">
					    <a  class="nav-link text-success" href="#">
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
		<?php 
			if(isset($_GET['msg']))
			{
				if($_GET['msg']=="please_check_requests")
				{
		?>
					<div class="alert alert-warning">Please Select atleast one checkbox</div>
		<?php
				}
			}
		?>

		<div class="conatiner rounded" style="border:1px skyblue solid;">
			
		 <h2 class="text-center">Employee Loan Lists</h2>
		 		
			
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
					
		
				
			<form method='post' action="<?php echo base_url(); ?>/tl_controller/tl_update">
			   <!-- <div class="table-responsive"> -->
				<table id="myTable" class="table table-hover  table-responsive">
  					<thead class="thead-light">
  						<!-- check all -->
  						<th nowrap><input type='checkbox' id='checkAll'></th>

						<th nowrap>Loan-ID</th>
						
						<th nowrap>Employee ID</th>
						<th nowrap>Loan Applied Date</th>
						<th nowrap>Loan Amount</th>
						<th nowrap>Max Loan Amount</th>
						<th nowrap>Interest Rate</th>
						<th nowrap>Total Loan</th>

						<th nowrap>Loan Type</th>
						<th nowrap>Repayment Type</th>
						<th nowrap>Installment Type</th>
						<th nowrap>Installments</th>
						<th nowrap>TL Approval</th>

						
						<th nowrap>Loan History</th>

					</thead>
					
					
				
			<?php
					
				if($status)
				{
					
			
					foreach($data as $user => $value) 
					{

						
				
			?>	 	<tbody id="search">
						<tr>
						<td><input id="check<?php echo $value->id; ?>" type="checkbox" name='update[]' value="<?php echo $value->id; ?>" ></td>
						<td><?php echo $value->loan_id; ?></td>
						<td><?php echo $value->emp_id; ?></td>
						<td><?php echo $value->appliedDate; ?></td>
						<td><?php echo $value->amount; ?></td>
						<td><?php echo $value->max_amount; ?></td>
						<td><?php echo $value->interest_rate; ?></td>
						<td><?php echo $value->total_loan; ?></td>
						
						<td><?php echo $value->loan_type; ?></td>
						<td><?php echo $value->repayment_type; ?></td>
						<td><?php echo $value->installment_type; ?></td>
						<td><?php echo $value->installments; ?></td>
						<td id="aprove<?php echo $value->id; ?>"><?php echo $value->TL_approval; ?></td>
						
						
						<td class="text-center"><a href="<?php echo base_url(); ?>/tl_controller/loan_records?id=<?php echo $value->emp_id; ?>" target="_blank" >
						<i class="fas fa-eye"></i></a></td>

							  <script type="text/javascript">
		             	
							
									aprove=document.getElementById("aprove<?php echo $value->id; ?>");
									chk=document.getElementById("check<?php echo $value->id; ?>");
									

									if(aprove.innerHTML=="pending")
									{
										
										aprove.style.color="#1c92d2";
										aprove.style.textTransform= "uppercase";
										aprove.style.fontWeight= "bold";
								
									}
									else
									{
										if(aprove.innerHTML=="approved")
										{
											aprove.classList.add("text-success");
											aprove.innerHTML="approve &#10004";

											aprove.style.textTransform= "uppercase";
											aprove.style.fontWeight= "bold";
											chk.style.display="none";
											chk.disabled="true";
								

										}
										else
										{
												aprove.style.color="red";
												aprove.innerHTML="reject "+"&#x274C";
												aprove.style.textTransform= "uppercase";
												aprove.style.fontWeight= "bold";
												chk.style.display="none";
												chk.disabled="true";
									

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
					?>
								<tr>
									<td colspan="15"><b>No Reults Found</b></td>
								</tr>
						<?php	
							}
						?>
							 
				
						
						
				</table>
			<!-- </div> -->

					<div class="form-group row">
					
		            <div class="col-sm-12 text-center">  
		                <button name="update_loanlists" type="submit" class="btn btn-success" value="approved">Approve <i class="fas fa-check-circle"></i></button>
		                	
		                
		             &nbsp; &nbsp; &nbsp;

		             
		                    <button  type="submit" name="update_loanlists" class="btn btn-danger" value="rejected">Reject <span class="fa fa-times-circle"></span>
		                    </button> 
		            </div>
		        </div>
		    </form>
		</div>
		<!-- Script -->
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script type="text/javascript">
				$(document).ready(function(){

				  // Check/Uncheck ALl
				  $('#checkAll').change(function(){
				    if($(this).is(':checked')){
				      $('input[name="update[]"]').prop('checked',true);
				    }else{
				      $('input[name="update[]"]').each(function(){
				         $(this).prop('checked',false);
				      });
				    }
				  });

				  // Checkbox click
				  $('input[name="update[]"]').click(function(){
				    var total_checkboxes = $('input[name="update[]"]').length;
				    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

				    if(total_checkboxes_checked == total_checkboxes){
				       $('#checkAll').prop('checked',true);
				    }else{
				       $('#checkAll').prop('checked',false);
				    }
				  });

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