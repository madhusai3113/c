<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value

// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_POST['name']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
 
// attempt insert query execution
$sql = "INSERT INTO `".$user."` (name, phone) VALUES ('$name',  '$phone')";

if(mysqli_query($link, $sql)){
	header("location: create_table.php");
			
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	header("location: create_table.php");
}

// closing connection
mysqli_close($link);
?>
