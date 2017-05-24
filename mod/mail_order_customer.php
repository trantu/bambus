<?php  ///lay cac mon an order de gui mail 
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'mail_order_customer.tpl');
	$arrSP=$_POST['arrSP'];
	$arrSP=array_filter($arrSP);
	$count_sp=count($arrSP);

//for ($i=0; $i <$count_sp ; $i++) { 
	$i=0;
	$total_once=0;
	foreach ($arrSP as $row) {
		$xtpl->assign("QTY",$row['qty']);
		//lấy id(PLU) của món ăn kèm.vì món ăn kem có thêm tên món ăn kèm vao id(PLU)
		//$pattern='/[0-9]{1,9}\b/';
		///preg_match($pattern,$row['idSP'],$result);
		//$idSP_PR=$result[0];

		$xtpl->assign("IDSP",$row['plu']);
		$xtpl->assign('PRICE',$row['price']);
		$xtpl->assign('NOTE',$row['note']);
		$xtpl->assign('NAME',$row['name']);
		$str=$row['price']*$row['qty'];
		$total_once +=$str;
		$prs=number_format($str,2,',','.');
		$xtpl->assign('PRICES',$prs);
		if(isset($row['Beilage'])==true){
			$xtpl->assign("BEILAGE",$row['Beilage']);
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
	$xtpl->assign('LPLU',$mp['plu']);
	$xtpl->assign('LNOTE',$mp['note']);
	$xtpl->assign('LTOTALPRICE',$mp['totalprice']);
	$xtpl->assign('LBEILAGE',$mp['beilage']);
	$xtpl->assign('LTOTAL',$mp['total']);
	$xtpl->assign('LTITLECART',$mp['titlecart']);
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$xtpl->parse("main.people");
//}

	 $xtpl->parse("main");
	$xtpl->out("main");