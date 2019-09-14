<?php

header('Content-Type: application/json');

if(isset($_GET['id'])){
    require_once '../../config/connection.php';

    $id = $_GET['id'];
    $result = $conn->prepare("DELETE FROM destinations WHERE id = ?");
    $result->bindValue(1, $id);

    try {
        $result->execute();
        http_response_code(204); 
    }
    catch(PDOException $ex){
        echo json_encode(['message'=> 'Problem with database ' . $ex->getMessage()]);
        errorsList($ex->getMessage());
        http_response_code(500);
        
    }
} else {
    http_response_code(400); 
}