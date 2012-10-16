<?php
//require_once('phpmailer.inc.php');
//require_once('smtp.inc.php');
require_once(dirname(__FILE__).'/phpmailer/class.phpmailer.php');



class FreakMailer extends PHPMailer
{
	var $priority = 3;
	var $to_name;
	var $to_email;
	var $From = null;
	var $FromName = null;
	var $Sender = null;

	function FreakMailer()
	{
		global $site;
		//Comes from config.php $site array
		if($site['smtp_mode'] == 'enabled')
		{
			$this->Host = $site['smtp_host'];
			$this->Port = $site['smtp_port'];
			$this->CharSet = 'utf-8';
			$this->IsSMTP();
			$this->SMTPAuth = true;
			$this->SMTPDebug = 2;                     // enables SMTP debug information (for testing)			
			//$this->SMTPSecure = "ssl";              //163.com doesnot need ssl, poor
			$this->Mailer = "smtp";
			if($site['smtp_username'] != '')
			{
				$this->Username = $site['smtp_username'];
				$this->Password = $site['smtp_password'];
			}
		}
		if(!$this->From)
		{
			$this->From = $site['from_email'];
		}
		if(!$this->FromName)
		{
			$this->FromName = $site['from_name'];
		}
		if(!$this->Sender)
		{
			$this->Sender = $site['from_email'];
		}
		$this->Priority = $this->priority;
	}
}

?>
