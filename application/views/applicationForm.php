<!DOCTYPE html>
<html>
<head>
	<title>loan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script type="text/javascript">
	function amount_valid(a)
	{
				check=true;
			    
			    fill=parseInt(document.getElementById("fill_amount").value);
				max=parseInt(document.getElementById("max_amount").value);
				
				warn_amt=document.getElementById("exceed_amount");
				
				// var m=parseInt(fill.value);
				// var f=parseInt(max.value);
				

				if(fill>max)
				{
					warn_amt.style.display="block";
					check=false;
				}
				else
				{
					warn_amt.style.display="none";
				}
				
				return check;
	}

        function validateInstallmentType() 
        {

              i = document.getElementById("inst");
              fix = document.getElementById("fixed");

              flex1 = document.getElementById("flexible");
              fix_input=document.getElementById("fixed_value");
              flex_input=document.getElementById("flexible_value");



              
              v = i.value;
              
              if(v == "fixed")
              {
   						fix.style.display="block";
   						flex1.style.display="none";
   						
   						fix_input.readonly=true;
   						fix_input.disabled=false;

   						flex_input.disabled=true;

   						fix_input.name="installment";
   						flex_input.name="installment1";

              }
              else
              {

              	        flex1.style.display="block";
   						fix.style.display="none";

   						flex_input.disabled=false;
   						fix_input.disabled=true;

   						fix_input.name="installment1";
   						flex_input.name="installment";
   						

              }
             

        }
        function show_repay()
        {
             repay=document.getElementById("repay_type");
             e=document.getElementById("emi");


             

             r=repay.value;
             if(r=="EMI")
             {
             		e.style.display="block";
             		

             }
             else
             {
             	e.style.display="none";	



             }
        }
        function calculate_emi()
        {
        	 var emi_value=document.getElementById("emi_value");
        	 var total_loan=document.getElementById("total_loan");
        	 var amount=parseInt(document.getElementById("fill_amount").value);
             var interest=parseInt(document.getElementById("interest").value);	

        	 //var inst1=document.getElementById("flexible_value").value;
        	 

        	 
             
             var inst1=document.loan_app.installment.value;
             var inst=parseInt(inst1);
             
              

             
             var result=(amount+(amount*(interest/100)));
             total_loan.value=parseFloat(Math.round(result));
             emi_value.value = parseFloat((Math.round(result)/inst).toFixed(2));
             //emi_value.value=parseFloat(Math.round(result));
        }


