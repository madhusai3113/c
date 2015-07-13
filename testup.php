<html>
<head>
<title>Update a Record in MySQL Database</title>
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

		p{font-size:2.9em;
	text-align:center;
	color:white;
	font-family: Copperplate Gothic Light, sans-serif;}
		
		
	.box{
			position:fixed;
			top:0%;
			left:33%;
			height:15em;
			width:40em;
            background-color:black;
            opacity:0.5;			
              -webkit-border-radius: 5px;
			border-radius: 5px;
			
			}
		
form{
	
	position:relative;
	left:3.5%;
	color:
	font-size:
	font-style:
	font-family:
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

        }
.back{
	position:relative;
	top:50%;
	left:35%;
	color:white;
	font-size:3em;
font-family: 'Open Sans', sans-serif;
    text-decoration: none;

}

</style>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
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

if(isset($_POST['update']))
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
					

$name = $_POST['name'];
$phone= $_POST['phone'];
$sql = "UPDATE `".$user."` SET  name='$name',phone='$phone' where person_id ='$id'";


mysql_select_db('a2953611_firstdb');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
Print '<script>alert("updated successfully!");</script>';
Print '<script>window.location.assign("create_table.php");</script>';}
else
{
?>

<div class="box">
<p>UPDATE CONTACT    </p>
<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">

<input name="name" type="text" id="name"   required="required"   placeholder="NEW NAME" style="font-size:1.5em">


<input name="phone" type="tel" id="phone" required="required"  placeholder="NEW PHONE NUMBER"  style="font-size:1.5em">

</tr>
<tr>
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="update" type="submit" id="update" value="UPDATE">
</td>
</tr>
</table>
</form>
</div>
<?php
}
?>
<div class="back"><a href="create_table.php"   style=" text-decoration: none;">Return to contacts page</a></div>
</body>
</html>