<!DOCTYPE html>
<html>
<head>
	<title>loan schedule</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<!-- <script type="text/javascript">
	function eligibility_valid(a)
	{
				check=true;
			    
			    joindate=document.getElementById("join");
				applydate=document.getElementById("apply");
				s=document.getElementById("status");
				warn1=document.getElementById("w1");
				warn2=document.getElementById("w2");

				date1 = new Date(joindate.value); 
				date2 = new Date(applydate.value);
				//window.alert('date1');
				 Difference_In_Time = date2.getTime() - date1.getTime();
				 days = Difference_In_Time / (1000 * 3600 * 24); 
  

				if(s.value=="yes")
				{
					warn2.style.display="block";
					check=false;
				}
				if(days<180)
				{
						warn1.style.display="block";
						check=false;
				}
				return check;
	}

</script>   -->


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
			
			
			
		<div class="conatiner">
	
		<!--<div class="card-header">
            <h3 class="card-title"> </h3> 
        </div><hr>-->
		
        <div class="card-body" style="border:1px skyblue solid;border-radius: 5px;">
        	<h2 class="text-center">Loan Schedule</h2> <hr>
        
		<form>
		
	    
		<div class="form-group row">
		<label class="col-sm-6 form-control-label">Emp ID</label> 	
				<div class="col-sm-6">
					<label class="form-control-label"><b><?php echo $data->emp_id; ?></b></label>
				</div>
		</div>
		<!-- <div class="form-group row">
		<label class="col-sm-4 form-control-label">department</label> 	
				<div class="col-sm-8">
					<input class="form-control" type="text" value="<?php echo $data->department; ?>" disabled="" />
				</div>
		</div> -->
		<div class="form-group row">
		<label class="col-sm-6 form-control-label">Loan Apply Date</label> 	
				<div class="col-sm-6">
					<label class="form-control-label"><b><?php echo $data->appliedDate; ?></b></label>
				</div>
		</div>

		<div class="form-group row">
		<label class="col-sm-6 form-control-label">Total Loan Amount (including interest)</label> 
				<div class="col-sm-6">
					<label class="form-control-label"><b><?php echo $data->total_loan; ?></b></label>
				</div>
		</div>

<!-- 		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Loan type</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text"  value="<?php echo $data->loan_type; ?>" disabled/>
				</div>
		</div> -->
		<div class="form-group row">
		<label class="col-sm-6 form-control-label">Monthly EMI</label> 
				<div class="col-sm-6">
					<label class="form-control-label"><b><?php echo $data->monthly_emi; ?></b></label>
				</div>
		</div>
		<!-- <div class="form-group row">
		<label class="col-sm-4 form-control-label">Repayment Type</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text"  value="<?php echo $data->repayment_type; ?>" disabled/>
				</div>
		</div> -->
		
		      
				<table class="table table-striped  table-responsive">
  					<thead class="thead">

								
						<th nowrap style="width: 300px;">Installment no.</th>
						<th nowrap style="width: 300px;">Installment Amount</th>
						 <th nowrap style="width: 300px;">Pay Date</th>
						
						

					</thead>
					<?php
						$next_date = $data->appliedDate;
						for($i=1;$i <= $data-> installments;$i++)
						{
							$next_date=date('Y-m-d',strtotime('+30 days',strtotime($next_date)));
						
					?>
						<tr>

						<td><?php echo $i; ?></td>
						<td><?php echo $data -> monthly_emi; ?></td>
						<td><?php echo $next_date;  ?></td>
						

						

							
						</tr>
					 <?php
						 }
			    		
			    	?>
			   </table>
		
    
   
	
			</form>

</div>
</div>



</div>
</div>
        
		
		

	
</section>



</body>
<footer class="py-3 bg-dark"></footer>
</html>