<?php

include "models/destinations/get_destinations.php";
$destination=get_one_dest($_GET['id']);

if($destination):

?>

<div class="site-blocks-cover inner-page-cover" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">About <?=$destination->name?></h1>
              <div><a href="index.php?page=destinations">All destinations</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">About</span></div>
              
            </div>
          </div>
        </div>
      </div>  


    
    <div class="site-section" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0">
            <img src="<?=$destination->picture?>" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-6 pl-md-5">
            <h2 class="font-weight-light text-black mb-4"><?=$destination->name?> (<?=$destination->cont_name?>)</h2>
            <p><?=$destination->description?></p>
            <h2 class="font-size-regular"> Price: $<?=$destination->price?></h2>
            <br/>
            <h2 class="font-size-regular"><a href="index.php?page=booking&id=<?=$destination->dest_id?>">Book now</a></h2>

          </div>
        </div>
      </div>
    </div>
<?php endif; ?>