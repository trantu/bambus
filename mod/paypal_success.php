<?php  

//trang hien thi các fied khi thanh toán hành công
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'paypal_success.tpl');
	//require_once("all.php");
	require_once("j_all.php");
	$j_all=new j_all;
	$rule= new Rule;

	if(!isset($_SESSION['arrSPPP']) || !isset($_SESSION['infopaypals'])){
        header("location:index.php?mod=main");
    }
	else{

		/**Address**/
		
		/*$xtpl->assign("NAMEUSER",$_SESSION['infopaypals']['name']);
		$xtpl->assign("ADDRESSUSER",$_SESSION['infopaypals']['stress']);
		$xtpl->assign('PHONEUSER',$_SESSION['infopaypals']['phone']);
		$xtpl->assign('NUMBERUSER',$_SESSION['infopaypals']['numberhouse']);

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
		*/

		$arrSP=$_SESSION['arrSPPP'];
		$arrSP=array_filter($arrSP);
		$count_sp=count($arrSP);
		$total_m_all=0;
		$total_q_all=0;
		$i=0;
		//for ($i=0; $i <$count_sp ; $i++) { 
			$total_once=0;
			foreach ($arrSP as $row) {
				$total_q_all +=$row['qty'];
				$xtpl->assign("QTY",$row['qty']);
				$xtpl->assign("IDSP",$row['idSP']);
				$xtpl->assign('PRICE',$row['price']);
				$xtpl->assign('NAME',$row['name']);
				$xtpl->assign('NOTE',$row['note']);
				$str=$row['price']*$row['qty'];
				$total_once +=$str;
				$total_m_all +=$str;
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

			$xtpl->assign('LNAME',$mp['name']);
			$xtpl->assign('LQTY',$mp['qty']);
			$xtpl->assign('LTOTALPRICE',$mp['totalprice']);
			$xtpl->assign('LBEILAGE',$mp['beilage']);
			$xtpl->assign('LNOTE',$mp['note']);
			$xtpl->assign('LTOTAL',$mp['total']);
			$xtpl->assign('LTITLECART',$mp['titlecart']);
			$xtpl->assign('NUMBER',$i+1);
			$xtpl->assign("ICONPRICE",$config['iconprice']);
			$totalo=number_format($total_once,2,',','.');
			$xtpl->assign("TOTAL",$totalo);
			$xtpl->parse('main.people');


        // Save order to database
		//if($config['save_log_db']==1){
        $qty    = $total_q_all;
        $total  = number_format($total_m_all,2,',','.');

        $address = $_SESSION['infopaypals'];

        $address = preg_replace('/\n++/', ' ', $address);
        $address = preg_replace('/\r++/', ' ', $address);

        $address= json_encode($address,JSON_UNESCAPED_UNICODE);


        $idUser = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 0;
        $day    = date("Y-m-d H:i:s A");

        $productJson = json_encode($_SESSION['arrSPPP'], JSON_UNESCAPED_UNICODE);
        $productJson = preg_replace('/█++/', '<==>', $productJson);

        $j_all->history_odrer($idUser,$productJson,$qty,$total,$day,$address);

		unset($_SESSION['infopaypals']);
	 	unset($_SESSION['arrSPP']);
	 	unset($_SESSION['arrSP']);
	 	unset($_SESSION['total_PP']);
	 	unset($_SESSION['total']);
	 	unset($_SESSION['total_dishis']);


        header("location:index.php?mod=main");

		/***Langue ****/
			
//		$xtpl->assign("PPTITLE",$mp['title']);
//		$xtpl->assign("PPTITLEP",$mp['titlep']);
//		$xtpl->assign("PPTITLEA",$mp['titlepa']);
//		$xtpl->assign("PPTITLEPN",$mp['titlepn']);
//
//		$xtpl->assign('IFSTRESS',$history['info']['stress']);
//		$xtpl->assign('IFPHONE',$history['info']['phone']);
//		$xtpl->assign('IFNAME',$mp['name']);
//		$xtpl->assign('IFTITLEADDRESS',$mp['titleaddress']);
//
//
//
//		# hiển thị địa chỉ thông tin trên
//		$telephone=$config['telephone_store'];
//		$email=$config['email_store'];
//		$xtpl->assign("TELEPHONE",$telephone);
//		$xtpl->assign("EMAILCONTACT",$email);
//		#end hiển thị địa chỉ thông tin trên
//        $xtpl->assign('TITLE',$config['namestore']);
//        $xtpl->assign('FAVICON_ICO',$config['favicon_ico']);
//
//		$xtpl->parse("main");
//		$xtpl->out("main");

	}
	


