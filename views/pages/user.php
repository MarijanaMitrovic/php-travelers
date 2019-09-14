<?php if(isset($_SESSION['user']) && $_SESSION['user']->role_id==="2"): ?>
<div class="site-section bg-light">
      <div class="container">
      <h3 class="h5 text-black mb-3">Your bookings</h3>
     
        <div class="row">

        <?php
        include "models/bookings/get_bookings.php";

        $bookings=getUsersBookings();

        foreach($bookings as $booking): ?>

      

<div class="col-md-4 p-4 mb-3 bg-white">
             
              <p>Destination: <h4><?=$booking->dest_name?></h4></p>
              <p>Traveler: <h4><?=$booking->fname?> <?=$booking->lname?></h4></p>
              <p> Date of trip:<h4> <?=$booking->date_of_travel?></h4></p>
              <p>Persons: <h4><?=$booking->persons?></h4></p>
              
            </div>


            <?php endforeach; ?>

</div>
<br/>
<h3 class="h5 text-black mb-3">Share your experience with us!</h3>
<form action="models/experiences/share.php" method="POST" enctype="multipart/form-data" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="note">Notes</label> 
                  <textarea name="taExp" id="taExp" cols="30" rows="5" class="form-control" placeholder="Write your experience here..."></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="note">Import photo</label> 
                  <input type="file" name="photo" id="photo" cols="30" rows="5" class="form-control" value="Choose file"/>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Share" name="btnShare" id="btnShare" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>

</div>


</div>

<?php else: ?>
<?php header("Location: index.php?page=login"); ?>
<?php endif; ?>