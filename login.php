<?php
include 'dbConnect.php';
if (isset($_POST['submit']) && !empty($_POST["submit"])) {
    echo  $email = $_POST["email"];
    echo  $password = $_POST["password"];
    echo  $query = "SELECT * from users where email='$email' AND password='$password'";
    $result = $conn->query($query);
    if($result->num_rows>0){
        
        session_start();
        $_SESSION['user'] = $email;
        header('location:success.php');
    }else{
        echo '<br>Access denied!';
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="styles/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>

$(document).ready(function() {

	  $('#login_form').submit(function(e) {
	    e.preventDefault();
	    var email = $('#email').val();
	    var password = $('#password').val();

	    $(".error").remove();

	    
	    if (email.length < 1) {
	      $('#email').after('<span class="error">This field is required</span>');
	    } else {
	      var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
	      var validEmail = regEx.test(email);
	      if (!validEmail) {
	        $('#email').after('<span class="error">Enter a valid email</span>');
	      }
	    }
	    if (password.length < 8) {
	      $('#password').after('<span class="error">Password must be at least 8 characters long</span>');
	    }
	    
	  	    
	  });
	  
});

</script>


</head>
<body>
<div class="jumbotron text-center">
  <h1>My First PHP Project</h1>
  <p>Welcome To our website!</p> 
</div>

<form action="login.php" method="post" id="login_form">
<div class="container">
		 <div class="row">
		 <div class="col-sm-4">&nbsp;</div>
		 <div class="col-sm-4">
		 <div>User Login</div>
		
		<div>
		   <p>Email :<input type="text" id="email" name="email" class="form-control" value=""></p>
		</div>
		<div>
		  <p>Password :<input id="password" type="password" name="password"  value="" class="form-control"></p>
		</div>
		<div>		
			<p><input type="submit" name="submit" class="btn btn-default" value="submit"></p>
		</div>
		</div>
		</div>
</div>
</form>
</body>
</html>
