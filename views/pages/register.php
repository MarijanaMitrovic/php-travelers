
<?php   listOfAccess(); ?>
<div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
         
            <form action="models/users/register.php" method="POST" class="p-5 bg-white" enctype="multipart/form-data">
            <div class="row form-group">
            <h2 class="font-size-regular">Register here</h2>
          </div>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <input type="text" id="tbFirstName" name="tbFirstName" class="form-control" placeholder="First Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <input type="text" id="tbLastName" name="tbLastName" class="form-control" placeholder="Last Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <input type="text" id="tbEmail" name="tbEmail" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="password" id="tbLozinka" name="tbLozinka" class="form-control" placeholder="Password">
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Register" id="btnRegister" name="btnRegister" class="btn btn-primary pill text-white px-5 py-2">
                </div>
                <br/>
                <br/>
              
              </div>

  
            </form>

          
          </div>
         
        </div>
      </div>
    </div>


   