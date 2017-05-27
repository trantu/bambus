<?php
#tat ca moi thu lien quan den mysql nam trong day

if(!defined('SECURITY')) exit('404 - Not Access');
Class j_all extends  db{

	//lay OR_PLZ va OR_NAME
	function getRegion($key='0',$db){
		//strassenort_de_ort
		$sql="SELECT * from $db  where OR_PLZ Like '$key%' order by OR_PLZ DESC LIMIT 0,10 ";
		$result=mysql_query($sql) or die(mysql_error());
		$ar='';
		while($row=mysql_fetch_assoc($result)){
			$ar.=$row['OR_PLZ']." ".$row['OR_ONAME']."@";
		}
		return $ar;
	}

	//lay ST_NAME
	function getPoint($post,$stress,$db){
		$sql="SELECT ST_NAME from `$db` where ST_PLZ='$post' and ST_NAME like '$stress%' order by ST_NAME DESC LIMIT 0,10";
		$result=mysql_query($sql) or die(mysql_error());
		$ar='';
		while($row=mysql_fetch_assoc($result)){
			$ar.=$row['ST_NAME']."@";
		}
		return $ar;
	}

	//kiem tra login
	function checkLogin(){
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$sql="SELECT idUser,Email,Password,Stress from db_users where Email='$email' and Password='$password'";
		$result=mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result)>0 ){
			$row=mysql_fetch_assoc($result);
			$_SESSION['idUser']=$row['idUser'];
			$_SESSION['Email']=$row['Email'];
			$_SESSION['addressUser']=$row['Stress'];
			return 1;
		}
		else { return 0;}

	}

	// info user
	function infoUser($email){
		$sql="SELECT * from db_users where Email='$email' ";
		$result=mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result)>0){
			$row=mysql_fetch_assoc($result);
			return $row;
		}

		else { return 0;}
	}


	//kiem tra login API cua app
	function checkLogin_app($emails,$passwords){
		$email=$emails;
		$password=$passwords;//
		$sql="SELECT idUser,Email,Password from db_users where Email='$email' and Password='$password'";
		$result=mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result)>0 ){
			$row=mysql_fetch_assoc($result);
			$info=$this->infoUser($email);
			if(!$info){
				return 0;
			}
			else{
				return $info;
			}

		}
		else { return 0;}

	}


	//kiem tra email co ton tai chua theo post
	function checkIssetEmail(){
		$email=$_POST['email'];
		$sql="SELECT Email from db_users where Email='$email'";
		$result=mysql_query($sql) or die(mysql_error());
		$count=mysql_num_rows($result);
		if($count>0) {return 1; }
		else { return 0; }
	}

	//kiem tra email co ton tai chua
	function checkEmail($email){
		if(strlen($email)<5) return 1;
		$sql="SELECT Email from db_users where Email='$email'";
		$result=mysql_query($sql) or die(mysql_error());
		$count=mysql_num_rows($result);
		if($count>0) {return 1; }
		else { return 0; }
	}


	//lay OR_PLZ
	function getPzl($db,$key){
		//strassenort_de_ort

		$sql="SELECT DISTINCT(OR_PLZ) from `$db` where OR_PLZ Like '$key%' order by OR_PLZ DESC LIMIT 0,10 ";
		$result=mysql_query($sql) or die(mysql_error());
		$ar='';
		while($row=mysql_fetch_assoc($result)){
			$ar[]=$row['OR_PLZ'];
		}
		return $ar;
	}

	//lay stress
	function getStress($db,$stress,$postal){

		$sql="SELECT ST_NAME from `$db` where ST_PLZ='$postal' and ST_NAME Like '$stress%' LIMIT 0,10 ";
		$result=mysql_query($sql) or die(mysql_error());
		$ar='';
		while($row=mysql_fetch_assoc($result)){
			$ar[]=$row['ST_NAME'];

		}
		return $ar;
	}

	//lay vùng
	function getRegionPzl($db,$postal){
		$sql="SELECT OR_ONAME FROM `$db` where OR_PLZ='$postal'";
		$result=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_assoc($result);
		return $row['OR_ONAME'];

	}

	//Đăng ký users
	function register(){
		$email=trim(strip_tags($_POST['email']));
		$check=$this->checkEmail($email);
		if($check==1){ return 0;}
		else {
			$password=md5(trim(strip_tags($_POST['password'])));
			$firstname=trim(strip_tags($_POST['firstname']));
			$lastname=trim(strip_tags($_POST['lastname']));
			$sex=trim(strip_tags($_POST['sex']));
	   		$postalcode=trim(strip_tags($_POST['postalcode']));
	   		$office=trim(strip_tags($_POST['office']));
	   		$numberhouse=trim(strip_tags($_POST['numberhouse']));
	   		$noteposition=trim(strip_tags($_POST['noteposition']));
	   		$stress=trim(strip_tags($_POST['stress']));
	   		$region=trim(strip_tags($_POST['region']));
	   		$company=trim(strip_tags($_POST['company']));
	   		$phone=trim(strip_tags($_POST['phone']));
	   		$note=trim(strip_tags($_POST['note']));
	   		if(get_magic_quotes_gpc()==false){
	   			$email=mysql_real_escape_string($email);
	   			$password=mysql_real_escape_string($password);
	   			$firstname=mysql_real_escape_string($firstname);
	   			$lastname=mysql_real_escape_string($lastname);
	   			$sex=mysql_real_escape_string($sex);
	   			$postalcode=mysql_real_escape_string($postalcode);
	   			$office=mysql_real_escape_string($office);
	   			$noteposition=mysql_real_escape_string($noteposition);
	   			$numberhouse=mysql_real_escape_string($numberhouse);
	   			$stress=mysql_real_escape_string($stress);
	   			$region=mysql_real_escape_string($region);
	   			$company=mysql_real_escape_string($company);
	   			$phone=mysql_real_escape_string($phone);
	   			$note=mysql_real_escape_string($note);
	   		}

	   		$sql="INSERT INTO db_users(Email,Password,Firstname,Lastname,Sex,Postalcode,Office,Numberhouse,Stress,Region,Company,
	   					Phone,Note,Noteposition) VALUES('$email','$password','$firstname','$lastname','$sex','$postalcode',
	   					'$office','$numberhouse','$stress','$region','$company','$phone','$note','$noteposition')";
			$result=mysql_query($sql) or die(mysql_error());
			if(!$result){ return 0;}
			else {return 1;}
		}

	}


	//Đăng ký users
	function register_api($email,$password,$firstname,$lastname,$sex,$postalcode,$office,$numberhouse,$noteposition,$stress,$region,$company,$phone,$note){
		$email=trim(strip_tags($email));
		$check=$this->checkEmail($email);
		if($check==1){ return 2;}
		else {
			$password=md5(trim(strip_tags($password)));
			$firstname=trim(strip_tags($firstname));
			$lastname=trim(strip_tags($lastname));
			$sex=trim(strip_tags($sex));
	   		$postalcode=trim(strip_tags($postalcode));
	   		$office=trim(strip_tags($office));
	   		$numberhouse=trim(strip_tags($numberhouse));
	   		$noteposition=trim(strip_tags($noteposition));
	   		$stress=trim(strip_tags($stress));
	   		$region=trim(strip_tags($region));
	   		$company=trim(strip_tags($company));
	   		$phone=trim(strip_tags($phone));
	   		$note=trim(strip_tags($note));
	   		if(get_magic_quotes_gpc()==false){
	   			$email=mysql_real_escape_string($email);
	   			$password=mysql_real_escape_string($password);
	   			$firstname=mysql_real_escape_string($firstname);
	   			$lastname=mysql_real_escape_string($lastname);
	   			$sex=mysql_real_escape_string($sex);
	   			$postalcode=mysql_real_escape_string($postalcode);
	   			$office=mysql_real_escape_string($office);
	   			$noteposition=mysql_real_escape_string($noteposition);
	   			$numberhouse=mysql_real_escape_string($numberhouse);
	   			$stress=mysql_real_escape_string($stress);
	   			$region=mysql_real_escape_string($region);
	   			$company=mysql_real_escape_string($company);
	   			$phone=mysql_real_escape_string($phone);
	   			$note=mysql_real_escape_string($note);
	   		}

	   		$sql="INSERT INTO db_users(Email,Password,Firstname,Lastname,Sex,Postalcode,Office,Numberhouse,Stress,Region,Company,
	   					Phone,Note,Noteposition) VALUES('$email','$password','$firstname','$lastname','$sex','$postalcode',
	   					'$office','$numberhouse','$stress','$region','$company','$phone','$note','$noteposition')";
			$result=mysql_query($sql) or die(mysql_error());
			if(!$result){ return 0;}
			else {return 1;}
		}

	}


	//quen mat khau
	function randompass($email){
		$pass_new=md5(uniqid(rand(), true));
		$pass_new=substr($pass_new,1,6);
		$pass_md5=md5($pass_new);
		$sql="UPDATE  `db_users` SET Password='$pass_md5'  WHERE Email='$email'";
		$result=mysql_query($sql) or die(mysql_error());
		if(!$result){
			return 0;
		}
		else {
			return $pass_new;
		}
	}

	// insert đơn hàng web
	function history_odrer($idUser,$product,$Qty,$Total,$Day,$Address){

		$sql="INSERT INTO history_order(`idUser`,`product`,`Qty`,`Total`,`Day`,`Address`) VALUES ($idUser,'$product','$Qty','$Total','$Day','$Address')";
		$result=mysql_query($sql);
		if(!$result){
			return 0;
		}
		else {
			return 1;
		}
	}


	/// insert đơn hàng mobile
	function history_odrer_mobile($iduser,$product,$totalAmount,$totalMoney,$Day,$address,$type,$id_paypal_transaction,$time){

		$sql="INSERT INTO history_order(`idUser`,`product`,`Qty`,`Total`,`Day`,`Address`,`type`,`id_paypal_transaction`,`hash`) VALUES ('$iduser','$product','$totalAmount','$totalMoney','$Day','$address','$type','$id_paypal_transaction','$time')";
		$result=mysql_query($sql);
		if(!$result){
			return 0;
		}
		else {
			return 1;
		}
	}


	//lay đơn hàng  theo iduser
	function history_orderid($id){
		$sql="SELECT * FROM `history_order` WHERE idUser=$id";
		$data='';
		$result=mysql_query($sql) or die(mysql_error());
		if(!$result){
			return 0;
		}
		else{
			while($row=mysql_fetch_assoc($result)){
				$data[]=$row;
			}
		}
		return $data;
	}

	//xoá đơn hàng
	function delete_order($idDH){
		$sql="DELETE FROM `history_order` WHERE idDH=$idDH";
		mysql_query($sql) or die(mysql_error());
	}

	//update user
	function updateuser(){
		if(isset($_POST['email'])){
			$email=trim(strip_tags($_POST['email']));
			$firstname=trim(strip_tags($_POST['firstname']));
			$lastname=trim(strip_tags($_POST['lastname']));
			$sex=trim(strip_tags($_POST['sex']));
	   		$postalcode=trim(strip_tags($_POST['postalcode']));
	   		$office=trim(strip_tags($_POST['office']));
	   		$numberhouse=trim(strip_tags($_POST['numberhouse']));
	   		$noteposition=trim(strip_tags($_POST['noteposition']));
	   		$stress=trim(strip_tags($_POST['stress']));
	   		$region=trim(strip_tags($_POST['region']));
	   		$company=trim(strip_tags($_POST['company']));
	   		$phone=trim(strip_tags($_POST['phone']));
	   		$note=trim(strip_tags($_POST['note']));
	   		if(get_magic_quotes_gpc()==false){
	   			$email=mysql_real_escape_string($email);
	   			$firstname=mysql_real_escape_string($firstname);
	   			$lastname=mysql_real_escape_string($lastname);
	   			$sex=mysql_real_escape_string($sex);
	   			$postalcode=mysql_real_escape_string($postalcode);
	   			$office=mysql_real_escape_string($office);
	   			$noteposition=mysql_real_escape_string($noteposition);
	   			$numberhouse=mysql_real_escape_string($numberhouse);
	   			$stress=mysql_real_escape_string($stress);
	   			$region=mysql_real_escape_string($region);
	   			$company=mysql_real_escape_string($company);
	   			$phone=mysql_real_escape_string($phone);
	   			$note=mysql_real_escape_string($note);
	   		}

	   		$sql="UPDATE db_users SET `Firstname`='$firstname',`Lastname`='$lastname',`Sex`='$sex',
	   		`Postalcode`='$postalcode',`Office`='$office',`Numberhouse`='$numberhouse',`Stress`='$stress',
	   		`Region`='$region',`Company`='$company',`Phone`='$phone',`Note`='$note',`Noteposition`='$noteposition'
			where `Email`='$email'";
			$result=mysql_query($sql);
			if(!$result){ return 0;}
			else {return 1;}
		}

	}

	//update info dia chi cho user
	function update_address_user($email){
		$postalcode=trim(strip_tags($_POST['postalcode']));
   		$stress=trim(strip_tags($_POST['stress']));
   		$region=trim(strip_tags($_POST['region']));
   		$numberhouse=trim(strip_tags($_POST['numberhouse']));
   		if(get_magic_quotes_gpc()==false){
   			$postalcode=mysql_real_escape_string($postalcode);
   			$numberhouse=mysql_real_escape_string($numberhouse);
   			$stress=mysql_real_escape_string($stress);
   			$region=mysql_real_escape_string($region);
	   	}

	   	$sql="UPDATE db_users SET `Postalcode`='$postalcode',`Numberhouse`='$numberhouse',`Stress`='$stress',
	   		`Region`='$region' where `Email`='$email'";
		$result=mysql_query($sql);
		if(!$result){ return 0;}
		else {return 1;}

	}

	//function change password
	function changepass($Email,$pass_old,$pass_new){
		$sql="SELECT Email from db_users where Email='$Email' And Password='$pass_old'";
		$result=mysql_query($sql) or die(mysql_error());
		if(!$result){
			return 0;
		}
		else{
			$count=mysql_num_rows($result);
			if($count>0){
				$sqls="UPDATE db_users SET Password='$pass_new' WHERE Email='$Email'";
				$results=mysql_query($sqls);
				if(!$results){return 0;}
				else {return 2;}
			}
			else { return 1;}
		}
	}





	//gui mail
	function sendmail($TO_EMAIL, $subject, $body,$attach=false,$is_admin=false){
		echo $TO_EMAIL;
		include("./config/config.rule.php");
		if($config['server_sendmail']!=5){
			$mail = new PHPMailer();
			//$mail->IsSMTP();
            $mail->isMail();
			$mail->CharSet="utf-8";
			$mail->Host =$config['SMTP_SERVER'];
			$mail->Username =$config['SMTP_USER'] ;
			$mail->Password = $config['SMTP_PASSWORD'];
			$mail->SMTPSecure = $config['SMTPSecure']; // Giao thức SSL
			$mail->Port = $config['SMTP_SERVER_PORT']; // cổng SMTP
			$mail->From = $config['SMTP_USER']; // mail người gửi
			$mail->SMTPAuth = $config['SMTPAuth_sv'];

			if($config['server_sendmail']==1 || $config['server_sendmail']==3){
				$mail->Host =$config['SMTP_SERVER_sv'];
				$mail->Username =$config['SMTP_USER_sv'] ;
				$mail->Password = $config['SMTP_PASSWORD_sv'];
				$mail->SMTPSecure = $config['SMTPSecure_sv']; // Giao thức SSL
				$mail->Port = $config['SMTP_SERVER_PORT_sv']; // cổng SMTP
				$mail->From = $config['SMTP_USER_sv'];
				$mail->SMTPAuth = $config['SMTPAuth_sv'];

			}

			if($config['server_sendmail']==3|| $config['server_sendmail']==4){
				if($attach!=false){
					$mail->AddAttachment($attach);
				}
			}
			$mail->SMTPDebug  = 2;
			$mail->FromName =$config['namestore']; // tên người gửi

			if(is_array($TO_EMAIL)){
				foreach ($TO_EMAIL as $value) {
					$mail->AddAddress($value, $value);
				}
			}
			else {
				$mail->AddAddress($TO_EMAIL,$TO_EMAIL); //thêm mail người nhận
			}

			$mail->Subject = $subject;
			if($is_admin==false){
				$mail->isHTML(false); //Bật HTML không thích thì false
			}else{
                $mail->isHTML(false); //Bật HTML không thích thì false
            }
			$mail->Body = $body;

			if(!$mail->Send())
			{
			    return 0;
			}
			else
			{
				return 1;
			}
		}else{

            $headers  = "From: " . $config['email_store'] . PHP_EOL;
			$headers  .= "MIME-Version: 1.0" . PHP_EOL;
			if($is_admin==true){
				$headers .= "Content-type:text/plain;charset=UTF-8" . PHP_EOL;
			}
			else
			{
				$headers .= "Content-type:text/plain;charset=UTF-8" . PHP_EOL;
			}
            try{
                $sent = mail($TO_EMAIL, $subject, $body,$headers);

                if($sent)  {
                    return 1;
                } else  {
                   return 0;
                }
            }
            catch (Exception $e)
            {
                return 0;
            }
		}

	}


	function curl_url($url,$field_string){
		$ch=curl_init();
		$timeout = 10; // set to zero for no timeout
		curl_setopt ($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$field_string );
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
		$file_contents= curl_exec($ch);
		return $file_contents;
	}


}

 ?>
