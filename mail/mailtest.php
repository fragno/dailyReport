<?php

//Grab our config settings
//require_once('config.php');
require_once(dirname(__FILE__).'/config.php');

//Grab the FreakMailer class
//require_once('MailClass.inc.php');
require_once(dirname(__FILE__).'/lib/MailClass.inc.php');

//instantiate the class
$mailer = new FreakMailer();

//acquire the date
$date = date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));
$today = date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));

//connect to the database
$con = mysql_connect("localhost", "root", "123456");
mysql_query("set names 'utf8'");
if(!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("lab", $con);
$result = mysql_query("SELECT * FROM ribao WHERE Date>='$date'");

$data = "";

//acquire the data
while($row = mysql_fetch_array($result))
{
	$data .= $row['Content'];
}


//acquire the emails

$bossName = "袁导";
$bossEmail = "yuancw2000@sina.com";
//$bossName = "hb";
//$bossEmail = "fragno12@163.com";
$mailer->AddAddress($bossEmail, $bossName);
$result = mysql_query("SELECT * FROM zhuce");
while($row = mysql_fetch_array($result))
{
	$mailer->AddCC($row['Email'], $row['Name']);
}


mysql_close($con);

//mailer setting partion

//Set the subject
$mailer->Subject = $today.'日报';

//Body
$mailer->Body = $data;
$mailer->isHTML(true);

//Add an address to send to.
//$mailer->AddAddress('fragno12@gmail.com', 'fengnan xu');

if(!$mailer->Send())
{
	echo 'There was a problem sending this mail!';
}
else
{
	echo "Mail sent!";
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();

?>

