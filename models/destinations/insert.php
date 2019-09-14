<?php

//header('Content-Type: application/json');

if (isset($_POST['btnAddDest'])) {
    require_once '../../config/connection.php';

    
        $destination_name = trim($_POST['dName']);
        $description = trim($_POST['dDesc']);
       
        $price = $_POST['dPrice'];
        $hot= $_POST['dHot'];

        $photo_name = $_FILES['dImg']['name'];
        $photo_tmpLocation = $_FILES['dImg']['tmp_name'];
        $photo_type = $_FILES['dImg']['type'];
        $photo_size = $_FILES['dImg']['size'];
        
       
        $errors=[];
    
        $allowed_types = ['image/jpg', 'image/jpeg', 'image/png'];
    
        if(!in_array($photo_type, $allowed_types)){
            array_push($errors, "This type of file is not allowed.");
        }
        if($photo_size > 5000000){
            array_push($errors, "Max size of photo is 5MB.");
        }
    
        if(empty($destination_name)){
            $errors[]="Text field can not be empty.";
            echo ("This field can not be empty!");
        }
        if(empty($description)){
            $errors[]="Text field can not be empty.";
            echo ("This field can not be empty!");
        }
        if(empty($price)){
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
            
            list($width, $height) = getimagesize($photo_tmpLocation);
    
            $existingImage = null;
            switch($photo_type){
                case 'image/jpeg':
                    $existingImage = imagecreatefromjpeg($photo_tmpLocation);
                    break;
                case 'image/png':
                    $existingImage = imagecreatefrompng($photo_tmpLocation);
                    break;
            }
    
            $newWidth=700;
            $newHeight=800;
    
            $newImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($newImage, $existingImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
            $name = time().$photo_name;
            $newImagePath = 'assets/images/destinations/new_'.$name;
    
            switch($photo_type){
                case 'image/jpeg':
                    imagejpeg($newImage, '../../'.$newImagePath);
                    break;
                case 'image/png':
                    imagepng($newImage, '../../'.$newImagePath);
                    break;
            }
    
            $originalImagePath = 'assets/images/destinations/'.$name;
    
            if(move_uploaded_file($photo_tmpLocation, '../../'.$originalImagePath)){
                echo "Photo is uploaded on server";
    
  

    try {
        $result = $conn->prepare("INSERT INTO destinations VALUES ('', ?, ?, ?, ?,'', ?)");
        $result->bindValue(1, $destination_name);
        $result->bindValue(2, $description);
        $result->bindValue(3, $newImagePath);
        $result->bindValue(4, $price);
        $result->bindValue(5, $hot);
        $r=$result->execute();

        if($r){
            echo "Destination inserted successfully!";
            header("Location: ../../index.php?page=admin");
          
        } else {
            echo "Error!";
            header("Location: ../../index.php?page=admin");
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
        echo "Problem with adding destination!";
        errorsList($e->getMessage());
        header("Location: ../../index.php?page=admin");
    }}}}