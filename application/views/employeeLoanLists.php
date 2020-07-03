<!DOCTYPE html>
<html>
<head>
	<title>Loan lists</title>
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
		 <h2 class="text-center">Employee Loan Lists</h2>
		
        <div class="card border-white ml-auto">
        			
			<div class="card-body"> 	
					
		
			   <div class="table-responsive">
				<table class="table table-hover  table-responsive">
  					<thead class="thead-light">
  						<!-- check all -->
  						

						<th nowrap>Loan-ID</th>
						
						<th nowrap>Employee-ID</th>
						<th nowrap>Loan Applied Date</th>
						<th nowrap>Loan Amount</th>
						<th nowrap>Loan Type</th>
						<th nowrap>Installment Type</th>
						<th nowrap>Installments</th>
						<th nowrap>Interest rate</th>
						<th nowrap>Total Loan</th>
						<th nowrap>Repayment Type</th>
					
						
						
						<th nowrap>Monthly_EMI</th>
						<th nowrap>Approval Status</th>
						 <!-- <th nowrap>Recovery Status</th> -->
						<th nowrap>View Loan Schedule</th>
						<th nowrap>View Loan Status</th>

					</thead>
					
					
				
			<?php
			if($status)
				{
				
					foreach($data as $user)
					{
						
				
			?>	 	
						<tr>

						<td><?php echo $user->  loan_id; ?></td>
						<td><?php echo $user -> emp_id; ?></td>
						<td><?php echo $user -> appliedDate; ?></td>
						<td><?php echo $user -> amount; ?></td>
						<td><?php echo $user->  loan_type; ?></td>
						<td><?php echo $user->  installment_type; ?></td>
						<td><?php echo $user->  installments; ?></td>
						<td><?php echo $user->  interest_rate; ?></td>
						<td><?php echo $user->  total_loan; ?></td>
						<td><?php echo $user->  repayment_type; ?></td>
						<td><?php echo $user->  monthly_emi; ?></td>
						<td id="aprove<?php echo $user-> id; ?>"><?php echo $user->  approvalStatus; ?></td>
						
						<!-- <td id="recovery<?php echo $user-> id; ?>"><?php echo $user->  recoveryStatus; ?></td> -->
						
						<td class="text-center"><a target="_blank" href="<?php echo base_url(); ?>/Loan/loan_schedule?loan_id=<?php echo $user-> loan_id; ?>" id="view<?php echo $user-> id; ?>" style="display: none;">
							<i class="fas fa-eye"></i></a>
						</td>
						<td class="text-center"><a target="_blank" href="<?php echo base_url(); ?>/Loan/loan_recovery_status?loan_id=<?php echo $user-> loan_id; ?>" id="LoanStatus<?php echo $user-> id; ?>" style="display: none;">
							<i class="fas fa-eye"></i></a>
						</td>
							<script type="text/javascript">
				
		
										aprove=document.getElementById("aprove<?php echo $user-> id; ?>");
							
										view=document.getElementById("view<?php echo $user-> id; ?>");
									loanStatus=document.getElementById("LoanStatus<?php echo $user-> id; ?>");
										
										

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
									
												aprove.style.textTransform= "uppercase";
												aprove.style.fontWeight= "bold";
												view.style.display="block";
												loanStatus.style.display="block";

											}
											else
											{
													aprove.style.color="red";
													aprove.style.textTransform= "uppercase";
													aprove.style.fontWeight= "bold";
											

											}
										}

									
								</script>

							
						</tr>
						
							
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
			</div>
		</div>
                 		
       	
		
		
		
        
</div>
</div>



</div>
</div>
        
		
		

	
</section>



</body>
</html>