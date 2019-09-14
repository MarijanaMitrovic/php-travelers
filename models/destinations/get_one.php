<?php
header('Content-Type: application/json');

if(isset($_GET['id'])){
    require_once '../../config/connection.php';

    $id = $_GET['id'];

    $result = $conn->prepare("SELECT * FROM destinations WHERE id = ?");

    $result->bindValue(1, $id);

    try {
        $result->execute();
        $user = $result->fetch();
        echo json_encode($destination);
    }
    catch(PDOException $ex){
        echo json_encode(['Message', 'Problem with database: ' . $ex->getMessage()]);
        errorsList($ex->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(400); 
}