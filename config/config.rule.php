<?php 
require_once("settings.rule.php");
$settings=new  settings;
$data=$settings->getSettings();
$config['time']=array();
$config['time_in_web']=array();
$config['date_off']=array();
$config['price']=array();
$config['address_store']=array();
foreach ($data as $da){
    switch ($da['Name']) {
        case "time":
            $config['time']=array_merge($config['time'],array($da['Key']=>$da['Value']));
            break;
        case "time_in_web":
            $config['time_in_web']=array_merge($config['time_in_web'],array($da['Key']=>$da['Value']));
            break;
        case "date_off":
            $config['date_off']=array_merge($config['date_off'],array($da['Key']=>$da['Value']));
            break;
        case "namestore":
            $config['namestore']=$da['Value'];
            break;
        case "address":
            $config['address']=$da['Value'];
            break;
        case "address_search_google":
            $config['address_search_google']=$da['Value'];
            break;
        case "price":
            //$config['price']=array_merge($config['price'],array($da['Key']=>$da['Value']));
            //sua loi khong lay key value duoc voi key la kieu int
            $config['price']=$config['price']+array($da['Key']=>(int)$da['Value']);
            break;
        case "longitude":
            $config['longitude']=$da['Value'];
            break;
        case "latitude":
            $config['latitude']=$da['Value'];
            break;
        case "logo_store":
            $config['logo_store']=$da['Value'];
            break;
        case "telephone_store":
            $config['telephone_store']=$da['Value'];
            break;
        case "address_store":
            $config['address_store']=array_merge($config['address_store'],array($da['Key']=>$da['Value']));
            break;
        case "dishis_first":
            $config['dishis_first']=$da['Value'];
            break;
        case "dishis_first_name":
            $config['dishis_first_name']=$da['Value'];
            break;
        case "iconprice":
            $config['iconprice']=$da['Value'];
            break;
        case "email_store":
            $config['email_store']=$da['Value'];
            break;
        case "email_admin":
            $config['email_admin']=$da['Value'];
            break;
        case "server_sendmail":
            $config['server_sendmail']=$da['Value'];
            break;
        case "dbhost":
            $config['dbhost']       =$da['Value'];
            break;
        case "dbdatabase":
            $config['dbdatabase']   =$da['Value'];
            break;
        case "dbuser":
            $config['dbuser']       =$da['Value'];
            break;
        case "dbpassword":
            $config['dbpassword']   =$da['Value'];
            break;
        case "header_color":
            $config['header_color']   =$da['Value'];
            break;
        case "logo_banner":
            $config['logo_banner']   =$da['Value'];
            break;
        case "cart_logo":
            $config['cart_logo']   =$da['Value'];
            break;
        case "favicon_ico":
            $config['favicon_ico']   =$da['Value'];
            break;
        default:
            break;
    }

}
/**
	Thời gian làm việc sử dụng cho code
	không được thay cấu trúc .VD:MONDAY.., chỉ được thay đổi thời gian

$config['time']=Array(
					"MONDAY"=>"11H-12H|12H-16H|16H-22H",//8.30h,8.35
					"TUESDAY"=>"11H-12H|12H-15H|15H-22H",
//					"WEDNESDAY"=>"11H-12H|12H-15H|15H-22H", // Ruhetag
					"THURSDAY"=>"11H-12H|12H-15H|15H-22H",
					"FRIDAY"=>"11H-12H|12H-15H|15H-22H",
					//"SATURDAY"=>"11H-22H", 
					//"SUNDAY"=>"11H-12H|12H-16H|16H-22H"
					"SATURDAY"=>"1H-1H", //Neu Jahr het thoi gian thi bo lay lai 2 dong tren
					"SUNDAY"=>"15H-16H|16H-22H" // Weihnacht

					);//thời gian làm việc
**/


/**
	thời gian hiện lên website
	Thoái mái thay đổi text và giờ theo ý muốn

$config['time_in_web']=Array(
					"MONDAY"=>"Von 11Uhr Bis 22Uhr",
					"TUESDAY"=>"Von 11Uhr Bis 22Uhr",
					"WEDNESDAY"=>"Mittwoch Ruhetag",
					"THURSDAY"=>"Von 11Uhr Bis 22Uhr",
					"FRIDAY"=>"Von 11Uhr Bis 22Uhr",
					//"SATURDAY"=>"Von 11Uhr Bis 22Uhr",
					//"SUNDAY"=>"Von 11Uhr Bis 22Uhr"
					"SATURDAY"=>"Geschlosen", //Neu Jahr het thoi gian thi bo lay lai 2 dong tren
					"SUNDAY"=>"Von 15Uhr Bis 22Uhr"   // lich Weihnacht
					);//thời gian làm việc
**/


