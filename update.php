<html>
	<head>
		<title>My first PHP website</title>
	</head>
	
	<body>
		<h2>Home Page</h2>
		<a href="logout.php">Click here to logout</a><br/><br/>
		<a href="create_table.php">Return to Home page</a>
		<h2 align="center">Currently Selected</h2>
		<table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>name</th>
				<th>Phone</th>
				
			</tr>
			<?php
				if(!empty($_GET['person_id']))
				{
					$id = $_GET['person_id'];
					$_SESSION['person_id'] = $id;
					mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
					mysql_select_db("demo") or die("Cannot connect to database"); //connect to database
					$query = mysql_query("Select * from persons Where person_id='$id'"); // SQL Query
					$count = mysql_num_rows($query);
					if($count > 0)
					{
						while($row = mysql_fetch_array($query))
						{
							Print "<tr>";
								Print '<td align="center">'. $row['person_id'] . "</td>";
								Print '<td align="center">'. $row['name'] . "</td>";
								Print '<td align="center">'. $row['phone']. "</td>";
							Print "</tr>";
						}
					}
					else
					{
						$id_exists = false;
					}
				}
			?>
		</table>
		<br/>
		<?php
		
		
		Print '
		<form action="update.php" method="POST">
			Enter new detail: <input type="text" name="name"/><br/>
						Enter new detail: <input type="tel" name="phone"/><br/>

			<input type="submit" value="Update List"/>
		</form>
		';
		?>
	</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysql_select_db("demo") or die("Cannot connect to database"); //Connect to database
		$name = $_POST['name'];
	    $phone = $_POST['phone'];
		mysql_query("UPDATE persons SET name='$name',phone='$phone' WHERE person_id='$id'") ;
		header("location: update.php");
	}
?>