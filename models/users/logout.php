<?php 
session_start();
include("access_functions.php");
 unsetLogin($_SESSION['user']->id);
unset($_SESSION['user']);
header("Location: ../../index.php?page=home");
?>