//$config['namestore']="BAMBUSSTÄBCHEN";//Tên cửa hàng viết trong email gửi cho khách
//$config['address']="BRODOWINER RING 16 / 18, 12679 Berlin";//địa chỉ tính khoảng cách
//$config["price"]=Array(
//					"3"=>10,//bé hơn 3
//					"5"=>15,//bé hơn 5
//					"7"=>20,//bé hơn 7
//
//					//"99999999"=>55 //khoảng cách còn lại
//				);//giá tiền order tối thiểu theo km


//$config['longitude']="52.5496704";//toa do cua hang
//$config['latitude']="13.5787986";//toa do cua hang
//$config['logo_store']="http://localhost/pizza/style/images/piza.jpg";//Đường dẫn đến hinh anh logo cua cua hang dung cho mobile
//$config['telephone_store']="(030)820.728 - 10/11";//điện thoại của hàng
//$config['address_store']=Array("name"=>"",
//								"address"=>"BRODOWINER RING 16 / 18",		
//								"region"=>"12679 Berlin"
//								 );//địa chỉ của hàng


/**
	Tên Nhóm món ăn và id nhóm hiện đầu tiên lên trang chủ

$config['dishis_first']=1;//id Nhóm  món ăn xuất hiện đầu tiên trang chủ
$config['dishis_first_name']="Vorspeisen";//tên nhóm món ăn xuất hiện đầu tiên ở trang chủ


$config['iconprice']="€";// loại tiền tệ hiện trên website
**/

/** 
  Config Email send mail 
  body:body mail
  title:title mail


$config['email_store']="info@bambusstäbchen-berlin.de";//email cửa hàng,hiện website(không phải email gửi mail)
$config['email_admin']='onlinebestellungs@hanhantran.de'; // Email của admin để nhận mail mỗi khi khách order
**/

/**----------------GUI MAIL----------------------------------------------**/

## 1. Phuong an dung smtp cua server 

$config['email_sv']="onlinebestellungs@hanhantran.de";	//email gửi mail khi khach hàng order server
$config['password_sv']="Eho5Lev6";	//Mật khẩu email gửi mail
//$config['email_sv']="test@thaihuong.de";//email gửi mail khi khach hàng order server
//$config['password_sv']="P@ssw0rd";//Mật khẩu email gửi mail

$config['SMTP_SERVER_sv']='smtp.1und1.de';	//server 1&1
$config['SMTP_SERVER_PORT_sv']=587; //port mail 1&1---- 465: ssl ----- 587(hoặc 25): none
$config['SMTPSecure_sv']="tls";	//giao thuc: ssl --- none: khong co ssl - tls
$config['SMTP_USER_sv']=$config['email_sv'];	//email gui BIẾN Ở TRÊN
$config['SMTP_PASSWORD_sv']=$config['password_sv'];	//pass word email BIẾN Ở TRÊN
$config['SMTPAuth_sv']=true;

## 2. Phuong an dung smtp google

$config['email']="khacthanh234@gmail.com";//email gửi mail khi khach hàng order google
$config['password']="jhgjh";//Mật khẩu email gửi mail

$config['SMTP_SERVER']='smtp.gmail.com';//server google
$config['SMTP_SERVER_PORT']=465; //port mail
$config['SMTPSecure']="ssl";//giao thuc ssl
$config['SMTP_USER']=$config['email'];//email gui BIẾN Ở TRÊN
$config['SMTP_PASSWORD']=$config['password'];//password email BIẾN Ở TRÊN




/**
	-Su dung he thong gui mail cua server hay google
	-1 la gui mail cua server, 2 la gui mail cua google,3 la gui file txt dinh kem qua server,4 là gưi file txt dinh kem qua google, 5 là gửi bằng PHP
**/

	//$config['server_sendmail']=5;


/**---------------------------- end GUI MAIL---------------------------------**/

/** lưu ý không được xoá những ký tự nằm trong {}.ví dụ {Email} {address} .... **/

//Nội dung gửi thư cho admin
$config['bodyadmin']=" {address} <br>###################################################################### <br> {order} "; 
//tiêu đề gửi thư cho admin
$config['titleadmin']="Bestellen{time}";
//TIÊU đề gửi cho custormer
$config['titlecustomer']="HQTECH Thanks for your order!";
//nội dung gửi cho customer
$config['bodycustomer']="HQTECH send order of your:<br> Transaction code: {transaction_code}:<br> {order} <br> <p><b>infomation your:</b></p> {address}" ;


/* config send mail khi khach hang quen mat khau */

$config['forgetmail']['subject']="Ihr Kennwort ist zurückgesetzt";
$config['forgetmail']['body']='Lieber Kunde, Lieber Kundin,  Ihr neues Kennwort ist: {pass}.';
/*
*Config image hiển thị trên website
*1 :hiển thị
*0:không hiển thị
*/

/** hien thi hinh anh web */
$config['wdisplayimggruppe']=1;// 1 hiển thị ;0 ẩn cua nhóm món ăn
$config['wdisplayimgdishis']=1;// 1 hiển thị ;0 ẩn cua từng món ăn