<?php 
#lay thong tin user cho ajax theo Email
if(!defined('SECURITY')) exit('404 - Not Access');
	if(isset($_SESSION['Email'])){
		require_once('j_all.php');
		$lg=new j_all;
		$email=trim(strip_tags($_SESSION['Email']));
		$info=$lg->infoUser($email);
		$arr=array("info"=>$info);
		echo json_encode($arr);
	}
	else{
		$arr=array();
		echo json_encode($arr);
	}