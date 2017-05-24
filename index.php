<?php  session_start();
ob_start();
date_default_timezone_set('Europe/Berlin');
error_reporting(E_ALL);

defined('SYSDIR') or define('SYSDIR', dirname(__FILE__));
defined('TEMPLATE') or define('TEMPLATE', SYSDIR.'/template/');
defined('DATABASE') or define('DATABASE', SYSDIR.'/db/');
defined('SECURITY') or define('SECURITY', TRUE);
defined('site_url') or define("site_url",$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);


include_once SYSDIR.'/config/lang.de.php';
include_once SYSDIR.'/config/config.php';
include_once SYSDIR.'/config/config.rule.php';
include_once SYSDIR.'/config/config.template.php';
include_once SYSDIR.'/config/config.paypal.php';
// nap cac class
include_once SYSDIR.'/lib/db.php';
include_once SYSDIR.'/lib/dishis.php';
include_once SYSDIR.'/lib/rule.php';
include_once SYSDIR.'/lib/xtemplate.class.php';

if ((!isset($_GET['mod']))||$_GET['mod']=='home') {
	if($config['show_menu_huk']==1){
		include SYSDIR.'/mod/home.php';
	}else{
		//include SYSDIR.'/mod/main.php'; 
		header('location:index.php?mod=main');
	}
} else {
	include SYSDIR.'/mod/'.$_GET['mod'].'.php';
}

