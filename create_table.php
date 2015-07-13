






<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'a2953611_madhu' with no password) */
session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value


 error_reporting(E_ALL ^ E_NOTICE);

$link = mysqli_connect("mysql10.000webhost.com", "a2953611_madhu", "madhusai3113", "a2953611_firstdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution

// Close connection
mysqli_close($link);
?>




<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("mysql10.000webhost.com", "a2953611_madhu", "madhusai3113", "a2953611_firstdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

$name = mysqli_real_escape_string($link, $_POST['name']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
 
// attempt insert query execution
$sql = "INSERT INTO `".$user."` (name, phone) VALUES ('$name',  '$phone')";


// close connection
mysqli_close($link);

?>



<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<style>

body{
		margin:0;
padding:0;
background-image:url('bg.gif');
background-repeat:no-repeat;
background-size:100%;
			 -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
			
		}

form{
	
	position:relative;
	top:10%;
	left:3.5%;
	color:
	font-size:
	font-style:
	font-family:
}

table{
position:absolute;
top:30%;
width:100%;
line-height: 300%;

}
th{
	font-size:3.5em;
	font-family: 'Tangerine', serif;
}
td{
	
	font-size:1.5em;
	font-family: ‘Lucida Console’, Monaco, monospace;

}

.logout{position:fixed;
top:0%;
right:5%; 
background-image:url('logout.png');
height:120px;
width:120px;
background-repeat:no-repeat;
  }
  
  
  .edit{

background-image:url('edit.png');
height:60px;
width:40px;
background-repeat:no-repeat;
  }
  
   .delete{

background-image:url('delete.png');
height:60px;
width:40px;
background-repeat:no-repeat;
  }


input[type=submit] {

            background-color: Transparent;
            background-repeat:no-repeat;
            cursor:pointer;
            overflow: hidden;
      font-size:1.5em;
	  text-align:center;
	  padding:5px 227px; 
	  -webkit-border-radius: 5px;
			border-radius: 5px;
			color:white;

        }
		
		.box{
			position:fixed;
			top:0%;
			left:33%;
			height:13em;
			width:40em;
            background-color:black;
            opacity:0.5;			
              -webkit-border-radius: 5px;
			border-radius: 5px;
			}
.add{
	font-size:2.9em;
	text-align:center;
	color:white;
	font-family: Copperplate Gothic Light, sans-serif;
}

</style>

<meta charset="UTF-8">
<title>add contacts</title>
</head>
<body>
<div class="box">
<form action="add.php" method="post">
<div class="add"> ADD CONTACT</div>
    <p>
        <label for="firstName"></label>
        <input type="text" name="name" id="name"  required="required"   placeholder="NAME"  style="font-size:1.5em">
    
   
   
        <label for="phone"></label>
        <input type="text" name="phone" id="phone" required="required"   placeholder="PHONE"   style="font-size:1.5em">
    </p>
    <input type="submit" value="Add Records" >
	<a href="logout.php"><div class="logout"></div></a><br/><br/>
	
</form>
</div>
</body>
</html>








<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("mysql10.000webhost.com", "a2953611_madhu", "madhusai3113", "a2953611_firstdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM `".$user."`";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table >";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";
                echo "<th>phone</th>";
				echo "<th>edit</th>";
				echo "<th>delete</th>";
            echo "</tr>";
			
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
			
                echo "<td align='center'>" . $row['person_id'] . "</td>";
                echo "<td align='center'>" . $row['name'] . "</td>";
                echo "<td  align='center'>" . $row['phone'] . "</td>";
				Print '<td align="center"><a href="testup.php?person_id='. $row['person_id'] .'"><div class="edit"></div></a> </td>';
				Print '<td align="center"><a href="delete.php?person_id='. $row['person_id'] .'"><div class="delete"></div></a> </td>';

            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records .";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>






