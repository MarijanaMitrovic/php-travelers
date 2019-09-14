<?php
include "../../config/connection.php";
include "../functions.php";

$authors=getAuthor();
$author=$authors[0];
var_dump($author);

$wordApp=new COM("Word.Application");
$wordApp->Visible = true;

$wordApp->Documents->Add();
$wordApp->Selection->TypeText("$author->name \n $author->last_name \n $author->bio");
var_dump($word_app->Selection);
$wordApp->Documents[1]->SaveAs("Author.doc");

header("Location: ../../index.php?page=author");