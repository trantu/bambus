<?php 
#lay region  autocomple cho ajax
if(!defined('SECURITY')) exit('404 - Not Access');
	require_once("j_all.php");
	$rg=new j_all;
	$postal=$_POST['postal'];
	$db=$config['straßenort_de_ort'];
	echo $rg->getRegionPzl($db,$postal);

 ?>