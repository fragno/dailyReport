<?php
	header("content-type:text/html; charset=utf-8");
	$name = $_GET["name"];
	$email = $_GET["email"];

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
	$sql = "CREATE TABLE zhuce
		(
			Name varchar(30),
			Email varchar(45),
			PRIMARY KEY(Email)
		)";
	mysql_query($sql, $con);
	mysql_query("INSERT INTO zhuce VALUES ('$name', '$email') ON DUPLICATE KEY UPDATE Name='$name'");
	mysql_close($con);
	$weekNum = date("w");
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
?>
