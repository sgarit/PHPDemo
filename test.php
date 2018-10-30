<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testproject";
// $dbName = "testproject";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$sql = "SELECT Id, First_Name, Last_Name FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    // while($row = $result->fetch_assoc()) {
    while ($row = $result->fetch_array()) {
       // echo "id: " . $row["Id"] . " - Name: " . $row["First_Name"] . " " . $row["Last_Name"] . "<br>";
    }
} else {
   // echo "0 results";
}
//$conn->close();

//echo "Connected successfully";
if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $first_name =  $_POST["fname"];
    $last_name  =  $_POST["lname"];
    $email      =  $_POST["user_email"];
    $password   =  $_POST["psword"];
    //echo $first_name;
    $query = "INSERT INTO users (First_Name,Last_Name,Email,Password) VALUES ('$first_name','$last_name','$email','$password')";
    mysqli_query($conn,$query);
    echo "Inserted";
} else
{
    echo "Error";
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"
type="text/javascript"></script>


<script>

$(document).ready(function() {

	  
	  $('form[id="second_form"]').validate({
	    rules: {
	      fname: 'required',
	      lname: 'required',
	      user_email: {
	        required: true,
	        email: true,
	      },
	      psword: {
	        required: true,
	        minlength: 8,
	      }
	    },
	    messages: {
	      fname: 'This field is required',
	      lname: 'This field is required',
	      user_email: 'Enter a valid email',
	      psword: {
	        minlength: 'Password must be at least 8 characters long'
	      }
	    },
	    submitHandler: function(form) {
	      form.submit();
	    }
	  });

	});

</script>
<style>

form label {
  display: inline-block;
  width: 100px;
}

form div {
  margin-bottom: 10px;
}

.error {
  color: red;
  margin-left: 5px;
}

label.error {
  display: inline;
}


</style>
</head>
<body>
	<form id="second_form" action="" method="post" >
	<div class="jumbotron text-center">
  <h1>My First PHP Project</h1>
  <p>Welcome To our website!</p> 
</div>
	<div class="container">
		 <div class="row">
		 <div class="col-sm-4">&nbsp;</div>
		 <div class="col-sm-4">
		 <div>User Registration</div>
		<div>
			<p>First Name:<input type="text" id="fname" name="fname" value="" class="form-control"></p>
		</div>
		<div>
		    <p>Last Name:<input type="text" id="lname" name="lname" class="form-control" value=""></p>
		</div>
		<div>
		   <p>Email :<input type="text" id="user_email" name="user_email" class="form-control" value=""></p>
		</div>
		<div>
		  <p>Password :<input id="psword" type="password" name="psword"  value="" class="form-control"></p>
		</div>
		<div>		
			<p><input type="submit" name="submit"  class="btn btn-default" value="submit"></p>
		</div>
		</div>
		</div>
		</div>
	</form>
	</body>
</html>

