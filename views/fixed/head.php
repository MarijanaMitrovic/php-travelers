<!DOCTYPE html>
<html lang="en">
  <head>
    <title>
    <?php
    
  if(isset($_GET['page'])){
    switch($_GET['page'])
    {
      case 'home':
     echo "Welcome to site with cheapest deals for holiday!";
     break;
     case 'destinations':
     echo "Find your perfect destination!";
     break;
     case 'blog':
     echo "Read the newest interesting informations from travel world.";
     break;
     default:
     echo "Travelers - travel the whole world with us!";
     break;


    }}
      ?>
      </title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="author" content="mailto:marijana.mitrovic242@gmail.com" />
    <meta name="keywords" content="travel, destination, cheap, vacation, holiday, Europe, Asia, Rome, Paris, Santorini" />
    <meta name="description" content="Find cheapest deals for your ideal holiday!" />
    <meta name="copyright" content="Marijana Mitrovic @ 2019" />
    <meta name="language" content="english" />

    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/my.css">
    
  </head>