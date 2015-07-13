
<html>
	<head>
		<title>My first PHP website</title>
		
		
		<style>  
		
		
			body{
		margin:0;
padding:0;
background-image:url('y1.jpg');
background-repeat:no-repeat;
background-size:100%;
overflow: hidden;
			
			
		}
		
		h2{text-align : center;
	        color:white;	
			font-size:50px;
			top:0%;
		position:relative;
		font-family:tahoma;
		}
		.wel{
			text-align:center;
			
			
			background-color:black;
			position:fixed;
			top:0px;
			width:100%;
			height:100px;
			
			opacity:0.8;
			
		}
		form{
			position:absolute;
			top:20%; 
			left:32%;
			color:#32007D;
			font-size:25px;
			
		}
		
		
		input[type=submit] {padding:5px 170px; background:#00476B; border:0 none;color:white;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px; }
		
		</style>

    

		
		
		
		
		
	
	
		
		
	</head>
	
	<body>
	
		<div class="wel"><h2>Registration Page</h2></div>
		<a href="index.php" style="position:absolute; bottom:10%; left:45%; font-size:40px; color:white; text-decoration:none;  font-family:Coronetscript, cursive; background-image:url('wood.jpg');
			border-radius:20px;"> &nbspback&nbsp</a><br/><br/>
		<form action="register.php" method="post"   style="font-family:Coronetscript, cursive;">
			Enter Username: <input type="text" name="username" required="required"  style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; "/> <br/><br>
			Enter Password : <input type="password" id="password" name="password" required="required"  style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; " /> <br/><br>
		    Retype Password: <input type="password" name="repassword" id="confirm_password" onchange="check()"  required="required" style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; "/><br><br> 
			
			<input type="submit" value="Register" style="position:relative;left:0%;font-size:30px;font-family:Coronetscript, cursive;"/>
		</form>
	</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$repassword = mysql_real_escape_string($_POST['repassword']);
	
	if($password==$repassword) {
		
		
		
	
	
    $bool = true;
	mysql_connect("mysql10.000webhost.com", "a2953611_madhu","madhusai3113") or die(mysql_error()); //Connect to server
	mysql_select_db("demo") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("Select * from users"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
	}
	}
	else {
		Print '<script>alert("pass do not match !");</script>'; //Prompts the user
			Print '<script>window.location.assign("register.php");</script>';
			$bool=false;
		
	}
}



?>



<?php

$servername = "mysql10.000webhost.com";
$user = "a2953611_madhu";
$password = "madhusai3113";
$dbname = "demo";

// Create connection
$conn = mysqli_connect($servername, $user, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = mysql_real_escape_string($_POST['username']);

// sql to create table
mysql_query("CREATE TABLE .$username. ( person_id INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,name CHAR(30) NOT NULL, phone INT(10) NOT NULL)");



mysqli_close($conn);




?>