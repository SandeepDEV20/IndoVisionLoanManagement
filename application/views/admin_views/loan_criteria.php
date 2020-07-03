<!DOCTYPE html>
<html>
<head>
	<title>Loan Criteria Master</title>
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
        <?php require APPPATH .'/libraries/sidebar_admin.php' ; ?>
  </div>
	&nbsp;&nbsp;
	<div class="col-md-8 mx-auto">
		<div class="conatiner rounded" style="border:1px skyblue solid;">
		<h2 class="text-center">Designation-wise Loan Criteria</h2>
		
        <div class="card border-white ml-auto">
        			
			<div class="card-body"> 	
					<div class="row form-group">
					<div class="col-sm-12">  
				               <a href="<?php echo base_url(); ?>/LoanAdmin/addLoanCriteria" target="_blank"> <button name="submit" type="submit" class="btn btn-success">
				                	<i class="fa fa-plus"></i>Add New
				                </button> </a>
				    </div>
					</div>
		
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered" >
  					<thead>
						<th nowrap>Sr No.</th>
						<th style="display: none">id</th>
						<th>Designation</th>
						<th>Department</th>
						<th nowrap>Max Loan Amount</th>
						<th>Interest rate</th>
						<th>Fixed Installments</th>
						<th>Allowed Flexible Installment</th>
						
						<th>Update</th>
						<th>Delete</th>
					</thead>
					
					
				
			<?php
				if($status)
				{
					$i=0;
					foreach ($data as $user) 
					{
						$i++;
				
				?>	 	
						<tr>
						<td style="font-weight: bold"><?php echo $i; ?></td>
						<td style="display: none"><?php echo $user -> id; ?></td>
						<td nowrap><?php echo $user -> designation; ?></td>
						<td><?php echo $user -> department; ?></td>

						<td><?php echo $user -> maxLoanAmount; ?></td>
						<td><?php echo $user -> interest_rate; ?></td>
						<td><?php echo $user -> fixed_installments; ?></td>
						<td><?php echo $user -> allowed_flexible_installment; ?></td>

						

							
						
							
							<td>
						<a href="<?php echo base_url(); ?>/LoanAdmin/update_loan_criteria?id=<?php echo $user -> id; ?>" target="_blank">
								 	<span class="fa fa-edit"></span>
						</a> 
							</td>
							<td>
							<a href="<?php echo base_url(); ?>/LoanAdmin/delete_emp_loan_criteria?id=<?php echo $user -> id; ?>">
									<span class="fa fa-trash text-danger"></span> 
								
								</a>
							</td>

							
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
                 		
       	
		
		<!--<div class="card-header">
            <h3 class="card-title"> </h3> 
        </div><hr>-->
		
        <div class="card-body">
		
</div>
</div>
</div>



</div>
</div>
        
		
		

	
</section>
&nbsp;
<footer class="py-4 bg-white">

	</footer>



</body>
</html>