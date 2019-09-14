<?php

require_once "../../config/connection.php";
include "get_destinations.php";

$destinations = getDestinations();
$excel = new COM("Excel.Application");
$excel->Visible = 1;
$workbook = $excel->Workbooks->Add();

$sheet = $workbook->Worksheets("Sheet1");
$sheet->activate;

$br = 1;
foreach($destinations as $dest){
    $field = $sheet->Range("A{$br}");
    $field->activate;
    $field->value = $dest->dest_id;

    $field = $sheet->Range("B{$br}");
    $field->activate;
    $field->value = $dest->name;

    $field = $sheet->Range("C{$br}");
    $field->activate;
    $field->value = $dest->description;

    $field = $sheet->Range("D{$br}");
    $field->activate;
    $field->value = $dest->price;

    $br++;
}

$workbook->_SaveAs("destinations_offer.xlsx", -4143);
$workbook->Save();