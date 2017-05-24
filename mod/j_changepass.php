<?php if(!defined('SECURITY')) exit('404 - Not Access');
require_once("j_all.php");
$j_all=new j_all;
if(isset($_POST['password_old'])){
	$pass_old=md5($_POST['password_old']);
	$pass_new=md5($_POST['password_new']);
	$email=$_SESSION['Email'];
	$result=$j_all->changepass($email,$pass_old,$pass_new);
	echo $result;
}

 ?>