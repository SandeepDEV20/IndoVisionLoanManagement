<!DOCTYPE html>
<html>
<head>
	<title>Loan lists-Admin Approval</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	
<style type="text/css">
	th { white-space: nowrap; }
</style> -->



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
				
        <?php require APPPATH .'/libraries/sidebar_admin.php' ; ?>
  </div>
	
	&nbsp;&nbsp;
	<div class="col-md-8 mx-auto">
		
		<div class="conatiner rounded" style="border:1px skyblue solid;">
			
		 <h2 class="text-center">Employee Loan Lists</h2><hr>
		 		
			
        <div class="card border-white ml-auto">
        			
			<div class="card-body"> 	
					
							<form method="post" action="">
									<div class="form-group row">
											<label class="col-sm-4 form-control-label">Year</label> 
												<div class="col-sm-8">
													<select class="form-control" name="year" required>
													<option value="" disabled selected hidden>--select year--
													</option>
													<option value="2020">2020</option>
													
													</select>
												</div>
									</div>
								    <div class="form-group row">
											<label class="col-sm-4 form-control-label">Month</label> 
													<div class="col-sm-8">
														<select class="form-control" name="month" required>
														<option value="" disabled selected hidden>--select month--</option>
														<?php
														$i=0;
														$months = array("Jan", "Feb", "Mar", "April","May","June","July","Aug","Sept","Oct","Nov","Dec");
														foreach ($months as $month) 
														{	$i++;
														?>
															
														    <option value="<?php echo $i; ?>">
														    	<?php echo $month; ?></option>
															<?php	}
															?>
														</select>
													</div>
									</div>
		

									<div class="form-group row">
														
										<div class="col-sm-12 text-center">  
											<button name="search" type="submit" class="btn btn-success">
												Search<i class="fa fa-search"></i>
											</button>       
										</div>
									</div>
    						</form><hr>
					
					<div class="col-sm-12 row"> 
						<div class="col-sm-8">
							<!-- <button type="button" class="btn btn-success" onclick="exportTableToExcel('myTable',
							'loan_data')">Import CSV<i class="fa fa-download"></i></button> -->
							<a href="<?php echo base_url(); ?>/LoanAdmin/import_data" class="btn btn-success">
								import CSV<i class="fa fa-download"></i>
							</a>
						</div>
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
					
		
				

			   <!-- <div class="table-responsive"> -->
				<table id="myTable" class="table table-hover  table-responsive">
  					<thead class="thead-light">
  						
						<th nowrap>Loan-ID</th>
						<th nowrap>Employee ID</th>
						<th nowrap>Loan Applied Date</th>
						<th nowrap>Total Loan Amount</th>
						<th nowrap>Amount Paid</th>
						<th nowrap>Amount Remaining</th>
												
						<th nowrap>Installments</th>
						<th nowrap>Paid Installments</th>
						<th nowrap>Pending Installments</th>
					
						<th nowrap>Recovery Status</th>
						 
			
					</thead>
					
					
				
			<?php
					
				if($status)
				{
					
					foreach($data as $user => $value) 
					{

			?>		
				
				 	<tbody id="search">
						<tr>
						
						<td><?php echo $value->loan_id; ?></td>
						<td><?php echo $value->emp_id; ?></td>
						<td><?php echo $value->appliedDate; ?></td>
						<td><?php echo $value->total_loan; ?></td>
						<td><?php echo $value->paid_amount; ?></td>
						<td><?php echo $value->unpaid_amount; ?></td>
						
						
						<td><?php echo $value->installments; ?></td>
						<td><?php echo $value->paid_installments; ?></td>
						<td><?php echo $value->pending_installments; ?></td>

						 <td id="recovery<?php echo $value->id; ?>"><?php echo $value->recoveryStatus; ?></td> 
							<script type="text/javascript">
		             	
									
									view=document.getElementById("view<?php echo $value->id; ?>");
                                     
									recover=document.getElementById("recovery<?php echo $value->id; ?>");
	    							
									
									if(recover.innerHTML=="pending")
									{
										recover.style.color="#1c92d2";

										recover.style.textTransform= "uppercase";
										recover.style.fontWeight= "bold";
										
									}
									else
									{
										recover.style.color="green";
										recover.style.textTransform= "uppercase";
										recover.style.fontWeight= "bold";

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
					<?php		}
						?>
							 
				
						
						
				</table>
			<!-- </div> -->

					
		   
		</div>
		<!-- Script -->
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
				
				<script type="text/javascript">
				$(document).ready(function(){

				 
				  				// 	$('#myTable').DataTable( {
						    //     "footerCallback": function ( row, data, start, end, display ) {
						    //         var api = this.api(), data;
						 
						    //         // Remove the formatting to get integer data for summation
						    //         // var intVal = function ( i ) {
						    //         //     return typeof i === 'string' ?
						    //         //         i.replace(/[\$,]/g, '')*1 :
						    //         //         typeof i === 'number' ?
						    //         //             i : 0;
						    //         // };
						    //     }
						    // });

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