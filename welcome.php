<?php
//echo "Welcome";
include 'dbConnect.php';
//echo "Connected successfully";
if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $first_name =  $_POST["first_name"];
    $last_name  =  $_POST["last_name"];
    $email      =  $_POST["usr_email"];
    $password   =  $_POST["usr_password"];
    //echo $first_name;
    $query = "INSERT INTO users (First_Name,Last_Name,Email,Password) VALUES ('$first_name','$last_name','$email','$password')";
    mysqli_query($conn,$query);
} else
{
    echo "Errorrrr";
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
<script>

$(document).ready(function(){
    $("button").click(function(){
        //$("p").hide();
        $( "p" ).after( "<b>Hello</b>" );
    });
});

</script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>My First PHP Project</h1>
  <p>Welcome To our website!</p> 
  <p>hi</p>
</div>
<div> welcome to my website please login here<a href="login.php">Login</a> </div>
<button>Click me to hide paragraphs</button>
</body>


