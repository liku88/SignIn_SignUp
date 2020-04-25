<?php

session_start();
    
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login.css">


	<title>Login Form</title>



	<style>

	</style>

</head>

<body>

	<div class="container">
	
	<div class="content">
	    <div class="header">
	        <h1><strong>Create Account</strong></h1>
	        <h3>Get started with free account</h3>
	        <button type="button" class="btn btn-danger button1"><i class="fa fa-google" aria-hidden="true"></i>  Login via Gmail</button> <br>
	        <button type="button" class="btn btn-primary"><i class="fa fa-facebook" aria-hidden="true"></i>   Login via Facebook</button>
	    </div>
	    
	    <hr class="divider">
	    <div class="restcontent">
	        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >
  <div class="form-group">
   
    <div class="input-group mycus1">
      <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
      <input  name="email" type="text" class="form-control" id="exampleInputAmount" placeholder="Email Address">
      <br>
      
     
    </div>
    <div class="input-group mycus1">
      <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
      <input  name="password" type="password" class="form-control" id="exampleInputAmount" placeholder="Create Password">
      <br>
      
     
    </div>
    
  </div>
  <button type="submit" name="login" class="btn btn-primary mycus2">Login Account</button>
</form>
	    </div>
	    <div class="footer">
	        <span>Have not an account? <a href="registration.php">Sign Up</a></span>
	    </div>
	    
	</div>
	
	
	
	
	
	
	
	

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script>
	</script>

</body>

</html>

<?php
include 'connection.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $emailquery = "select * from logup where email = '$email' ";
    $query = mysqli_query($con, $emailquery);
    
    $emailcounter = mysqli_num_rows($query);
    if($emailcounter){
        $email_fetcher = mysqli_fetch_assoc($query);
        $pass_fetcher  = $email_fetcher['password'];
        $_SESSION['username'] =  $email_fetcher['fullname'];
        $pass_veri   = password_verify($password, $pass_fetcher);
        
        if($pass_veri){
            ?>
            <script>
             location.replace("home.php");
            </script>
            <?php
        }else{
            ?>
        <script>
         alert("invalid password");
        </script>
        <?php
        }
        
    }else{
        ?>
        <script>
         alert("email doest not registered");
        </script>
        <?php
    }
    
}

?>
