<?php

require_once "config.php";



try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo $ex->getMessage();
}

function executeQuery($query){
    global $conn;
    return $conn->query($query)->fetchAll();
}

function listOfAccess(){
    @ $open = fopen(LOG_FAJL, "a");
    if($open){
    $date = date('d-m-Y H:i:s');
    @ fwrite($open,
   "{$_SERVER['REQUEST_URI']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n");
    @ fclose($open);
    }
   
}

function errorsList($error){
    @$open=fopen(ERRORS_FAJL,"a");
    $insert=$error."\t".date('d-m-Y H:i:s')."\n";
    @fwrite($open,$insert);
    @fclose($open);
   }