<?php 
#autocomple duong cho  ajax
if(!defined('SECURITY')) exit('404 - Not Access');
	require_once('j_all.php');
	$st=new j_all;
	$stress=$_POST['stress'];
	$postal=$_POST['postal'];
	$db=$config['straßenort_de_strasse'];
	echo json_encode($st->getStress($db,$stress,$postal));

 ?>