<!DOCTYPE html>
<html>
<head>
	<title>Loan recovery status</title>
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

<?php require APPPATH .'/libraries/header.php' ; ?>


<section id="container">
<div class="row col-md-12">
	
	<div class="col-md-3">
				
        <?php require APPPATH .'/libraries/sidebar.php' ; ?>
  </div>
	
	&nbsp;&nbsp;
	<div class="col-md-8 mx-auto">
		

		<div class="conatiner rounded" style="border:1px skyblue solid;">
			
		 <h2 class="text-center">Employee Loan Recovery Status</h2><hr>
		 		
			
        <div class="card border-white ml-auto">
        			
			<div class="card-body"> 	
					
			   <!-- <div class="table-responsive"> -->
				<table class="table table-hover  table-responsive">
  					<thead class="thead-light">
  						
						<th nowrap>Loan-ID</th>
						<th nowrap>Employee ID</th>

						<th nowrap>Total Loan Amount</th>
						<th nowrap>Amount Paid</th>
						<th nowrap>Amount Remaining</th>
												
						<th nowrap>Installments</th>
						<th nowrap>Paid Installments</th>
						<th nowrap>Pending Installments</th>
					
						<th nowrap>Recovery Status</th>
						 
			
					</thead>
					
					
				
			<?php
					
				// if($status)
				// {
					
					

			?>		
				
				 	<tbody>
						<tr>
						
						<td><?php echo $data->loan_id; ?></td>
						<td><?php echo $data->emp_id; ?></td>
						
						<td><?php echo $data->total_loan; ?></td>
						<td><?php echo $data->paid_amount; ?></td>
						<td><?php echo $data->unpaid_amount; ?></td>
						
						
						<td><?php echo $data->installments; ?></td>
						<td><?php echo $data->paid_installments; ?></td>
						<td><?php echo $data->pending_installments; ?></td>

						 <td id="recovery<?php echo $data->id; ?>"><?php echo $data->recoveryStatus; ?></td> 
							<script type="text/javascript">
		            
									recover=document.getElementById("recovery<?php echo $data->id; ?>");
	    							
									
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
							
						            
					 <!-- <?php
							//	}
							//}
							//else
							//{
					?>
								<tr>
									<td colspan="15"><b>No Reults Found</b></td>
								</tr> -->
					
							 
				
						
						
				</table>
			<!-- </div> -->

					
		    
		</div>
		
                 		
       	
        
</div>
</div>



</div>
</div>
        
		
		

	
</section>



</body>
</html>