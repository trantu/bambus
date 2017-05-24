<?php  
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'history_order.xtpl');
	require_once("j_all.php");
	$j_all=new j_all;

	
	if(isset($_SESSION['Email'])==true){
		$xtpl->assign('HTTCHANGEPASS',$history['info']['ttchangepass']);
		$xtpl->assign('EMAIL',$_SESSION['Email']);
		$xtpl->assign('LOGUOT',$main['sigin']['logout']);
		$xtpl->parse("main.loginsession");
	}
	else { header("location:index.php?mod=main");}

	if(isset($_SESSION['choseinfo_order'])){
		unset($_SESSION['choseinfo_order']);
	}

	else{
		$xtpl->assign("CHOSEDEFUALT",2);
	}

	if(isset($_POST['sb-register'])){
		$_SESSION['choseinfo_order']=1;
		$j_all->updateuser();
		$xtpl->assign('IFUPDATESUCCESS',$history['info']['updatesuccess']);
		$xtpl->parse("main.success");
	}

	if(isset($_SESSION['choseinfo_order'])){
		$xtpl->assign("CHOSEDEFUALT",1);
	}
	else{
		$xtpl->assign("CHOSEDEFUALT",2);
	}

	/**Address**/
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


	//info user
	$rowuser=$j_all->infoUser($_SESSION['Email']);
	$xtpl->assign("SELECTED","checked");
	if($rowuser['Sex']==1){
		$xtpl->assign('IFMALE',$history['info']['male']);
		$xtpl->assign('IFFEMALE',$history['info']['female']);
	 	$xtpl->parse("main.male");
	}
	else{ 
		$xtpl->assign('IFMALE',$history['info']['male']);
		$xtpl->assign('IFFEMALE',$history['info']['female']);
		$xtpl->parse("main.female");
	}
	$xtpl->assign("EMAILUSER",$rowuser['Email']);
	$xtpl->assign("FIRSTNAMEUSER",$rowuser['Firstname']);
	$xtpl->assign("LASTNAMEUSER",$rowuser['Lastname']);
	$xtpl->assign("STRESSUSER",$rowuser['Stress']);
	$xtpl->assign("OFFICEUSER",$rowuser['Office']);
	$xtpl->assign("NUMBERHOUSEUSER",$rowuser['Numberhouse']);
	$xtpl->assign("NOTEPOSITIONUSER",$rowuser['Noteposition']);
	$xtpl->assign("POSTALCODEUSER",$rowuser['Postalcode']);
	$xtpl->assign("REGIONUSER",$rowuser['Region']);
	$xtpl->assign("COMPANYUSER",$rowuser['Company']);
	$xtpl->assign("PHONEUSER",$rowuser['Phone']);
	$xtpl->assign("NOTEUSER",$rowuser['Note']);
	$xtpl->assign("STRESSOLD",$_SESSION['addresold']);

	/* History */
	$historys=$j_all->history_orderid($_SESSION['idUser']);
	if(is_array($historys)){
		foreach ($historys as $roworder) {
			$xtpl->assign("IDDH",$roworder['idDH']);
			$xtpl->assign("DAY",$roworder['Day']);
			$xtpl->assign("QTY",$roworder['Qty']);
			$xtpl->assign("TOTAL",$roworder['Total']);
			$xtpl->assign("ICONPRICE",$config['iconprice']);
			$xtpl->assign("ADDRESSORDER",$roworder['Address']);
			$xtpl->assign("HDELETE",$history['history']['delete']);
			$xtpl->parse("main.history");
		}
	}		
		/*$xtpl->assign('IFPASS',$history['info']['password']);
		$xtpl->assign('IFREPASS',$history['info']['repasseword']);
		*/
		
/*
*
*Langue page
*
*/		
		$xtpl->assign('HTTINFO',$history['info']['title']);
		$xtpl->assign('HTITLEP',$history['info']['titlep']);
		$xtpl->assign('IFEMAIL',$history['info']['mail']);
		$xtpl->assign('IFFIRSTNAME',$history['info']['firstname']);
		$xtpl->assign('IFLASTNAME',$history['info']['lastname']);
		$xtpl->assign('IFPOSTAL',$history['info']['postal']);
		$xtpl->assign('IFOFFICE',$history['info']['office']);
		$xtpl->assign('IFNUMBERHOUSE',$history['info']['numberhouse']);
		$xtpl->assign('IFNOTEPOSITON',$history['info']['noteposition']);
		$xtpl->assign('IFSTRESS',$history['info']['stress']);
		$xtpl->assign('IFREGION',$history['info']['region']);
		$xtpl->assign('IFCOMPANY',$history['info']['company']);
		$xtpl->assign('IFPHONE',$history['info']['phone']);
		$xtpl->assign('IFNOTE',$history['info']['note']);
		$xtpl->assign('IFBUTTON',$history['info']['button']);	

		$xtpl->assign("RPMAIL",$main['register']['pmail']);
		$xtpl->assign("RPFIRSTNAME",$main['register']['pfirstname']);
		$xtpl->assign("RPLASTNAME",$main['register']['plastname']);
		$xtpl->assign("RPPOSTAL",$main['register']['ppostal']);
		$xtpl->assign("RPOFFICE",$main['register']['poffice']);
		$xtpl->assign("RPNUMBERHOUSE",$main['register']['pnumberhouse']);
		$xtpl->assign("RPNOTEPOSITION",$main['register']['pnoteposition']);
		$xtpl->assign("RPSTRESS",$main['register']['pstress']);
		$xtpl->assign("RPREGION",$main['register']['pregion']);
		$xtpl->assign("RPCOMPANY",$main['register']['pcompany']);
		$xtpl->assign("RPPHONE",$main['register']['pphone']);
		$xtpl->assign("RPNOTE",$main['register']['pnote']);

		$xtpl->assign("HTITLE",$history['history']['title']);
		$xtpl->assign("HTITLEHP",$history['history']['titlep']);
		$xtpl->assign("HCATION",$history['history']['cation']);
		$xtpl->assign("HDAY",$history['history']['day']);
		$xtpl->assign("HQTY",$history['history']['qty']);
		$xtpl->assign("HTOTALPRICE",$history['history']['totalprice']);
		$xtpl->assign("HADDRESS",$history['history']['address']);
		$xtpl->assign("HDELETE",$history['history']['delete']);

		$xtpl->assign('CPTITLE',$history['changepass']['title']);
		$xtpl->assign('CPPASSOLD',$history['changepass']['passold']);
		$xtpl->assign('CPPASSNEW',$history['changepass']['passnew']);
		$xtpl->assign('CPPASSCONFIRM',$history['changepass']['passconfirm']);
		$xtpl->assign('CPBUTTON',$history['changepass']['button']);
		$xtpl->assign('CPERRORDB',$history['changepass']['errordb']);
		$xtpl->assign('CPISSETPASS',$history['changepass']['issetpass']);
		$xtpl->assign('CPSUCCESS',$history['changepass']['success']);
		$xtpl->assign('CPCFPASSS',$history['changepass']['jconfirmpass']);
	
	$xtpl->parse("main");
	$xtpl->out("main");

	

