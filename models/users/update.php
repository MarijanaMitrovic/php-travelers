<?php
header('Content-Type: application/json');

if(isset($_POST['id'])){
    require_once '../config/connection.php';

    $id = $_POST['id'];
    $first_name = $_POST['tbAddName'];
    $last_name= $_POST['tbAddLast'];
    $email= $_POST['tbAddEmail'];
     $pass= $_POST['tbAddLozinka'];
     $role= $_POST['tbRole'];
    $result= $conn->prepare("UPDATE user SET first_name = ?, last_name=?, email=?, pass=?, id_role=? WHERE id = ?");


    $result->bindValue(1, $id);
    $result->bindValue(2, $first_name);
    $result->bindValue(3, $last_name);
    $result->bindValue(4, $email);
    $result->bindValue(5, $pass);
    $result->bindValue(6, $role);

   

    try {
        $result->execute();
        http_response_code(204); 
    }
    catch(PDOException $ex){
    
        errorsList($ex->getMessage());

        http_response_code(500);
    }
} else {
    http_response_code(400); // 400 - Bad request
}
