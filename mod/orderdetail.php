<?php  
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'order.xtpl');
	require_once("all.php");
	require_once("j_all.php");
	$all=new All;
	$rule=new Rule;
	$j_all=new j_all;

	if(!isset($_SESSION['arrSPPP'])) {
        $_SESSION['arrSPPP']= array();
    }
    if(!isset($_SESSION['total_PP'])) {
        $_SESSION['total_PP']= 0;
    }  

	if(isset($_SESSION['Email'])==true){
		$xtpl->assign('EMAIL',$_SESSION['Email']);
		$xtpl->assign('SLOGUOT',$main['sigin']['logout']);
		//$xtpl->parse("main.loginsession");
		//$xtpl->parse("main.ordercart");
		$rowuser=$j_all->infoUser($_SESSION['Email']);
		$xtpl->assign("EMAILUSER",$rowuser['Email']);
		$xtpl->assign("READONLY_IP",'readonly');
		$xtpl->assign("NAMEUSER",$rowuser['Firstname']." ".$rowuser['Lastname']);
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
	}
	else { 	
		$xtpl->assign("STRESSOLD",$_SESSION['addresold']);
	}

/**Address **/
	
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

/* * lay cac fiel de dua vao input * */
	

	//cart
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$tt=number_format($_SESSION['total_PP'],2,',','.');
	$xtpl->assign("TOTAL",$tt);
	/*
	* langue order
	*/

		$xtpl->assign('ODTITLE',$order['title']);
		$xtpl->assign('ODTITLEP',$order['titlep']);
		$xtpl->assign('ODNAME',$order['name']);

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
		$xtpl->assign('IFBUTTONPAY',$order['buttonpay']);

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

		$xtpl->assign('CMINOMUM',$main['cart']['minimum_title']);
		$xtpl->assign('CSUMME',$main['cart']['summe']);
		$xtpl->assign('BUTTONSTRESS',$order['buttonstress']);

	$xtpl->parse("main");
	$xtpl->out("main");
 