<?php

//header('Content-Type: application/json');

if (isset($_POST['btnAddUser'])) {
    require_once '../../config/connection.php';

    
        $first_name = trim($_POST['tbAddName']);
        $last_name = trim($_POST['tbAddLast']);
        $email = trim($_POST['tbAddEmail']);
        $pass = $_POST['tbAddLozinka'];
        $role= $_POST['tbRole'];
        $reg_date = date("Y-m-d H:i:s"); 

        $errors=[];
        if(empty($first_name)){
            $errors[]="Text field can not be empty.";
            echo ("This field can not be empty!");
        }
        if(empty($last_name)){
            $errors[]="Text field can not be empty.";
            echo ("This field can not be empty!");
        }
        if(empty($email)){
            $errors[]="Text field can not be empty.";
            echo ("This field can not be empty!");
        }
        if(empty($pass)){
            $errors[]="Text field can not be empty.";
            echo ("This field can not be empty!");
        }
        if(empty($role)){
            $errors[]="Text field can not be empty.";
            echo ("This field can not be empty!");
        }

        if(count($errors) > 0){
            echo "<ol>";
                    foreach($errors as $error){
                    echo "<li> $error </li>";
                }
                echo "</ol>";
            }
            else {



        $pass=md5($pass);
        
        
		

        $result = $conn->prepare("INSERT INTO user VALUES ('', ?, ?, ?, ?, ?, ?)");
  
     
    try {
        
        $result->bindValue(1, $first_name);
        $result->bindValue(2, $last_name);
        $result->bindValue(3, $email);
        $result->bindValue(4, $pass);
        $result->bindValue(5, $reg_date);
        $result->bindValue(6, $role);
        $r=$result->execute();

        if($r){
            echo "User inserted successfully!";
            header("Location: ../../index.php?page=admin");
          
        } else {
            echo "Error!";
            header("Location: ../../index.php?page=admin");
        }
    }
    catch(PDOException $e){
        echo "Problem with adding user!";
        errorsList($e->getMessage());
        header("Location: ../../index.php?page=admin");
    }}}