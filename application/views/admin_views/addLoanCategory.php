<!DOCTYPE html>
<html>
<head>
	<title>Add Loan category</title>
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
		<h2 class="text-center">Add Loan Category</h2>
		
        <div class="card border-white ml-auto">
                 		
       	
		
		<!--<div class="card-header">
            <h3 class="card-title"> </h3> 
        </div><hr>-->
		
        <div class="card-body">
		<form method="post" action="<?php echo base_url(); ?>/LoanAdmin/addCategoryForm">
			<div class="form-group row">
			<label class="col-sm-4 form-control-label">Category Name</label> 
				<div class="col-sm-8">
					<input class="form-control" type="text" name="cat_name" required="" />
				</div>
			</div>
		
		

		<div class="form-group row">
			
            <div class="col-sm-12 text-center">  
                <input name="submit_cat" type="submit" class="btn btn-success" value="Submit">
                	
                
            
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
<footer class="py-4 bg-dark fixed-bottom">

	</footer>



</body>
</html>