<?php if(!defined('SECURITY')) exit('404 - Not Access');
	//kiem tra login
	require_once('j_all.php');
	$lg=new j_all;
	echo $lg->checkLogin();
 ?>