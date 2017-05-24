<?php  
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'delete_hisorder.xtpl');
	require_once("j_all.php");
	$j_all=new j_all;
	if(isset($_POST['idDH'])){
		$idDH=$_POST['idDH'];
		$j_all->delete_order($idDH);
	}
	
	$historys=$j_all->history_orderid($_SESSION['idUser']);
	if(is_array($historys)){
		foreach ($historys as $roworder) {
			$xtpl->assign("IDDH",$roworder['idDH']);
			$xtpl->assign("DAY",$roworder['Day']);
			$xtpl->assign("QTY",$roworder['Qty']);
			$xtpl->assign("TOTAL",$roworder['Total']);
			$xtpl->assign("ADDRESSORDER",$roworder['Address']);
			$xtpl->assign("HDELETE",$history['history']['delete']);
			$xtpl->parse("main.history");
		}
	}
	
	
	$xtpl->assign("ICONPRICE",$config['iconprice']);	

		$xtpl->assign("HTITLEP",$history['history']['titlep']);
		$xtpl->assign("HCATION",$history['history']['cation']);
		$xtpl->assign("HDAY",$history['history']['day']);
		$xtpl->assign("HQTY",$history['history']['qty']);
		$xtpl->assign("HTOTALPRICE",$history['history']['totalprice']);
		$xtpl->assign("HADDRESS",$history['history']['address']);
		$xtpl->assign("HDELETE",$history['history']['delete']);

	$xtpl->parse("main");
	$xtpl->out("main");
	
	

