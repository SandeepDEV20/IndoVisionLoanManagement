<!DOCTYPE html>
<html>
<head>
	<title>update Loan Criteria</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<script type="text/javascript">
			function select()
			{
				des=document.getElementById("desig").value;		
				id=document.getElementById("update_id").value;			 
				
			    
			    
				window.location.href="<?php echo base_url(); ?>/LoanAdmin/update_loan_criteria?ID="+des+"&id="+id;
                				 
			}
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
         <?php require APPPATH .'/libraries/sidebar_admin.php' ; ?>
  </div>
	&nbsp;&nbsp;
	<div class="col-md-8 mx-auto">
		<div class="conatiner rounded" style="border:1px skyblue solid;">
		<h2 class="text-center">Update designation-wise Loan Criteria </h2>
		
        <div class="card border-white ml-auto">
                 		
       	
		
		<!--<div class="card-header">
            <h3 class="card-title"> </h3> 
        </div><hr>-->
		
        <div class="card-body">
		<form method="post" action="<?php echo base_url(); ?>/LoanAdmin/update_loan_criteria">
			<div class="form-group row" style="display: none;">
			<label class="col-sm-4 form-control-label">id</label> 
				<div class="col-sm-8">
					<input class="form-control" type="number" name="id" id="update_id"
					value="<?php echo $data->id; ?>"/>
				</div>
			</div>
			<div class="form-group row">
			<label class="col-sm-4 form-control-label">Designation</label> 
				<div class="col-sm-8">
					<select class="form-control" name="designation" id="desig" onchange="select();" required>
					<option value="<?php echo $data->designation; ?>" selected hidden><?php echo $data->designation; ?></option>
					<?php 
					

                        foreach($desig as $rows) 
                        {
                        	
                                 if(isset($_GET['ID']))
								{
									$ID=$_GET['ID'];
										if($rows->designation==$ID)
										{
					?>						
																			
										  <option value="<?php echo $rows->designation; ?>" selected> 
										  	<?php echo $rows->designation; ?> </option>
					<?php				
				                         }
										else
										{
					?>			
											 <option value="<?php echo $rows->designation; ?>"> 
										  	<?php echo $rows->designation; ?> </option>
																			
					<?php				
										}	
																
																		
						        }	
								else
								{	
					?>
													
												
									 <option value="<?php echo $rows->designation; ?>"> 
										  	<?php echo $rows->designation; ?> </option>
					<?php					
								}
                        }    
					?>
					</select>
				</div>
			</div>
			<div class="form-group row">
			<label class="col-sm-4 form-control-label">Department</label> 
				<div class="col-sm-8">
					<select class="form-control" name="department" required>
					<option value="<?php echo $data->department; ?>" selected hidden>
						<?php echo $data->department; ?>  </option>
					<?php 
					//echo $rows->category;

                        foreach($desig as $rows) 
                        {
                        	
                   						
									if(isset($_GET['ID']))
									{
																											
										    $ID=$_GET['ID'];
										    
											
											if($rows->designation==$ID)
												{
						?>
													<option value="<?php echo $rows->department;?>" selected> <?php echo $rows->department;?> </option>
							<?php						
										
												}
									}
									
									else
									{	
							?>
															
								        
								         <option value="<?php echo $rows->department;?>"> 
								         	<?php echo $rows->department; ?>  </option>
							<?php		
									}
                        			}    
							?>
				    
				    
				</select>
				</div>
			</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Max loan Amount</label> 
				<div class="col-sm-8">
					<input class="form-control" type="number" name="max_amount" value="<?php echo $data-> maxLoanAmount; ?>"/>
				</div>
		</div> 
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Interest Rate</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text" name="interest" value="<?php echo $data->interest_rate; ?>"/>
				</div>
		</div> 
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Fixed installments</label> 
				<div class="col-sm-8">
					<input class="form-control" type="number" name="fixed_installments" value="<?php echo $data->fixed_installments; ?>"/>
				</div>
		</div> 
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Allowed Flexible Installments</label> 
				<div class="col-sm-8">
					<select class="form-control" name="allowed_flexible_installment"  required>
						<option value="<?php echo $data->allowed_flexible_installment; ?>" selected hidden>
							<?php echo $data-> allowed_flexible_installment; ?></option>
						<option value="yes">yes</option>
						<option value="no">no</option>
				    
				    
					</select>
				
				</div>
		</div> 
		


		<div class="form-group row">
			
            <div class="col-sm-12 text-center">  
                <button name="update_criteria" type="submit" class="btn btn-success" value="update_criteria">
                	Update <i class="fa fa-edit"></i></span>
                </button>
                	
                
             &nbsp; &nbsp; &nbsp;

             
                    <button  type="reset" class="btn btn-danger" >Reset <span class="fa fa-redo"></span>
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
<footer class="py-4 bg-white">

	</footer>



</body>
</html>