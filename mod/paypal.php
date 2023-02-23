<?php if(!defined('SECURITY')) exit('404 - Not Access');
require("./lib/mail/class.phpmailer.php");
include("j_all.php");
$j_all=new j_all;
//lay cac thong tin can thiet de gui mail
if(isset($_POST['type_payment_order'])){
	$ip_user=$_SERVER['REMOTE_ADDR'];

    if($ip_user = '::1')
        $ip_user = '127.0.0.1';

    if(!isset($_POST['address'])){ //dang nhap
		$_SESSION['infopaypal']=array(
			   'firstname' => $_POST['firstname'],
			   'lastname' => $_POST['lastname'],
			   'postalcode' => $_POST['postalcode'],
			   'office' => $_POST['office'],
			   'numberhouse' => $_POST['numberhouse'],
			   'noteposition' => $_POST['noteposition'],
			   'stress' => $_POST['stress'],
			   'region' => $_POST['region'],
			   'company' => $_POST['company'],
			   'phone' => $_POST['phone'],
			   'note' => $_POST['note'],
			   'type_payment'=>$_POST['type_payment_order'],
			   'sex'=>$_POST['sex'],
			   'login'=>1
		);
	}else{ //khong dang nhap
		$address_all=$_POST['address'];
		$arr_address=get_arr_address($address_all);
		$_SESSION['infopaypal']=array(
			   'firstname' => $_POST['firstname'],
		   	   'lastname' => $_POST['lastname'],
			   'office' => $_POST['office'],
			   'noteposition' => $_POST['noteposition'],
			   'company' => $_POST['company'],
			   'phone' => $_POST['phone'],
			   'note' => $_POST['note'],
			   'address'=>$_POST['address'],
		   	   'type_payment'=>$_POST['type_payment_order'],
		   	   'postalcode' => $arr_address[0],
			   'region' => $arr_address[3],
			   'numberhouse' => $arr_address[2],
			   'stress' => $arr_address[1],
		   	   'sex'=>$_POST['sex']
		);
	}

    //if($_POST['type_payment_order'] == 1 || $_POST['type_payment_order'] == 4)
    $_SESSION['alert_paid'] = 1;

    if (!isset($_POST['email']))
        $_POST['email'] = '';

	$_SESSION['infopaypal']['ip_user']=$ip_user;
	$_SESSION['infopaypal']['email_cus']=$_POST['email'];
	$_SESSION['infopaypal']['distance_deliver']=$_SESSION['distance_deliver'];
	$_SESSION['email_cus']=$_POST['email'];

	$totalcart=$_SESSION['total'];
	$_SESSION['total_PP']=$_SESSION['total'];//lay tong tien
	$_SESSION['arrSPPP']=$_SESSION['arrSP'];//lay thong tin san pham


	//from here warning mail to admin
	$TO_EMAIL="bamboosticks.shop@topbowls.de";
	$date=date("Y_m_d H_i_s");
	$subject=str_replace("{time}", $date, $config['titleadmin']);
	$mess=str_replace("{Email}",$TO_EMAIL ,$config['bodyadmin']);

	$info=$_SESSION['infopaypal'];
	$info['date_order']=$date;
	$ar=$_SESSION['arrSPPP'];

	$post=array("arrSP"=>$ar,"TOTAL"=>$_SESSION['total_PP']);
	$post2=array("address"=>$info);
	$field_string = http_build_query($post);
	$field_string2 = http_build_query($post2);

	$url_order="http://".site_url."?mod=mail_order_customer";
	$url_address="http://".site_url."?mod=mail_address_customer";
	$file_contents =$j_all->curl_url($url_order,$field_string);
	$file_contents2 = $j_all->curl_url($url_address,$field_string2);


	if (isset($info['login'])) {
		$info['email_login']=$info['email_cus'];
	}else{
		$info['email_login']='';
	}

      $info['first_number']='';

	$info['email']=$info['email_cus'];
	$info['distance_deliver']=$info['distance_deliver'];
	//loai thanh toan
	$ar_zahlung=array(1=>$de_checkout['cash'],2=>$de_checkout['paypal'],'3'=>$de_checkout['credit'],'4'=>$de_checkout['mobile']);
	$info['type_payment']=$ar_zahlung[$info['type_payment']];
	//gioi tinh
	$ar_anrede=array(0=>$de_register['female'],1=>$de_register['male']);
	$info['sex']=$ar_anrede[$info['sex']];
	$order_info= array();
	$order_info[] ="\xEF\xBB\xBF";
	$order_info[] = "Zeitpunkt der Bestellung : " . $info['date_order'] . "\n";
	$order_info[] = "ZAHLUNG : " . $info['type_payment'] . "\n";
	if(  strcmp($info['type_payment'],"Bargeld") !== 0 ){
		$order_info[] = " ACHTUNG: SCHON ONLINE BEZAHLT!\n";
	}
	if(  strcmp($info['type_payment'],"Bargeld") == 0 ){
		$order_info[] = " ACHTUNG: NOCH NICHT BEZAHLT!\n";
	}

		$order_info[] = "Firma : " . $info['company'] . "\n";
	//$order_info[] = "Abteilung : " . $info['office'] . "\n";
	//$order_info[] = "Anrede : " . $info['sex'] . "\n";
	$order_info[] = "VORNAHME : " . $info['firstname'] . "\n";
	$order_info[] = "NACHNAME : " . $info['lastname'] . "\n";
	$order_info[] = "ADRESSE : " . $info['stress'] . " " . $info['numberhouse'] . "\n";
	$order_info[] = "ORT : " . $info['postalcode'] . " " . $info['region'] . "\n";
	//$order_info[] = "Vorwahl : " . $info['first_number'] . "\n";
      $trimed_phone = preg_replace('/\D/', '', $info['phone']);
  $order_info[] = "TELEPHONE : " . $trimed_phone . "\n";
  //$order_info[] = "Email : " . $info['email'] . "\n";
	$info['note']=preg_replace('/\n++/', '. ', $info['note']);
	$info['note']=preg_replace('/\r++/', '. ', $info['note']);


      $info['noteposition']=preg_replace('/\n++/', '. ', $info['noteposition']);
      $info['noteposition']=preg_replace('/\r++/', '. ', $info['noteposition']);

	$order_info[] = "Hinterhof/Etage : " . $info['noteposition'] . "\n";

	//$order_info[] = "Entfernung : " . $info['distance_deliver'] . "\n";


	$order_info[] = "\n";

	foreach($ar as $food)
	{
          $price_food=(isset($food['price_notbei']))? $food['price_notbei']:$food['price'];
					$beilage_food=(isset($food['stt_bei']))? $food['stt_bei']:'';
					$beilage_food=str_replace("█",'#', $beilage_food);

          $food['note']=preg_replace('/\n++/', '. ', $food['note']);
          $food['note']=preg_replace('/\r++/', '. ', $food['note']);

          //$order_info[] = "¶¶¶*¶¶¶" . $food['plu'] . "¶¶¶*¶¶¶" . $food['qty'] . "¶¶¶*¶¶¶" . $price_food. "¶¶¶*¶¶¶" .$beilage_food."¶¶¶*¶¶¶".$food['note']. "\n";
					$order_info[] = $food['qty']." x " . $food['plu'] . " ".$food['name']." (". $price_food. "/Stk".") " .$beilage_food." : ".$food['note']. "\n\n";
	}
      $order_info[] = " SUMME = ".$_SESSION['total_PP']." Euro \n\n";

    $order_info[] = "NOTIZEN : " . $info['note'] . "\n";

	$time_order=time();
	preg_match('/......\b/', $time_order,$result);

	$code_transaction=$result[0];

	$mess=implode($order_info);

	$attach=false;

	$reusult=$j_all->sendmail($TO_EMAIL,$subject,$mess,$attach,true);
	// end warning ##################

    // Paypal
	if($_POST['type_payment_order']==2 || $_POST['type_payment_order']==3){
		require_once("./config/config.paypal.php");
		require_once("./lib/Paypal.php");
		$paypals=new Paypal($paypal);
		$paypals->add("Total",$totalcart);
		$paypals->pay();//chuyen den paypal
	}
    // Sofort
    elseif($_POST['type_payment_order']==5){
        require_once("./lib/Sofort.php");
        $sofort = new Sofort();
        $sofort->pay($totalcart);
    }
    else{

		header('location:index.php?mod=paypal_sendmail');
		#Neu khong phai la paypal thi gui tien sau
	}

}


function get_arr_address($address){
	$ar_address=explode(',',trim($address));
	$postalcode='';$stress='';$numberhouse='';$region='';
	$ar_1=explode(' ', trim($ar_address[0]));
	$stress=$ar_1[0];
	if(count($ar_1) >1){
		$numberhouse=end($ar_1);
		for($i=1;$i<count($ar_1)-1;$i++){
			$stress.=' '.$ar_1[$i];
		}
	}
	if(count($ar_address)>=2){
		$ar_2=explode(' ', trim($ar_address[1]));
		$postalcode=$ar_2[0];
		if(count($ar_2) >1){
			for($i=1;$i<=count($ar_2)-1;$i++){
				$region.=' '.$ar_2[$i];
			}
		}
	}

	return array($postalcode,$stress,$numberhouse,$region);
}



 ?>
