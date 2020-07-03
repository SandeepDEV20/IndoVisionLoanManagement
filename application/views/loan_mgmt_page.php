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
			<?php
				if(isset($_GET['msg']))
				{
					$msg=$_GET['msg'];
					if($msg=="already_applied")
					{
				?>
						<div  class="alert alert-warning">
			          You already Applied for Loan...
			            </div>

					
					
			<?php
					}
				}
			?>
			
			<div id="w1" style="display: none;" class="alert alert-danger">
			You are a trainee..not eligible <span class="fa fa-times-circle"></span> 
			</div>
			<div id="w2" style="display: none;" class="alert alert-danger">You are not eligible as your loan is pending <span class="fa fa-times-circle"></span></div>
		<div class="conatiner rounded" style="border:1px skyblue solid;">
			


		<h2 class="text-center">Apply for Loan</h2>
		
        <div class="card border-white">
                 		
       	
		
		<!--<div class="card-header">
            <h3 class="card-title"> </h3> 
        </div><hr>-->
		
        <div class="card-body">
		<form method="post" action="<?php echo base_url();?>/Loan/Loan_Application_form">
	    <div class="form-group row">
		<label class="col-sm-4 form-control-label">Date of joining</label> 	
				<div class="col-sm-8">
					<input class="form-control" type="date" name="joindate" id="join"
					value="<?php echo $date; ?>" disabled="" />
				</div>
		</div>
		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Loan Apply Date</label> 	
				<div class="col-sm-8">
					<input class="form-control" type="Date" name="applydate" id="apply" 
					value="<?php echo date("Y-m-d") ;?>" disabled="" />
				</div>
		</div>

		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Active loan</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text" name="status" id="status" value="<?php echo $status; ?>" disabled/>
				</div>
		</div>
		

		<div class="form-group row">
		<label class="col-sm-4 form-control-label">Loan Category</label>
			<div class="col-sm-8" >
				<select class="form-control" name="category" required>
					<option value="" disabled selected hidden>---select Category---</option>
					<?php 
					//echo $rows->category;

                        foreach($category as $rows) 
                        {
                        	
                    ?>   
                    		<option value="<?php echo $rows->category; ?>"> <?php echo $rows->category; ?> </option>
				    		
                    <?php
                        }    
					?>
				    
				    
				</select>
				
			</div>
		</div>

		<div class="form-group row">
			
            <div class="col-sm-12 text-center">  
                <button name="apply" type="submit" class="btn btn-success" value="Apply"
                onclick="return eligibility_valid(0)">Next <i class="fa fa-arrow-circle-right"></i>
            	</button>
                	
                
             &nbsp; &nbsp; &nbsp;

             
                    <button  type="reset" class="btn btn-danger" >Cancel <span class="fa fa-times-circle"></span>
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



</body>
</html>