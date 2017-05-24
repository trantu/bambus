<?php if(!defined('SECURITY')) exit('404 - Not Access'); 
#load mon an
require_once("all.php");
$xtpl=new XTemplate(TEMPLATE."dishes.tpl");

$ds=new all;
$dss=$ds->getDishes();
$xtpl->assign('LANGUAGEMAIN',$de_main);
$xtpl->assign('LANGUAGECART',$de_cart);
$count=count($dss);
foreach ($dss as $names) {
	if($names['Beilage']==null){
		$xtpl->assign('IDSP',$names['PLU']);
		$xtpl->assign('NAME',$names['Name']);
		$price_s=number_format($names['Preis1'],2,',','.');
		$xtpl->assign("PRICE",$price_s);
		$xtpl->assign("NAMEONLINE",$names['Artikel_Beschreibung']);
		$xtpl->assign("ONLINEFARBE",$names['Online_Farbe']);
		$xtpl->assign("ONLINEBILD",$names['Online_Bild']);
		$xtpl->assign("NOTECONTENT",$de_cart['note']['content']);
		$xtpl->assign("ICONPRICE",$config['iconprice']);
		$xtpl->parse("name");
	}
	else{

		$xtpl->assign('IDSP',$names['PLU']);
		$xtpl->assign('NAME',$names['Name']);
		$price_s=number_format($names['Preis1'],2,',','.');
		$xtpl->assign("PRICE",$price_s);
		$xtpl->assign("NAMEONLINE",$names['Artikel_Beschreibung']);
		$xtpl->assign("ONLINEFARBE",$names['Online_Farbe']);
		$xtpl->assign("ONLINEBILD",$names['Online_Bild']);
		$xtpl->assign("NOTECONTENT",$de_cart['note']['content']);
		$xtpl->assign('SIDEDISH',$de_cart['cart']['side-dish']);
		$beilage=$names['Beilage'];
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

		unset($dd);
		$xtpl->assign('COUNT_DISHIS',$dem_d);
		$xtpl->assign("ICONPRICE",$config['iconprice']);
		$xtpl->parse("names");
	}
	
}
		

$xtpl->out("name");
$xtpl->out("names");

$xtpl->parse("contentdishis");
$xtpl->out("contentdishis");
