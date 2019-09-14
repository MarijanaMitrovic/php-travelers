<?php   listOfAccess(); ?>
<div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">About author</h1>  
            </div>
          </div>
        </div>
      </div>  
<?php
require_once "models/functions.php";

$aut=getAuthor();
foreach($aut as $author): ?>

    
    <div class="site-section" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0">
            <img src="<?=$author->photo?>" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-6 pl-md-5">
            <h2 class="font-weight-light text-black mb-4"><?=$author->name?>&nbsp<?=$author->last_name?></h2>
            <p><?=$author->bio?></p>
            <h2 class="font-size-regular"><a href="models/author/download_author.php">Download</a></h2>
            

          </div>
        </div>
 
      </div>
    </div>
<?php endforeach; ?>