<?php 
#kiem tra email khi dang ky
if(!defined('SECURITY')) exit('404 - Not Access');
	require_once('j_all.php');
	$ce=new j_all;
	echo  $ce->checkIssetEmail();
 ?>