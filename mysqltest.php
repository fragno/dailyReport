<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="Content-Language" content="zh-CN">
</head>
<body>
<?php
$data = $_POST["txt"];
$Name = $_POST["Name"];
$Date = $_POST["Date"];

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
$sql = "CREATE TABLE ribao 
	(
		Date date,
		Name varchar(30),
		Content text,
	 	PRIMARY KEY CLUSTERED (Date, Name)
	)";
mysql_query($sql, $con);

$result = mysql_query("SELECT Name FROM zhuce");
$flag = false;
while($row = mysql_fetch_array($result))
{
    if($Name == $row['Name'])
    {
      mysql_query("INSERT INTO ribao VALUES ('$Date', '$Name', '$data') ON DUPLICATE KEY UPDATE Content='$data'");

      $result1 = mysql_query("SELECT * FROM ribao WHERE Date='$Date' and Name='$Name'");
      while($row1 = mysql_fetch_array($result1))
      {
    	echo "<br />";
    	echo $row1['Content'];
    	echo "<br />";
      }
      echo "<br><br><hr><br>Baby, Nice Done<br><br>";      
      $flag = true;
      break;
    }   
}

if($flag == false)
{
	echo "<br><br><hr><br>Oops!!! something Wrong, Check your name and email!<br><br>"; 
}
mysql_close($con);
?>
</body>
