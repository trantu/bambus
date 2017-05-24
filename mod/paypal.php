<?php if(!defined('SECURITY')) exit('404 - Not Access');

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