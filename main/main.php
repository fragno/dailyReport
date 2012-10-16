<?php
	$name = $_REQUEST["name"];
	$email = $_REQUEST["email"];
	$weekNum = date('w');
	$con = mysql_connect("localhost", "root", "123456");
	mysql_query("set names 'utf8'");
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	if(mysql_query("CREATE DATABASE IF NOT EXISTS lab", $con))
	{
	}
	else 
	{
		echo "Error creating database: " . mysql_error();
	}

	mysql_select_db("lab", $con);
	$result = mysql_query("SELECT * FROM zhuce WHERE Email='$email'");
	$row = mysql_fetch_array($result);
	if(!$row)
	{
		include("signup.html");
	}
	else
	{		
		switch ($weekNum)
		{
			case 0:
			case 6:
			case 1:
				include("weekStart.html");
				break;
			case 2:				
			case 3:
				include("weeking.html");
				break;
			case 4:
			case 5:
				include("weekSum.html");
				break;
			default:
				include("error.html");
		}
	}
	mysql_close($con);
?>
