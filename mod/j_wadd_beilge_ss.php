<?php  if(!defined('SECURITY')) exit('404 - Not Access');
require_once("./lib/cart.php");
$cart=new Cart;
if(isset($_POST['arrDS'])){
	
	$arr=$_POST['arrDS'];
	$idSPs=$_POST['idSPs'];
	$stt='sothutu';
	if(isset($_POST['stt'])) { $stt=$_POST['stt'];}

	$i=0;$total_ds=0;$name_ds='';$arrdishis='';$note='';
	$count=count($arr);
	foreach ($arr as $a) {
		if(is_array($a)){
			$total_ds +=$a[0];
			$name_ds.=$a[1];
			if($i<$count-1) { $arrdishis.=$a[1]."|"; }
			else{ $arrdishis.=$a[1]; }	
		}
		else{ echo -1; }	
		$i++;
	}

	$idSP=$name_ds.$idSPs;
	$note=trim(strip_tags($_POST['note']));
	
	if($stt==$_SESSION['countpp'] || $_SESSION['countpp'] ==0){
		if(isset($_SESSION['total_PP'])==false){
			echo number_format($cart->add_cart_beilage_w($idSP,$idSPs,$total_ds,$arrdishis,$idSPs,$note),2,',','.');
		}
		
		else{
			$add=$cart->add_cart_beilage_w($idSP,$idSPs,$total_ds,$arrdishis,$idSPs,$note);
			$total=$_SESSION['total_PP']+$add;
			echo number_format($total,2,',','.');
		}	
	}
	
	else{
		$add=$cart->add_cart_beilage_wss($idSP,$idSPs,$total_ds,$arrdishis,$idSPs,$note,$stt);
		$total=$_SESSION['total_PP']+$add + $_SESSION['total'];
		$_SESSION['total_PP']=$_SESSION['total_PP'] + $add;
		echo number_format($total,2,',','.');
	}
	
	
}


 ?>