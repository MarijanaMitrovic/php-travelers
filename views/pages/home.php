<?php 
require_once "models/functions.php";
?>

<div class="slide-one-item home-slider owl-carousel">

<?php

$slides=getSlider();

foreach($slides as $slide): ?>
      
      <div class="site-blocks-cover overlay" style="background-image: url(<?=$slide->image?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              

              <h1 class="text-white font-weight-light"><?=$slide->title?></h1>
              <p class="mb-5"><?=$slide->description?></p>
              

            </div>
          </div>
        </div>
      </div>  

<?php endforeach; ?>

    </div>




    <div class="site-section">
      
      <div class="container overlap-section">
        <div class="row">

        <?php

        $blocks=getBlock();

        foreach($blocks as $block): ?>
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <a href="<?=$block->href?>" class="unit-1 text-center">
              <img src="<?=$block->image?>" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <h3 class="unit-1-heading"><?=$block->title?></h3>
              </div>
            </a>
          </div>

<?php endforeach; ?>
          
          
        </div>
      </div>
    
    </div>


    <div class="site-section">
      
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Destinations</h2>
            <p class="color-black-opacity-5">Choose Your Next Destination</p>
          </div>
        </div>
        <div class="row">
          <?php 
          include "models/destinations/get_destinations.php";
          $destinations=getHomeDestinations();
          foreach($destinations as $dest): 
          include "views/partials/destination.php";
          endforeach;
          ?>
          

       

        </div>
      </div>
    
    </div>



    <div class="site-section block-13 bg-light">
  

  <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7">
          <h2 class="font-weight-light text-black text-center">What they said about us</h2>
        </div>
      </div>

      <div class="nonloop-block-13 owl-carousel">
<?php 
include "models/experiences/get_exp.php";
$experiences=getExperiences();

foreach($experiences as $ex): ?>
        <div class="item">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 mb-5">
                <img src="<?=$ex->photo?>" alt="Image" class="img-md-fluid">
              </div>
              <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                <p class="text-black lead">&ldquo;<?=$ex->impression?>&rdquo;</p>
                <p class="">&mdash; <em><?=$ex->first_name?> <?=$ex->last_name?></em></p>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>


      </div>
    </div>
  </div>

 