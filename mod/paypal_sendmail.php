<?php
if(!defined('SECURITY')) exit('404 - Not Access');
//gui mail khi tinh tinh thành cong
require("./lib/mail/class.phpmailer.php");
include("j_all.php");
$j_all=new j_all;
$infopaypal='';

	if(isset($_SESSION['infopaypal'])){
		$_SESSION['infopaypals']=$_SESSION['infopaypal'];

	    /**
		*-khi paypal thanh cong chuyen sang
		*Send mail for customer
		*/

		$TO_EMAILC=$_SESSION['email_cus'];//$_SESSION['Email'];
		$subject1=$config['titlecustomer'];
		$mess1=$config['bodycustomer'];

	  	/**
		*
		* Send mail for admin
		*/

		$TO_EMAIL=$config['email_admin'];
		$date=date("Y_m_d H_i_s");
		$subject=str_replace("{time}", $date, $config['titleadmin']);
		$mess=str_replace("{Email}",$TO_EMAILC ,$config['bodyadmin']);

	  	/**
		*Curl get info address and order
		*
		*/

		$info=$_SESSION['infopaypal'];
		$info['date_order']=$date;
		$ar=$_SESSION['arrSPPP'];

		$post=array("arrSP"=>$ar,"TOTAL"=>$_SESSION['total_PP']);
		$post2=array("address"=>$info);
		$field_string = http_build_query($post);
		$field_string2 = http_build_query($post2);


		//lấy html data để gửi mail
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
        /*
		if (isset($info['phone'])) {
			$info['first_number']=substr(trim($info['phone']),0,3);
		}else{
			$info['first_number']='';
		}
        */


		$info['email']=$info['email_cus'];
		$info['distance_deliver']=$info['distance_deliver'];
		//loai thanh toan
		$ar_zahlung=array(1=>$de_checkout['cash'],2=>$de_checkout['paypal'],'3'=>$de_checkout['credit'],'4'=>$de_checkout['mobile']);
		$info['type_payment']=$ar_zahlung[$info['type_payment']];
		//gioi tinh
		$ar_anrede=array(0=>$de_register['female'],1=>$de_register['male']);
		$info['sex']=$ar_anrede[$info['sex']];


		$order_info= array();
		//$cur_date = strftime("%d.%m.%y %H:%M:%S");
		$order_info[] ="\xEF\xBB\xBF";
		$order_info[] = "HQ-Online Version 2\n";
		$order_info[] = "IP : " . $info['ip_user'] . "\n";
		$order_info[] = "Date : " . $info['date_order'] . "\n";
		$order_info[] = "Zahlung : " . $info['type_payment'] . "\n";
		$order_info[] = "Benutzername : " . $info['email_login'] . "\n";

		$order_info[] = "Firma : " . $info['company'] . "\n";
		$order_info[] = "Abteilung : " . $info['office'] . "\n";
		$order_info[] = "Anrede : " . $info['sex'] . "\n";
		$order_info[] = "Vorname : " . $info['lastname'] . "\n";
		$order_info[] = "Nachname : " . $info['firstname'] . "\n";
		$order_info[] = "Strasse : " . $info['stress'] . "\n";
		$order_info[] = "PLZ : " . $info['postalcode'] . "\n";
		$order_info[] = "Ort : " . $info['region'] . "\n";

		$order_info[] = "Hausnummer : " . $info['numberhouse'] . "\n";
		$order_info[] = "Vorwahl : " . $info['first_number'] . "\n";

        $trimed_phone = preg_replace('/\D/', '', $info['phone']);
        $order_info[] = "Telefon : " . $trimed_phone . "\n";

        $order_info[] = "Email : " . $info['email'] . "\n";

        $info['noteposition']=preg_replace('/\n++/', '. ', $info['noteposition']);
        $info['noteposition']=preg_replace('/\r++/', '. ', $info['noteposition']);

		$order_info[] = "Hinterhof/Etage : " . $info['noteposition'] . "\n";

        $info['note']=preg_replace('/\n++/', '. ', $info['note']);
        $info['note']=preg_replace('/\r++/', '. ', $info['note']);

		$order_info[] = "Besonderheiten/Lieferzeitpunkt : " . $info['note'] . "\n";
		$order_info[] = "Entfernung : " . $info['distance_deliver'] . "\n";


		$order_info[] = "#########################################################################\n";

		foreach($ar as $food)
		{
            $price_food=(isset($food['price_notbei']))? $food['price_notbei']:$food['price'];
						$beilage_food=(isset($food['stt_bei']))? $food['stt_bei']:'';
						$beilage_food=str_replace("█",'#', $beilage_food);

            $food['note']=preg_replace('/\n++/', '. ', $food['note']);
            $food['note']=preg_replace('/\r++/', '. ', $food['note']);

            //$order_info[] = "¶¶¶*¶¶¶" . $food['plu'] . "¶¶¶*¶¶¶" . $food['qty'] . "¶¶¶*¶¶¶" . $price_food. "¶¶¶*¶¶¶" .$beilage_food."¶¶¶*¶¶¶".$food['note']. "\n";
						$order_info[] = $food['qty']." x " . $food['plu'] . " ".$food['name']." (". $price_food. "/Stk".") " .$beilage_food." : ".$food['note']. "\n";
		}
        $order_info[] = "Summe = ".$_SESSION['total_PP']." -----\n";

		//$url_order_admin="http://".site_url."?mod=mail_order";
		//$url_address_admin="http://".site_url."?mod=mail_address";
		//$file_contents_admin =$j_all->curl_url($url_order_admin,$field_string);
		//$file_contents2_admin =$j_all->curl_url($url_address_admin,$field_string2);


	  	/**
		* End mutip curl
		*
		*/

		$time_order=time();
		preg_match('/......\b/', $time_order,$result);

		$code_transaction=$result[0];

		$mess=implode($order_info);

		$attach=false;
		if($config['server_sendmail']==3 || $config['server_sendmail']==4){
			$attach="upload/mail/".$code_transaction.".txt";
			$myfile = fopen("upload/mail/".$code_transaction.".txt", "w") or die("Unable to open file!");
			fwrite($myfile, $mess);
			fclose($myfile);
		}

		//$mess=str_replace("{address}", $file_contents2_admin, $mess);
		//$mess=str_replace("{order}", $file_contents_admin, $mess);


		$mess1=str_replace("{transaction_code}", $code_transaction, $mess1);
		$mess1=str_replace("{address}", $file_contents2, $mess1);
		$mess1=str_replace("{order}", $file_contents, $mess1);
		$check=1;

		$reusult=$j_all->sendmail($TO_EMAIL,$subject,$mess,$attach,true);
		if($reusult==0){
			echo $mp['errorsendmail'];
			foreach ($config as $key => $val) {
				 echo $key;
				 echo ":";
				 echo $val;
				 echo '<br>';
			}
			return false;
		}

		if($config['send_mail_customer']==1){
			$j_all->sendmail($TO_EMAILC,$subject1,$mess1,false);
		}
		unset($_SESSION['infopaypal']);
	}

	header("location:index.php?mod=paypal_success");

 ?>
