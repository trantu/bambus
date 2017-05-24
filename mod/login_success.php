<?php 
if(!defined('SECURITY')) exit('404 - Not Access'); 
	
	$xtpl=new XTemplate(TEMPLATE.'login.xtpl');
	if(isset($_SESSION['Email'])==true){
			$xtpl->assign('EMAIL',$_SESSION['Email']);
			$xtpl->assign('CBTORDER',$main['cart']['btorder']);
			$xtpl->assign('SACCOUT',$main['sigin']['myaccount']);
			$xtpl->assign('SLOGUOT',$main['sigin']['logout']);
			$xtpl->parse("loginsession");
			$xtpl->out("loginsession");
	}