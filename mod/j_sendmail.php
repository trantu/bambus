<?php if(!defined('SECURITY')) exit('404 - Not Access');

//send mail khi quen mat khau
require("./lib/mail/class.phpmailer.php");
require_once("j_all.php");

$sm=new j_all;

$TO_EMAIL=$_POST['email'];
$check=$sm->checkEmail($TO_EMAIL);
if($check==0){ echo 0;}
else{
	$pass=$sm->randompass($TO_EMAIL);
	$bod=str_replace('{pass}',$pass,$config['forgetmail']['body']);
	$body =$bod;
	$subject=$config['forgetmail']['subject'];
	$result=$sm->sendmail($TO_EMAIL, $subject, $body);
		
	echo $result;
}
?>
