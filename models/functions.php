<?php

function getMenu(){
    return executeQuery("SELECT * FROM menu");
}

function getSlider(){
    return executeQuery("SELECT * FROM slider");
}

function getBlock(){
    return executeQuery("SELECT * FROM home_blocks");
}

function getContinents(){
    return executeQuery("SELECT * FROM continent");
}

function getAuthor(){
    return executeQuery("SELECT * FROM author");
}




?>