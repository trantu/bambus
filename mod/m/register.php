<?php  
if(!defined('SECURITY')) exit('404 - Not Access'); 	
	$xtpl=new XTemplate(TEMPLATE.'m/register.tpl');
	require_once("mod/./all.php");
	require_once("mod/./j_all.php");
	$all=new All;
	$rule=new Rule;
	$j_all=new j_all;

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

 		/* REGISTER */
	$xtpl->assign("RTITLE",$main['register']['title']);
	$xtpl->assign("RPTITLE",$main['register']['ptitle']);
	$xtpl->assign("RSUCCESSS",$main['register']['success']);
	$xtpl->assign("RLOGIN",$main['register']['login']);
	$xtpl->assign("RPMAIL",$main['register']['pmail']);
	$xtpl->assign("RPPASSWORD",$main['register']['ppassword']);
	$xtpl->assign("RPREPASSWORD",$main['register']['prepasseword']);
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
	$xtpl->assign("RBUTTON",$main['register']['button']);
	$xtpl->assign("REEMAIL",$main['register']['erroremail']);
	$xtpl->assign("RERPASS",$main['register']['errorrepass']);
	$xtpl->assign("RERRESGISTER",$main['register']['errorregister']);

	$xtpl->assign('IFEMAIL',$history['info']['mail']);
	$xtpl->assign("RPASSWORD",$main['register']['password']);
	$xtpl->assign("RREPASSWORD",$main['register']['repasseword']);
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




	$xtpl->parse("main");
	$xtpl->out("main");
 