</script>


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
		
		<div id="exceed_amount" style="display: none;" class="alert alert-warning">
			Filled Amount should not be exceeded than Max. Amount <span class="fa fa-times-circle"></span> 
			</div>
		
		<div class="conatiner rounded" style="border:1px skyblue solid;">
		<h2 class="text-center">Loan Application Form</h2>
		
        <div class="card border-white ml-auto">
                 		
       	
		
		<!--<div class="card-header">
            <h3 class="card-title"> </h3> 
        </div><hr>-->
		
        <div class="card-body">
		<form method="POST" action="" name="loan_app">
			<div class="form-group row">
			<label class="col-sm-4 form-control-label">Employee name</label> 
				<div class="col-sm-8">
				<input class="form-control" type="text" name="name" value="<?php echo $user[0]->name; ?>" 
				readonly/>
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Employee number</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text" name="id" value="<?php echo $user[0]->emp_id;?>" readonly/>
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Department</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text" name="department" value="<?php echo $user[0]->department;?>" readonly/>
				</div>
		</div>
	    <div class="form-group row">
		<label class="col-sm-4 form-control-label">Date of joining</label> 	
				<div class="col-sm-8">
					<input class="form-control" type="date" name="dateofjoin" value="<?php echo $user[0]->dateofjoin;?>"  readonly />
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Designation</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text" name="designation" value="<?php echo $user[0]->designation;?>" readonly/>
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Loan Type</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text" name="loanType" value="<?php echo $cat; ?>" readonly/>
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Loan Apply Date</label> 	
				<div class="col-sm-8">
					<input class="form-control" type="date" name="applydate" value="<?php echo date("Y-m-d"); ?>"  readonly/>
				</div>
		</div>

		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Loan Amount</label> 
				<div class="col-sm-8">
					<input class="form-control" type="number" name="loanAmount" id="fill_amount" 
					onkeyup="calculate_emi();" required/>
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Max loan Amount</label> 
				<div class="col-sm-8">
					<input class="form-control" type="number" name="max" id="max_amount"
					value="<?php echo $user[0]->maxLoanAmount; ?>" readonly/>
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Interest Rate</label> 
				<div class="col-sm-8">
					<input class="form-control" type="number" name="interest" id="interest"
					value="<?php echo $user[0]->interest_rate; ?>" readonly/>
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Total Loan Amount</label> 
				<div class="col-sm-8">
					<input class="form-control" type="number" name="total_loan" id="total_loan"
					   readonly/>
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Repayment Mode</label>
			<div class="col-sm-8" >
				<select class="form-control" name="repay" id="repay_type" onchange="show_repay();" required>
					<option value="" disabled selected hidden>---select Repayment Mode---</option>
					<?php 
					

                        foreach($repay as $rows) 
                        {
                        	
                    ?>   
                    		<option> <?php echo $rows->repay_type; ?> </option>
				    		
                    <?php
                        }    
					?>
				    
				    
				</select>
			</div>
		</div>

		<div id="emi" style="display: none;">
		<?php 
			if($user[0]->allowed_flexible_installment == "yes")
			{

			

		?>
				<div class="form-group row">
				<label class="col-sm-4 form-control-label">Installment Type</label> 
						<div class="col-sm-8">
							<select class="form-control" name="installment_type" id="inst"
							   onchange="validateInstallmentType(); calculate_emi();" required>
							 <option value="" disabled selected hidden>---select installment type---</option> 
							 <option vlaue="fixed">fixed</option>
							 <option value="flexible">flexible</option>

							</select>
						</div>
				</div>
				<div id="fixed" style="display: none;">
						<div class="form-group row">
						<label class="col-sm-4 form-control-label">Fixed Installments</label> 
								<div class="col-sm-8">
									<input class="form-control" type="number" name="installment" id="fixed_value"
									value="<?php echo $user[0]->fixed_installments; ?>" readonly/>
								</div>
						</div>
				</div>

				<div id="flexible" style="display: none;">
						<div class="form-group row">
						<label class="col-sm-4 form-control-label">Flexible Installments</label> 
							<div class="col-sm-8">
								<input class="form-control" type="number" name="installment" id="flexible_value" 
									placeholder="Enter your Installments" onkeyup="calculate_emi();" />
							</div>
						</div>
				</div>
				
				<div class="form-group row">
							<label class="col-sm-4 form-control-label">Monthly EMI</label> 
							<div class="col-sm-8">
								<input class="form-control" type="number" name="monthly_emi" id="emi_value" readonly required/>
							</div>
							
			            	
			                

				</div>
				
	<?php
			}
			else
			{

	?>
	
				<div class="form-group row">
				<label class="col-sm-4 form-control-label">Installment Type</label> 
						<div class="col-sm-8">
						<input type="text" class="form-control" name="installment_type" id="installment_type" value="fixed" readonly/>
							  
							
						</div>
				</div>

						<div class="form-group row">
						<label class="col-sm-4 form-control-label">Fixed Installments</label> 
								<div class="col-sm-8">
									<input class="form-control" type="number" name="installment" id="fixed_inst"
									value="<?php echo $user[0]->fixed_installments; ?>" readonly/>
								</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 form-control-label">Monthly EMI</label> 
							<div class="col-sm-8">
								<input class="form-control" type="number" name="monthly_emi" id="emi_value" readonly required/>
							</div>
							

						</div>
			
	<?php
				}

	?>
		
		</div>


		

		

		<div class="form-group row">
			
            <div class="col-sm-12  text-center">  
            	
                <button name="submit" type="submit" class="btn btn-success" value="Submit" onclick="return amount_valid(0)">Apply <i class="fa fa-check-circle"></i></button>
                	
               
             &nbsp; &nbsp; &nbsp;

             
                    <button type="reset" class="btn btn-danger text-light"> Cancel <span class="fa fa-times-circle"></span>
                    </button> 
            </div>
        </div>
    </form>
</div>
</div>
</div>




</div>
</div>
        
		
		

	
</section>
&nbsp;
<footer class="py-4 bg-dark">

	</footer>



</body>
</html>