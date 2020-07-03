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
    <div class="content">
      <h1 class="text-center"><u>ADMIN DASHBOARD</u></h1>
      &nbsp;&nbsp;&nbsp;
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats border-danger">
                <div class="card-header card-header-warning card-header-icon bg-white  ">
                  <div class="card-icon">
                    <i class="material-icons">content</i>
                  </div>
                  <p class="card-category">Used Space</p>
                  <h3 class="card-title">49/50
                    <small>GB</small>
                  </h3>
                </div>
                <div class="card-footer bg-danger text-white">
                  <div class="stats">
                    <i class="material-icons">warning</i>
                    <a href="" class="text-white">Get More Space...</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats border-success">
                <div class="card-header card-header-success card-header-icon bg-white">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Revenue</p>
                  <h3 class="card-title">$34,245</h3>
                </div>
                <div class="card-footer bg-success text-white">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6 border-warning">
              <div class="card card-stats border-warning">
                <div class="card-header card-header-danger card-header-icon bg-white">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Fixed Issues</p>
                  <h3 class="card-title">75</h3>
                </div>
                <div class="card-footer bg-warning text-white">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats border-info">
                <div class="card-header card-header-info card-header-icon bg-white">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Followers</p>
                  <h3 class="card-title">+245</h3>
                </div>
                <div class="card-footer bg-info text-white">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          &nbsp;&nbsp;&nbsp;
          
        </div>
      </div>
      
          
            
    
  </div>
    </div>    
		
		

	
</section>



</body>
</html>