<?php  
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'m/orderdetail.xtpl');
	require_once("mod/./all.php");
	require_once("mod/./j_all.php");
	$all=new All;
	$rule=new Rule;
	$j_all=new j_all;

	if(!isset($_SESSION['arrSP'])) {
        $_SESSION['arrSP']= array();
     }
    if(!isset($_SESSION['total'])) {
        $_SESSION['total']= 0;
    }  
    if(isset($_SESSION['arrSPPP'])){unset($_SESSION['arrSPPP']);}

    $_SESSION['arrSPPP'][]= $_SESSION['arrSP'];

	if(isset($_SESSION['Email'])==true){
		$xtpl->assign('EMAIL',$_SESSION['Email']);
		$xtpl->parse("main.loginsession");
		$xtpl->parse("main.ordercart");
	}


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


	//lấy thông tin info nếu đăng nhập
	if(isset($_SESSION['Email'])){
		$rowuser=$j_all->infoUser($_SESSION['Email']);
		$xtpl->assign("EMAILUSER",$rowuser['Email']);
		$xtpl->assign("NAMEUSER",$rowuser['Firstname']." ".$rowuser['Lastname']);
		//$xtpl->assign("SEXUSER",$rowuser['Sex']);
		$xtpl->assign("STRESSUSER",$rowuser['Stress']);
		$xtpl->assign("OFFICEUSER",$rowuser['Office']);
		$xtpl->assign("NUMBERHOUSEUSER",$rowuser['Numberhouse']);
		$xtpl->assign("NOTEPOSITIONUSER",$rowuser['Noteposition']);
		$xtpl->assign("POSTALCODEUSER",$rowuser['Postalcode']);
		$xtpl->assign("REGIONUSER",$rowuser['Region']);
		$xtpl->assign("COMPANYUSER",$rowuser['Company']);
		$xtpl->assign("PHONEUSER",$rowuser['Phone']);
		$xtpl->assign("NOTEUSER",$rowuser['Note']);
		//$xtpl->assign("STRESSOLD",$_SESSION['addresold']);
		$xtpl->assign("READONLY_IP",'readonly');
		
	}
	

	if(!isset($_SESSION['price_distance'])){
		header("location:index.php");
	}


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

	$xtpl->assign('BUTTONSTRESS',$order['buttonstress']);
	//cart
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$xtpl->assign("TOTAL",$_SESSION['total']);
	$xtpl->parse("main");
	$xtpl->out("main");
 