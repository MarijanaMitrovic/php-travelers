<?php
session_start();



if(isset($_POST['btnBook'])){
    require_once "../../config/connection.php";
   
    

    $fname=$_POST['bookName'];
    $lname=$_POST['bookLname'];
    $dateBook=strtotime($_POST['begDate']);
    $email=$_POST['bookEmail'];
    $person=$_POST['bookPerson'];
    $note=$_POST['bookNote'];
    $destBook=$_POST['bookDest'];
    $user=$_SESSION['user']->id;
    
    


    $errors=[];

    if(empty($fname)){
        $errors[]="First name can not be empty.";
        echo ("This field can not be empty!");
    }

    if(empty($lname)){
        $errors[]="Last name can not be empty.";
        echo ("This field can not be empty!");
    }
    if(empty($dateBook)){
        $errors[]="Date can not be empty.";
        echo ("This field can not be empty!");
    }
    if(empty($email)){
        $errors[]="Email can not be empty.";
        echo ("This field can not be empty!");
    }
    if(empty($person)){
        $errors[]="Person field can not be empty.";
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
        
      
try{

    
	
		$insert_book = $conn->prepare("INSERT INTO booking VALUES ('', ?, ?, ?, ?, ?, ?,?,?)");

		$insert_book->bindValue(1, $fname);
        $insert_book->bindValue(2, $lname);
     
        
        $start_date=date("Y-m-d", $dateBook);

		$insert_book->bindValue(3, $start_date);
        $insert_book->bindValue(4, $person);
     	$insert_book->bindValue(5, $destBook);
        $insert_book->bindValue(6, $user);
        $insert_book->bindValue(7,$note);
        $insert_book->bindValue(8,$email);

	    $result = $insert_book->execute();
			
			if($result){
                echo "You have booked trip successfully!";
                header("Location: ../../index.php?page=user");
              
			} else {
                echo "Error with booking!";
                header("Location: ../../index.php?page=booking");
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
            echo "Problem with booking!";
            errorsList($e->getMessage());
            header("Location: ../../index.php?page=booking");
		}}
	}
  ?>


