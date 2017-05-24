<?php  
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'m/info_user.tpl');
	require_once("mod/./j_all.php");
	$rule=new Rule;
	$j_all=new j_all;

/* 
  -update user 
  -lấy dữ liệu từ form
*/


	if(isset($_POST['email'])){
		$checkup=$j_all->updateuser();
		if($checkup==1){
			$xtpl->assign('IFUPDATESUCCESS',$history['info']['updatesuccess']);
			$xtpl->parse("main.success");
		}

		else{
			$xtpl->assign('IFUPDATERROR',$history['info']['updateerror']);	
			$xtpl->parse("main.error");
		}
	}



/*** ADDRESS**/
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

/* langugue form  name and placeholder */
	$xtpl->assign("RTITLE",$home['info']['title']);
	$xtpl->assign("RPTITLE",$home['info']['content']);
	$xtpl->assign("RSUCCESSS",$home['info']['psuccess']);
	$xtpl->assign("RLOGIN",$main['register']['login']);
	$xtpl->assign("RPMAIL",$main['register']['pmail']);
	$xtpl->assign("RPFIRSTNAME",$main['register']['pfirstname']);
	$xtpl->assign("RPLASTNAME",$main['register']['plastname']);
	$xtpl->assign("RPMALE",$main['register']['pmale']);
	$xtpl->assign("RPFEMALE",$main['register']['pfemale']);
	$xtpl->assign("RPPOSTAL",$main['register']['ppostal']);
	$xtpl->assign("RPOFFICE",$main['register']['poffice']);
	$xtpl->assign("RPNUMBERHOUSE",$main['register']['pnumberhouse']);
	$xtpl->assign("RPNOTEPOSITION",$main['register']['pnoteposition']);
	$xtpl->assign("RPSTRESS",$main['register']['pstress']);
	$xtpl->assign("RPREGION",$main['register']['pregion']);
	$xtpl->assign("RPCOMPANY",$main['register']['pcompany']);
	$xtpl->assign("RPPHONE",$main['register']['pphone']);
	$xtpl->assign("RPNOTE",$main['register']['pnote']);
	$xtpl->assign("RBUTTON",$home['info']['buttoninfo']);
	$xtpl->assign("REEMAIL",$main['register']['erroremail']);
	$xtpl->assign("RERPASS",$main['register']['errorrepass']);
	$xtpl->assign("RERRESGISTER",$main['register']['errorregister']);

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


/* infomation user in form*/
	
	$rowuser=$j_all->infoUser($_SESSION['Email']);
	$xtpl->assign("SELECTED","checked");
	//check radio sex
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
	$xtpl->assign('INFOUSERGOTOORDER',$home['info']['gotoorder']);


/* Parse dữ liệu */
	$xtpl->parse("main");
	$xtpl->out("main");
 