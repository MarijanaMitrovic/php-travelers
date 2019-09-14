<?php
session_start();



if(isset($_POST['btnShare'])){
    require_once "../../config/connection.php";
   
    $experience=$_POST['taExp'];
    $user=$_SESSION['user']->id;

    $photo_name = $_FILES['photo']['name'];
    $photo_tmpLocation = $_FILES['photo']['tmp_name'];
    $photo_type = $_FILES['photo']['type'];
    $photo_size = $_FILES['photo']['size'];
    
   
    $errors=[];

    $allowed_types = ['image/jpg', 'image/jpeg', 'image/png'];

    if(!in_array($photo_type, $allowed_types)){
        array_push($errors, "This type of file is not allowed.");
    }
    if($photo_size > 5000000){
        array_push($errors, "Max size of photo is 5MB.");
    }

    if(empty($experience)){
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
        $newImagePath = 'assets/images/experiences/new_'.$name;

        switch($photo_type){
            case 'image/jpeg':
                imagejpeg($newImage, '../../'.$newImagePath);
                break;
            case 'image/png':
                imagepng($newImage, '../../'.$newImagePath);
                break;
        }

        $originalImagePath = 'assets/images/experiences/'.$name;

        if(move_uploaded_file($photo_tmpLocation, '../../'.$originalImagePath)){
            echo "Photo is uploaded on server";

try{

    
	
		$insert_exp = $conn->prepare("INSERT INTO experiences VALUES ('', ?, ?, ?,?)");

		$insert_exp->bindValue(1, $experience);
        $insert_exp->bindValue(2, $newImagePath);
        $insert_exp->bindValue(3, $user);
        $insert_exp->bindValue(4, $originalImagePath);


	    $result = $insert_exp->execute();
			
			if($result){
                echo "You have shared your experience successfully!";
                header("Location: ../../index.php?page=home");
              
			} else {
                echo "Error with sharing!";
                header("Location: ../../index.php?page=user");
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
            echo "Problem with sharing!";
            errorsList($e->getMessage());
            header("Location: ../../index.php?page=user");
		}}}
	}
  ?>


