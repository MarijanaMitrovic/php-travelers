<?php
include "models/users/access_functions.php"; 
  listOfAccess(); 
	if(isset($_POST['btnLogin'])){
		

		$email = $_POST['tbEmail'];
		$pass = $_POST['tbLozinka'];

		$errors = [];
		$reLozinka = "/^[\S]{5,}$/";

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errors[] = "Email not ok";
      echo ("Email is not correct.");

		}

		if(!preg_match($reLozinka, $pass)){
      $errors[] = "Password not ok.";
      echo ("Password is not correct");
		}

		if(count($errors) > 0){
            $_SESSION['errors'] = $errors;
          
			header("Location: index.php?page=login");
		}
		else {
			
      $pass = md5($pass);
      
      try{

			 $upit = "SELECT *, u.id FROM user u INNER JOIN user_role r
              ON u.role_id = r.id WHERE email = ? AND pass = ?";

			    $stmt = $conn->prepare($upit);
			    $stmt->bindValue(1, $email);
			    $stmt->bindValue(2, $pass);

			    $stmt->execute();
			    $user = $stmt->fetch();
			    if($user) {
              $_SESSION['user'] = $user; 
              getLogin($user->id);
              header("Location: index.php?page=home"); 
            
			        
			    } else {
              $_SESSION['errors'] = "Wrong email or password.";
              echo ("Wrong email or password");
			        header("Location: index.php?page=login");
			    }
    }
    
    catch(PDOException $ex){
      echo json_encode(['message'=> 'Problem with database ' . $ex->getMessage()]);
      errorsList($ex->getMessage());
      http_response_code(500);
  }
  }
}
  ?>


<div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          


          
            <form action="" method="POST" class="p-5 bg-white">
            <div class="row form-group">
            <h2 class="font-size-regular">Login and access your account</h2>
          </div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <input type="text" id="tbEmail" name="tbEmail" class="form-control" placeholder="Email">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="password" id="tbLozinka" name="tbLozinka" class="form-control" placeholder="Password">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Login" id="btnLogin" name="btnLogin" class="btn btn-primary pill text-white px-5 py-2">
                </div>
                <br/>
                <br/>
                <div class="col-md-12">
                <a class="btn btn-primary pill text-white px-5 py-2" href="index.php?page=register" name="btnRegister">
                                    Register
                                </a>
              </div> 
              
              </div>

  
            </form>

   
          </div>
          <?php
if (isset($_SESSION['errors'])):
echo "<div class='text-center'><br/>
<strong>Please enter valid email and password.</strong>
</div>";
unset($_SESSION['errors']);
?>
<?php endif;?>

         
        </div>
      </div>
    </div>