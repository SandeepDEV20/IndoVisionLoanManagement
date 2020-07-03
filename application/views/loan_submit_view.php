<!DOCTYPE html>
<html>
<head>
	<title>Loan submit success</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



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
		 <h2 class="text-center text-success"><i class="fa fa-check-circle"></i> You successfully applied for loan</h2>
		 <h4 class="text-center text-info">Wait for the approval...</h4>

		
        <div class="card border-white ml-auto">
        			
			<div class="card-body"> 	
					
		
			   <div class="table-responsive">
				<table class="table table-striped table-hover" >
  					<thead>
						<th nowrap>Loan-ID</th>
						
						<th nowrap>Employee ID</th>
						<th nowrap>Loan Applied Date</th>
						<th nowrap>Loan Amount</th>
						<th nowrap>Loan Type</th>
						<th nowrap>Installment Type</th>
						<th nowrap>Installments</th>
						<th nowrap>Interest rate</th>
						<th nowrap>Total Loan</th>
						<th nowrap>Repayment Type</th>
						<th nowrap>Monthly_EMI</th>

						<th nowrap>Approval status</th>
					</thead>
					
					
				
			<?php
					
					
				
					
						
				
			?>	 	
						<tr>

						<td><?php echo $data->  loan_id; ?></td>
						<td><?php echo $data -> emp_id; ?></td>
						<td><?php echo $data -> appliedDate; ?></td>
						<td><?php echo $data -> amount; ?></td>
						<td><?php echo $data->  loan_type; ?></td>
						<td><?php echo $data->  installment_type; ?></td>
						<td><?php echo $data->  installments; ?></td>
						<td><?php echo $data->  interest_rate; ?></td>
						<td><?php echo $data->  total_loan; ?></td>
						
						<td><?php echo $data->  repayment_type; ?></td>
						<td><?php echo $data->  monthly_emi; ?></td>
						<td id="aprove"><?php echo $data->  approvalStatus; ?></td>
						
						</tr>
						
					
							 
				
						
						
				</table>
			</div>
							<script type="text/javascript">
			
	
									aprove=document.getElementById("aprove");
								
									
									
									

									if(aprove.innerHTML=="pending")
									{
										//recover.style.color="red";
										aprove.style.color="#1c92d2";
										aprove.style.textTransform= "uppercase";
										aprove.style.fontWeight= "bold";
									}
									

								
							</script>
		</div>
                 		
       	
		
		
		
        
</div>
</div>



</div>
</div>
        
		
		

	
</section>



</body>
</html>