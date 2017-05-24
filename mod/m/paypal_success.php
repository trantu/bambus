<?php  if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'m/paypal_success.tpl');
	//require_once("all.php");
	require_once("mod/./j_all.php");
	$j_all=new j_all;
	$rule= new Rule;
	
	if(!isset($_SESSION['arrSP']) || !isset($_SESSION['infopaypals']))
	{
		header("location:index.php?mod=m/main");
	}
	else {
		
		// if(isset($_SESSION['Email'])==true){
		// 	$xtpl->assign('EMAIL',$_SESSION['Email']);
		// 	$xtpl->parse("main.loginsession");
		// 	$xtpl->parse("main.ordercart");
		// }
		

		// else {  header("location:index.php?mod=m/main");}

		$xtpl->assign("NAMEUSER",$_SESSION['infopaypals']['name']);
		$xtpl->assign("ADDRESSUSER",$_SESSION['infopaypals']['stress']);
		$xtpl->assign('PHONEUSER',$_SESSION['infopaypals']['phone']);
		$xtpl->assign('NUMBERUSER',$_SESSION['infopaypals']['numberhouse']);
		//$xtpl->parse("main.addressstore");

		$address=$config['address_store'];
		$xtpl->assign("NAMESTORE",$address['name']);
		$xtpl->assign("ADDRESSSTORE",$address['address']);
		$xtpl->assign('REGIONSTORE',$address['region']);
		$xtpl->parse("main.addressstore");
		
		$telephone=$config['telephone_store'];
		$email=$config['email_store'];
		$xtpl->assign("TELEPHONE",$telephone);
		$xtpl->assign("EMAILCONTACT",$email);
		$xtpl->parse("main.contactus");
		foreach ($_SESSION['arrSP'] as $row) {

			$xtpl->assign("QTY",$row['qty']);
			$xtpl->assign("IDSP",$row['idSP']);
			$xtpl->assign('PRICE',$row['price']);
			$xtpl->assign('NAME',$row['name']);
			$str=$row['price']*$row['qty'];
			$prs=number_format($str,2,',','.');
			$xtpl->assign('PRICES',$prs);
			if(isset($row['Beilage'])==true){
				$xtpl->assign("BEILAGE",":-".$row['Beilage']);
			}
			else{
				$xtpl->assign("BEILAGE",'.');
			}

			$xtpl->assign("ICONPRICE",$config['iconprice']);
			$xtpl->parse('main.cart');

		}


		$qty=$_SESSION['total_dishis'];
		$total=number_format($_SESSION['total'],2,',','.');
		$address=$_SESSION['infopaypals']['stress'];
		$idUser=$_SESSION['idUser'];
		$day=date("Y-m-d H:i:s A");
		if($config['save_log_db']==1){
			$j_all->history_odrer($idUser,$qty,$total,$day,$address);
		}

		
/***Langue ****/
				
			$xtpl->assign("PPTITLE",$mp['title']);
			$xtpl->assign("PPTITLEP",$mp['titlep']);
			$xtpl->assign("PPTITLEA",$mp['titlepa']);
			$xtpl->assign("PPTITLEPN",$mp['titlepn']);
				
			$xtpl->assign('IFSTRESS',$history['info']['stress']);
			$xtpl->assign('IFPHONE',$history['info']['phone']);
			$xtpl->assign('IFNAME',$mp['name']);
			$xtpl->assign('IFTITLEADDRESS',$mp['titleaddress']);

			$xtpl->assign('LNAME',$mp['name']);
			$xtpl->assign('LQTY',$mp['qty']);
			$xtpl->assign('LTOTALPRICE',$mp['totalprice']);
			$xtpl->assign('LBEILAGE',$mp['beilage']);
			$xtpl->assign('LTOTAL',$mp['total']);
			$xtpl->assign('LTITLECART',$mp['titlecart']);




		$xtpl->assign("ICONPRICE",$config['iconprice']);
		$tt=number_format($_SESSION['total'],2,',','.');
		$xtpl->assign("TOTAL",$tt);
		
		$xtpl->parse("main");
		$xtpl->out("main");
		unset($_SESSION['infopaypals']); 
	 	unset($_SESSION['arrSP']);
	 	unset($_SESSION['total']);
	 	unset($_SESSION['total_dishis']);
	}	
	
