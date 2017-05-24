<?php
require_once('./lib/sofort/payment/sofortLibSofortueberweisung.inc.php');
/**
 * Created by PhpStorm.
 * User: kiemduongvan
 * Date: 1/31/16
 * Time: 11:51 AM
 */

class Sofort {

    /**
     * Constructor
     *
     * @param	string
     * @return	void
     */
    public function __construct()
    {
        //log_message('debug', "Paypal Class Initialized");
    }
    // --------------------------------------------------------------------

    /**
     * initialize Paypal preferences
     *
     * @access	public
     * @param	array
     * @return	bool
     */
    function pay($total)
    {
    // enter your configuration key – you only can create a new configuration key by creating
    // a new Gateway project in your account at sofort.com
        //$configkey = '126002:268158:1e3f9b467128e2a2e8665c0ec2310355';
        $configkey = $GLOBALS['sofort_key'];
        $Sofortueberweisung = new Sofortueberweisung($configkey);

        $Sofortueberweisung->setAmount($total);
        $Sofortueberweisung->setCurrencyCode($GLOBALS['sofort_currency']);

        $Sofortueberweisung->setReason($GLOBALS['sofort_reason']);
        $Sofortueberweisung->setSuccessUrl($GLOBALS['sofort_return'], true);
        $Sofortueberweisung->setAbortUrl($GLOBALS['sofort_cancel']);
        //$Sofortueberweisung->setNotificationUrl($GLOBALS['notify_url']);

    // $Sofortueberweisung->setSenderSepaAccount('SFRTDE20XXX', 'DE06000000000023456789', 'Max Mustermann');
    // $Sofortueberweisung->setSenderCountryCode('DE');
    // $Sofortueberweisung->setNotificationUrl('http://www.google.de', 'loss,pending');
    // $Sofortueberweisung->setNotificationUrl('http://www.yahoo.com', 'loss');
    // $Sofortueberweisung->setNotificationUrl('http://www.bing.com', 'pending');
    // $Sofortueberweisung->setNotificationUrl('http://www.sofort.com', 'received');
    // $Sofortueberweisung->setNotificationUrl('http://www.youtube.com', 'refunded');
    // $Sofortueberweisung->setNotificationUrl('http://www.youtube.com', 'untraceable');
    //$Sofortueberweisung->setCustomerprotection(true);


        $Sofortueberweisung->sendRequest();

        if($Sofortueberweisung->isError()) {
            //SOFORT-API didn't accept the data
            echo $Sofortueberweisung->getError();
        } else {
            //buyer must be redirected to $paymentUrl else payment cannot be successfully completed!
            $paymentUrl = $Sofortueberweisung->getPaymentUrl();
            header('Location: '.$paymentUrl);
        }

    }

}