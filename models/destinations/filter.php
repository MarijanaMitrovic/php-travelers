<?php
header("Content-Type: application/json");
include "../../config/connection.php";


if(isset($_POST['destination'])){
    $destination="%".strtolower($_POST['destination'])."%";

   

    $query="SELECT * FROM destinations d WHERE LOWER(d.name) LIKE :destination";

    $res=$conn->prepare($query);
    $res->bindParam(":destination", $destination);
    $res->execute();

    $destinations = $res->fetchAll();
    echo json_encode($destinations);

} else {
    http_response_code(400);
}


