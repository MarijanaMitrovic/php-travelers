<?php
header("Content-Type: application/json");

if(isset($_POST['sort'])){
    $sort = $_POST['sort'];

    include "../../config/connection.php";
    
    
    $query = "SELECT * FROM destinations d";

    switch($sort){
        case 1:
            $query .= " ORDER BY d.price ASC";
            break;
        case 2:
            $query .= " ORDER BY d.price DESC";
            break;
    }

    $res = executeQuery($query);
    echo json_encode($res);
} else {
    http_response_code(400); 
    echo json_encode(["error"=> "greska u sort"]);
}