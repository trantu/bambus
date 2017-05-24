<?php
/**
 * Created by PhpStorm.
 * User: kiemduongvan
 * Date: 1/31/16
 * Time: 12:12 PM
 */
if(!defined('SECURITY')) exit('404 - Not Access');

require_once("settings.rule.php");

$settings=new  settings;
$data=$settings->getSettings();

foreach ($data as $da){
    switch ($da['Name']) {
        case "sofort_key":
            $GLOBALS['sofort_key'] 			=$da['Value'];
            break;
        default:
            break;
    }

}

    $http="http://";
    $GLOBALS['sofort_return'] 		= $http.site_url.'?mod=paypal_sendmail';
    $GLOBALS['sofort_cancel'] 		= $http.site_url.'?mod=checkout';
    $GLOBALS['sofort_notify'] 		= $http.site_url.'?mod=paypal_process';
    $GLOBALS['sofort_currency']     = 'EUR';
    $GLOBALS['sofort_reason'] 		= 'Verwendungszweck';
    //$GLOBALS['sofort_key'] 		    = '126002:268158:1e3f9b467128e2a2e8665c0ec2310355';

?>