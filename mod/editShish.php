<?php 
if(!defined('SECURITY')) exit('404 - Not Access'); 
require_once("all.php");
$xtpl=new XTemplate(TEMPLATE."editShish.xtpl");
if(!isset($all)){
	$all=new all;
}

$idSP=$_POST['idSP'];
$id=$_POST['id'];
$stt=$_POST['stt'];
settype($stt,"int");
if(isset($_SESSION['arrSPPP'][$stt])){
	$rowsm=$_SESSION['arrSPPP'][$stt]["$id"];
}
else{
	$rowsm=$_SESSION['arrSP']["$id"];
}

$ds_dishis=explode("|",$rowsm['Beilage']);
$note_customer=$rowsm['note'];
$row=$all->getDishes_Dish($idSP);

	$xtpl->assign('IDSP',$row['PLU']);
	$xtpl->assign('ID',$id);
	$xtpl->assign('STT',$stt);
	$xtpl->assign('NAME',$row['Name']);
	$price_s=number_format($row['Preis1'],2,',','.');
	$xtpl->assign("PRICE",$price_s);
	$xtpl->assign("NAMEONLINE",$row['Artikel_Beschreibung']);
	$xtpl->assign("ONLINEBILD",$row['Online_Bild']);
	$xtpl->assign('SIDEDISH',$main['cart']['side-dish']);
	$beilage=$row['Beilage'];
	$b=explode("█",$beilage);
	foreach ($b as $row) {
		$dd[]=explode("Ө", $row);
	}

	$counts=count($dd);
	$dem_ds=0;
	$dem_d=0;
	for($i=0;$i< $counts -1;$i++){
		if($i< $counts -1){
			if($dd[$i][0] !=$dd[$i+1][0]){
				$dem_ds++;
				$xtpl->assign('DEM_DS',$dem_ds);
				$xtpl->parse("names.demdishis");
			}
		}
		
		$beilages['name']=$dd[$i][1];
		if(in_array($beilages['name'],$ds_dishis)){
			$xtpl->assign('CHECKEDS',"checked='checked'");
		}
		else{
			$xtpl->assign('CHECKEDS',"");
		}
		$beilages['price']=$dd[$i][2]/100;
		$beilages['group']=$dd[$i][0];
		$beilages['display']=$dd[$i][3];		
	
		$xtpl->assign('GROUPCLASS',$beilages['group']);	
		$xtpl->assign('BEILAGE',$beilages['name']);
		$xtpl->assign('DISPLAY_DS',$beilages['display']);
		$xtpl->assign('CLASSDS',$dem_d);
		$price_bei=number_format($beilages['price'],2,'.',',');
		$xtpl->assign('PRICES',$price_bei);
		$xtpl->parse("names.beilage");
		$dem_d++;
	}

	
	$xtpl->assign('NOTECUSTOMER',$note_customer);
	unset($dd);
	$xtpl->assign('COUNT_DISHIS',$dem_d);
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$xtpl->parse("names");
	$xtpl->out("names");

