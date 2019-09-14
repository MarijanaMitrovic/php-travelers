<?php
  session_start();
  ob_start();

  require_once "config/connection.php";

  
  include "views/fixed/head.php";
  include "views/fixed/header.php";

  if(isset($_GET['page'])){
    switch($_GET['page'])
    {
      case 'home': 
        include "views/pages/home.php";
        break;
        case 'destinations': 
        include "views/pages/destinations.php";
        break;
        case 'author':
        include "views/pages/author.php";
        break;
        case 'blog':
        include "views/pages/blog.php";
        break;
        case 'booking':
        include "views/pages/booking.php";
        break;
        case "login":
	    include "views/pages/login.php";
	    break;
	    case "register":
	    include "views/pages/register.php";
	    break;
	    case "admin":
	    include "views/pages/admin.php";
	    break;
	    case "user":
	    include "views/pages/user.php";
	    break;
      case 'destination':
        if(isset($_GET['id'])){
          include "views/pages/one_destination.php";
        } else {
          include "views/pages/404.php";
        }
        break;
      default:
        include "views/pages/404.php";
    }
  } else {
    include "views/pages/home.php";
  }
  include "views/fixed/footer.php";
?>
