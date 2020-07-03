<!DOCTYPE html>
<html lang="en">

<head>

  <title>indovision-login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
   integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


</head>

<body class="bg-success">
  

  
              
                  
<section id="container" class="text-white">
    <div class="container">
      <h2 class="text-center">Indovision </h2>
      <p class="text-center"></p>
      <div class="col-xl-12">
      <div class="row">
        
          
          <div class="col-xl-8 mx-auto">
              <div class="row sameheight-container">
                 <div class="col-md-12">
                 <div class="card text-white border-light mb-3 shadow-lg p-3 mb-5 bg-white rounded">
                  <div class="card-header bg-primary mb-3">
                                        <div class="header-block">
                                            <p class="title text-center">Enter username and password
                                              <span class="fas fa-user"></span>
                                            </p>
                                        </div>
                  </div>
                                  <div class="card-body text-primary">
    
   
                                        
                                        <form method="post" action="<?php echo base_url(); ?>Loan/login">
                                                    <div class="form-group row">
                                                  <label class="col-sm-4 form-control-label">Employee UserName</label>   
                                                      <div class="col-sm-8">
                                                        <input class="form-control" type="text" name="email" />
                                                      </div>
                                                  </div>
                                                  

                                                  <div class="form-group row">
                                                  <label for="pwd" class="col-sm-4 form-control-label">Password</label> 
                                                    <div class="col-sm-8" >
                                                      <input class="form-control" type="password" name="password" id="pass"/>
                                                      <input type="checkbox" onclick="myFunction()">Show Password
                                                      <script>
                                                        function myFunction() 
                                                        {
                                                            var x = document.getElementById("pass");
                                                            if (x.type === "password") 
                                                            {
                                                              x.type = "text";
                                                            } 
                                                            else 
                                                            {
                                                              x.type = "password";
                                                            }
                                                        }
                                                      </script>
                                                    </div>

                                                  </div>

                                                  

                                                  <div class="form-group row">
      
                                                            <div class="col-sm-12  text-center">  
                                                              
                                                                <button name="login" type="submit" class="btn btn-success btn-lg" > Login <span class="fa fa-sign-in-alt"></span></button>
                                                                  
                                                               
                                                            

                                                             
                                                                     
                                                            </div>
                                                  </div>
                                                  
                                                                  
                                                  </form>
                                                </div>
          </div>
</div>
</div>


</div>
</div>
</div>
</div>
</section>

  

 

</body>

</html>
