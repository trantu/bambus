<?php 

if(!defined('SECURITY')) exit('404 - Not Access');
require_once('AES.php');
require_once(dirname(dirname(__FILE__)).'/all.php');
$api=new All;
require_once(dirname(dirname(__FILE__)).'/j_all.php');

if(isset($_POST['token'])) // Nếu có token 
{
	$token=$_POST['token'];
	if($token=='' || $token==null)
	{
		$arr=array("result"=>0);
		echo json_encode($arr);return;
	}
}
else{
	$arr=array("result"=>0);
	echo json_encode($arr);return;
}
// $token="OIpZLT/OzTz6KX8EK4ja+3I/skXFMxQL09vxd03LSKzYJZCBxOE6+Ru3uVDp22Y+tN1jLh4b1vYg
//     wIu8wSHx9pWrJmZqTudz1KZEY7ws3mji+xFe6r0jMgelFDDLVVYx1e5GhWeTBOMUtmCnoVDLOmIM
//     izds0fxqMnpmWUTzk1nFeITDDw+vQmexMKp72Lm27uxEb5WClN0Ue1j0AC78YCsgMqARMuecgF2v
//     XpOwAjDs5BQsCTY6WwQmPBDlTOSfnrD9TV5KyxVJ/w+wpAfbRIdWE8VPmH8k4RToP+RQEXDVI7CV
//     L3/2H1KZqbaPd60M";

$aes = new AES($token);
$data=$aes->decrypt();
$data_s=explode(APIARRAY,$data); // Cắt chuỗi thành mảng
// echo "<pre>";
// //var_dump($data_s);
// print_r($data_s);
// echo "</pre>";
$keyt = array_search('controller',$data_s); // tìm vị trí controller trong mảng
if($keyt===false){
	$arr=array("result"=>0);
	echo json_encode($arr);return;
}

$link=API_LINK_IMG;//API_LINK_IMG;

