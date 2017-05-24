<?php  
#api cho mobile de gui mail order cua khach hang
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'api_mail_order.tpl');
	$arrSP=$_POST['arrSP'];
	$arrSP=array_filter($arrSP);
	$count_sp=count($arrSP);

for ($i=0; $i <$count_sp ; $i++) { 
	$total_once=$arrSP[$i]['totalmoneyorder'];
	foreach ($arrSP[$i]['order'] as $row) {
		$xtpl->assign("QTY",$row['amount']);
		$xtpl->assign("IDSP",$row['id']);
		$xtpl->assign('NOTE',$row['note']);
		$xtpl->assign('NAME',$row['name']);
		$xtpl->assign('PRICES',number_format($row['totalmoneyproduct'],2,',','.'));
		if(isset($row['morefoods'])==true){
			$xtpl->assign("BEILAGE",$row['morefoods']);
		}
		else{
			$xtpl->assign("BEILAGE",'-');
		}

		$xtpl->assign("ICONPRICE",$config['iconprice']);
		$xtpl->parse('main.people.cart');

	}

	/** Ngon ngu ***/
	$xtpl->assign('NUMBER',$i+1);
	$totalo=number_format($total_once,2,',','.');
	$xtpl->assign("TOTAL",$totalo);
	$xtpl->assign('LNAME',$mp['name']);
	$xtpl->assign('LQTY',$mp['qty']);
	$xtpl->assign('LNOTE',$mp['note']);
	$xtpl->assign('LTOTALPRICE',$mp['totalprice']);
	$xtpl->assign('LBEILAGE',$mp['beilage']);
	$xtpl->assign('LTOTAL',$mp['total']);
	$xtpl->assign('LTITLECART',$mp['titlecart']);
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$xtpl->parse("main.people");
}

	 $xtpl->parse("main");
	$xtpl->out("main");