<?php if(isset($_SESSION['user']) && $_SESSION['user']->role_id==="2"): 
  listOfAccess(); 
include "models/destinations/get_destinations.php";

?>
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">

            

            <form action="models/bookings/book.php" method="POST" class="p-5 bg-white">
<h2 class="font-size-regular"><?php if(isset($_GET['id'])): ?>
 <?php $destination=get_one_dest($_GET['id']);?> Book your trip to <?=$destination->name?><?php else:?><?php  echo "You must first choose destination!" ?><?php endif; ?> </h2>
            

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="bookName" name="bookName" class="form-control" placeholder="First Name">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="bookLname" name="bookLname" class="form-control" placeholder="Last Name">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="date">Date of Travel</label> 
                  <input type="text" id="begDate" name="begDate" class="form-control datepicker px-2" placeholder="Date of visit">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="bookEmail" name="bookEmail"class="form-control" placeholder="Email">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  
                  <input type="hidden" id="bookDest" name="bookDest" class="form-control" placeholder="Destination" value="<?=$destination->dest_id?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="treatment">How Many Person</label> 
                  <input type="text" id="bookPerson" name="bookPerson" class="form-control" placeholder="Person">
                </div>
              </div>
              

  
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="note">Notes</label> 
                  <textarea name="bookNote" id="bookNote" cols="30" rows="5" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Book" name="btnBook" id="btnBook" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5">
            
            
            
            <div class="p-4 mb-3 bg-white">
              <img src="assets/images/hero_bg_1.jpg" alt="Image" class="img-fluid mb-4 rounded">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Before submit, read again carefully your personal data. You can't change it later. You can book for you or someone else. This is just temporary reservation, before payment.</p>
              
            </div>

          </div>
        </div>
      </div>
    </div>
<?php else: ?>
<?php header("Location: index.php?page=login"); ?>
<?php endif; ?>