
<?php   listOfAccess(); ?>
<div class="site-blocks-cover inner-page-cover" style="background-image: url(assets/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">Destinations</h1>
              <div><a href="index.php?page=home">Home</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Destinations</span></div>
             
            </div>
          </div>
        </div>
      </div>  


      <div class="site-section">
      <div class="container">
<div class="row form-group">
<div class="col-md-6 mb-3 mb-md-0">
<label class="text-black" for="fname">Search for destinations</label>
                  <input type="text" id="destination" name="destination" class="form-control" placeholder="Search...">
  
<br/>
</div>
<div class="col-md-6">
<label class="text-black" for="fname">Sort by price</label>
                          <select id="sort" name="sort" class="form-control">
                            <option value="0">Sort</option>
                            <?php
                          $options = [
                                [
                                  "value" => 1,
                                  "text"=> "Price - Low to high"
                                ],
                                [
                                  "value" => 2,
                                  "text" => "Price - High to low"
                                ]
                              ];

                              foreach($options as $option):
                            ?>
                            
                            <option value="<?= $option['value'] ?>">
                                <?= $option['text'] ?>
                            </option>

                            <?php endforeach; ?>

                          </select>
                              </div>
                          
                      
</div>
</div>
</div>
        <br/>


  
      
      <div class="container">
        
        <div class="row" id="prikaz" >
          <?php
          require_once "models/destinations/get_destinations.php";
          $destination=getDestinations();
        
          foreach($destination as $dest): 
          include  "views/partials/destination.php";
           endforeach; ?>
        </div>
        <h3><a href="models/destinations/export_to_excel.php">Download Excel file</a></h3>
      </div>
     
    
    </div>