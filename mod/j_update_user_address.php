<?php 
#update lai thong tin dia chi de tinh tien user cho ajax	
if(!defined('SECURITY')) exit('404 - Not Access');
	if(isset($_SESSION['Email'])){
		require_once('j_all.php');
		$lg=new j_all;
	 	$sql=$lg->update_address_user($_SESSION['Email']);
		echo $sql;
	}
	else{
		echo 0;
	}