<?php 
#lay postal autocomple cho ajax
if(!defined('SECURITY')) exit('404 - Not Access');
	require_once('j_all.php');
	$po=new j_all;
	$key=$_POST['key'];	
	$db=$config['straßenort_de_ort'];
	echo json_encode($po->getPzl($db,$key));

 ?>