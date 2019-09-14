<body>
 <?php
  require_once "models/functions.php";
  require_once "config/connection.php";
  ?>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-1" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">Travelers</a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

            <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">

            <?php

           $menus=getMenu();

           foreach ($menus as $menu): ?> 
           <li> <a href="<?=$menu->path?>" ><?=$menu->title?> </li>
            <?php endforeach; ?>

            
             <?php if(isset($_SESSION['user']) && $_SESSION['user']->role_id==="1"): ?>
             <li><a href="index.php?page=admin"> Admin </a></li>
<?php endif;?>
<?php if(isset($_SESSION['user']) && $_SESSION['user']->role_id==="2"): ?>
             <li><a href="index.php?page=user"> User account </a></li>
<?php endif;?>

              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3 text-black"><span class="icon-tripadvisor"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-instagram"></span></a>
                </li>
                <?php if(isset($_SESSION['user'])):?>
                      <li><a href="models/users/logout.php">LOGOUT</a></li>
                 <?php else: ?>
                  <li><a href="index.php?page=login">LOGIN</a></li>

             <?php endif;?>
                
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>