$controller=$data_s[$keyt+APIKEYARRAY];
switch ($controller) {
	case 'get_category'://lay cac nhom mon an		
		$arr=array("result"=>1,"data"=>$api->getNameGruppe(),"link"=>$link);
		echo json_encode($arr);
		break;
	case 'get_product'://lay cac mon an trong nhom mon an
		$key_pr = array_search('id_category',$data_s);
		if($key_pr===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}

		$NameGruppe=$data_s[$key_pr+APIKEYARRAY];
		settype($NameGruppe, 'int');
		if(!$NameGruppe) $NameGruppe=1;
		$arr=array("result"=>1,"data"=>$api->api_getDishes($NameGruppe),"link"=>$link);
		echo json_encode($arr);
		break;
	case 'get_store_info'://lay thong tin cua hang
		$data=array();
		$data['name']=$config['namestore'];
		$data['address']=$config['address'];
		$data['latitude']=$config['latitude'];
		$data['longitude']=$config['longitude'];
		$data['logo_store']=$config['logo_store'];
		$data['paypal']=$paypal['business'];
		$arr=array("result"=>1,"info"=>$data,"time"=>$config['time'],"price"=>$config["price"]);
		echo json_encode($arr);
		break;
	case 'order_product'://luu don hang trong db
		$data=array();
		$key_time = array_search('time',$data_s);
		if($key_time===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}
	
		$key_product = array_search('product',$data_s);
		if($key_product===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}

		$key_totalAmount = array_search('totalAmount',$data_s);
		if($key_totalAmount===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}

		$key_totalMoney = array_search('totalMoney',$data_s);
		if($key_totalMoney===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}

		$key_type = array_search('type',$data_s);
		if($key_type===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}

		$key_address = array_search('address',$data_s);
		if($key_address===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}
	
		$idusers = array_search('iduser',$data_s);
		if($idusers===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}
		
		$iduser=$data_s[$idusers+APIKEYARRAY];
		$time=$data_s[$key_time+APIKEYARRAY];

		$product=$data_s[$key_product+APIKEYARRAY];
		$totalAmount=$data_s[$key_totalAmount+APIKEYARRAY];
		$totalMoney=$data_s[$key_totalMoney+APIKEYARRAY];
		$type=$data_s[$key_type+APIKEYARRAY];
		$address=$data_s[$key_address+APIKEYARRAY];
		$Day=date("Y-m-d H:i:s A");
		if($type=='paypal'){
			$key_id_paypal_transaction= array_search('id_paypal_transaction',$data_s);
			if($key_id_paypal_transaction===false){
				$arr=array("result"=>0);
				echo json_encode($arr);return;
			}

			$id_paypal_transaction=$data_s[$key_id_paypal_transaction+APIKEYARRAY];
		}

		else $id_paypal_transaction='';

		
		$db=new j_all;
		$sql_his=$db->history_odrer_mobile($iduser,$product,$totalAmount,$totalMoney,$Day,$address,$type,$id_paypal_transaction,$time);
		if(!$sql_his){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}
		else{
			$id_insert=mysql_insert_id();
			$arr=array("result"=>1,'id_transaction'=>$id_insert);
			echo json_encode($arr);return;
		}
		
		break;
	case 'send_mail_paypal'://lay cac mon an  va dia chi de gui mail

		$send_em=new j_all;
		$key_email = array_search('email',$data_s);
		if($key_email===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}
		$email=$data_s[$key_email+APIKEYARRAY];

		$key_packet = array_search('packet',$data_s);
		if($key_packet===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}
		
		$packet=json_decode($data_s[$key_packet+APIKEYARRAY]);
		$packet_product=$packet->products;
	
		$key_address = array_search('address',$data_s);
		if($key_address===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}

		$address=$data_s[$key_address+APIKEYARRAY];
	
		require(dirname(dirname(dirname(__FILE__)))."/lib/mail/class.phpmailer.php");
		$TO_EMAILC=$email;;
		$subject1=$config['titlecustomer'];
		$mess1=$config['bodycustomer'];

		/*
		*
		* Send mail for admin
		*/
		$TO_EMAIL=$config['email_admin'];;
		$date=date("Y-m-d H:i:s");
		$subject=str_replace("{time}", $date, $config['titleadmin']);
		$mess=str_replace("{Email}",$TO_EMAILC ,$config['bodyadmin']);
				
		$info=json_decode($address);
		$ar=$packet_product;
		
		$post=array("arrSP"=>$ar);
		$post2=array("address"=>$info);
		$field_string = http_build_query($post);
		$field_string2 = http_build_query($post2);


		/*
		* -Curl design website
		*/
		$url_order="http://".site_url."?mod=api_mail_order";
		$file_contents=$send_em->curl_url($url_order,$field_string);
		$url_mail="http://".site_url."?mod=api_mail_address";
		$file_contents2=$send_em->curl_url($url_mail,$field_string2);

		

		$mess=str_replace("{address}", $file_contents2, $mess);
		$mess=str_replace("{order}", $file_contents, $mess);
		$mess1=str_replace("{address}", $file_contents2, $mess1);
		$mess1=str_replace("{order}", $file_contents, $mess1);
		$check=1;
		$reusult=$send_em->sendmail($TO_EMAIL,$subject,$mess);
		if($reusult==0){
			$arr=array("result"=>0);
			echo json_encode($arr);return;
		}

		$send_em->sendmail($TO_EMAILC,$subject1,$mess1);

		$arr=array("result"=>1);
		echo json_encode($arr);return;
		break;
	case 'register_user'://dang ky thanh vien
		$db=new j_all;
		$users = array_search('user',$data_s);
		if($users===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}

		$user=json_decode($data_s[$users+APIKEYARRAY]);
		$res=$db->register_api($user->email,$user->password,$user->firstname,$user->lastname,$user->sex,$user->postalcode,$user->office,$user->numberhouse,$user->noteposition,$user->stress,$user->region,$user->company,$user->phone,$user->note);
		$arr=array("result"=>$res);
		echo json_encode($arr);
		break;
	case 'login_user'://dang nhap thanh vien
		$db=new j_all;
		$users = array_search('user',$data_s); // Tim vi tri user trong mang
		if($users===false)
		{
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		
		$user=json_decode($data_s[$users+APIKEYARRAY]); // lấy vị trí + Key
		//var_dump($user);
		$res=$db->checkLogin_app($user->email,$user->password); // Login
		if(!$res){
			$arr=array("result"=>0);
		}else{
			$arr=array("result"=>1,"info"=>$res);
		}
		echo json_encode($arr);
		break;

	case 'history_user'://lich su don hang theo iduser
		$db=new j_all;
		$users = array_search('iduser',$data_s);
		if($users===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		
		$iduser=$data_s[$users+APIKEYARRAY];
		$his=$db->history_orderid($iduser);
		if($his==0){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}

		$history=array("result"=>1,"history_user"=>$his);
		echo json_encode($history);return;
		break;

	case 'get_plz':
		$po=new j_all;
		$plzs = array_search('plz',$data_s);
		if($plzs===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		
		$plz=$data_s[$plzs+APIKEYARRAY];
		$db=$config['straßenort_de_ort'];
		$arr=array("result"=>1,"data"=>$po->getPzl($db,$plz));
		echo json_encode($arr);
		break;

	case 'get_region':
		$po=new j_all;
		$plzs = array_search('plz',$data_s);
		if($plzs===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		
		$postal=$data_s[$plzs+APIKEYARRAY];
		$db=$config['straßenort_de_ort'];
		$arr=array("result"=>1,"data"=>$po->getRegionPzl($db,$postal));
		echo json_encode($arr);
		break;
	case 'get_stress':
		$po=new j_all;
		$plzs = array_search('plz',$data_s);
		if($plzs===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		
		$postal=$data_s[$plzs+APIKEYARRAY];

		$stresss = array_search('stress',$data_s);
		if($stresss===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		
		$stress=$data_s[$stresss+APIKEYARRAY];
		$db=$config['straßenort_de_strasse'];
		$arr=array("result"=>1,"data"=>$po->getStress($db,$stress,$postal));
		echo json_encode($arr);

		break;


	case 'forget_pass':
		$sm=new j_all;
		$emails = array_search('email',$data_s);
		if($emails===false){
			$arr=array("result"=>10);
			echo json_encode($arr);return;break;
		}
		
		$email=$data_s[$emails+APIKEYARRAY];
		require(dirname(dirname(dirname(__FILE__)))."/lib/mail/class.phpmailer.php");
		$check=$sm->checkEmail($email);
		if($check==0)
		{ 
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		else
		{
			$pass=$sm->randompass($email);
			$bod=str_replace('{pass}',$pass,$config['forgetmail']['body']);
			$body =$bod;
			$subject=$config['forgetmail']['subject'];
			$result=$sm->sendmail($email, $subject, $body);
			$arr=array("result"=>$result);
			echo json_encode($arr);return;break;
		}

		break;

	case 'change_pass'://thay mat khau
		$change=new j_all;
		$emails = array_search('email',$data_s);
		if($emails===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		
		$email=$data_s[$emails+APIKEYARRAY];

		$passolds = array_search('passold',$data_s);
		if($passolds===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}

		$passold=$data_s[$passolds+APIKEYARRAY];
		$passnews = array_search('passnew',$data_s);
		if($passnews===false){
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}

		$passnew=$data_s[$passnews+APIKEYARRAY];
		$check=$change->changepass($email,$passold,$passnew);
		if($check!=2){ 
			$arr=array("result"=>0);
			echo json_encode($arr);return;break;
		}
		else{
			$arr=array("result"=>1);
			echo json_encode($arr);return;break;
		}

		break;

	default:
		$arr=array("result"=>0);
		echo json_encode($arr);return;
		break;
}


