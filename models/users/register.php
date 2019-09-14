<?php


if(isset($_POST['btnRegister'])){
   require_once "../../config/connection.php";
		
	$first_name = trim($_POST['tbFirstName']);
	$last_name = trim($_POST['tbLastName']);
    $email = trim($_POST['tbEmail']);
    $password=trim($_POST['tbLozinka']);

    $errors = [];
  
	$reName = "/^[A-Z][a-z]{2,20}$/";
	$rePass = "/^[\S]{5,32}$/";
	
	

	if(!preg_match($reName, $first_name)){
		$errors[] = "Name is not ok";
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors[] = "Email is not ok";
	}

	if(!preg_match($rePass, $password)){
		$errors[] = "Password is not ok.";
	}
	
	if(count($errors) > 0){

		echo "<ol>";
		
		foreach($errors as $error){
			echo "<li> $error </li>";
		}

		echo "</ol>";
	}
	else {
        
      
try{

		$password = md5($password);
		
	
		$insert_user = $conn->prepare("INSERT INTO user VALUES ('', ?, ?, ?, ?, ?, 2)");

		$insert_user->bindValue(1, $first_name);
		$insert_user->bindValue(2, $last_name);
		$insert_user->bindValue(3, $email);
		$insert_user->bindValue(4, $password);
		
		$reg_date = date("Y-m-d H:i:s"); 
        
		$insert_user->bindValue(5, $reg_date);

	    $result = $insert_user->execute();
			
			if($result){
				header("Location: ../../index.php?page=home");
                echo "Registration successfully!";
              
			} else {
				header("Location: ../../index.php?page=register");
				echo "Error with registration!";
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
			echo "Problem with registration!";
			errorsList($e->getMessage());
			header("Location: ../../index.php?page=register");
		}
	}
}  ?>