<html>
<head>
<title>Delete a Record in MySQL Database</title>

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
			overflow:hidden;
		}

		input[type=submit] {

            background-color: Transparent;
            background-repeat:no-repeat;
            cursor:pointer;
            overflow: hidden;
      font-size:1.5em;
	  text-align:center;
	  padding:5px 247px; 
	  -webkit-border-radius: 5px;
			border-radius: 5px;
			color:white;
			position:relative;
			top:10%;
			left:8%;
		}
		
		
		input[type=button]{

            background-color: Transparent;
            background-repeat:no-repeat;
            cursor:pointer;
            overflow: hidden;
      font-size:1.5em;
	  text-align:center;
	  padding:5px 247px; 
	  -webkit-border-radius: 5px;
			border-radius: 5px;
			color:white;
			position:relative;
			top:40%;
			left:8%;
		}
  
.box{
			position:fixed;
			top:30%;
			left:33%;
			height:15em;
			width:40em;
            background-color:black;
            opacity:0.5;			
              -webkit-border-radius: 5px;
			border-radius: 5px;
			
			}		
		
		
</style>



</head>
<body>

<?php

session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value



if(isset($_POST['delete']))
{
$dbhost = 'mysql10.000webhost.com';
$dbuser = 'a2953611_madhu';
$dbpass = 'madhusai3113';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}                   $id = $_GET['person_id'];
					$_SESSION['person_id'] = $id;
					


$sql = "DELETE FROM `".$user."` WHERE person_id ='$id'";


mysql_select_db('a2953611_firstdb');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
Print '<script>alert("deleted successfully!");</script>';
Print '<script>window.location.assign("create_table.php");</script>';
mysql_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<div class="box">
<input name="delete" type="submit" id="delete" value="yes">

<input type="button" onclick="location.href='create_table.php';" value="no" />
</div>

</form>
<?php
}
?><br>



</body>
</html>