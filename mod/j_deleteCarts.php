<?php 
if(!defined('SECURITY')) exit('404 - Not Access');
	$idSP=$_POST['idSP'];
	unset($_SESSION['sp']["$idSP"]);

 ?>