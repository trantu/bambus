<?php
if(!defined('SECURITY')) exit('404 - Not Access');

// khai bao cau connect toi DB
//$config['dbhost']="db584866506.db.1and1.com";
//$config['dbdatabase']="db584866506";
//$config['dbuser']="dbo584866506";
//$config['dbpassword']="fdEb6Y9a";


//TABLE
$config['straßenort_de_ort']="straßenort_de_ort";
$config['straßenort_de_strasse']="straßenort_de_strasse";//strassenort_de_strasse

/**
	-congfig lưu lịch sử đơn hàng vào database
	-1 là lưu
	-0 là không lưu
**/
	$config['save_log_db']=0;
/**
	-config đặt trước ngoài giờ
	-0 là không cho phép đặt
	-1 là cho phép đặt
**/
	$config['as_order_time_out']=0;
/** 
	-Có gửi confirm mail cho khách hàng khi order hay ko? 
	-0 la không gửi
	-1  là có gửi
**/
	$config['send_mail_customer']=0;
/**
-Config setting ẩn hiện cho menu Home, Über uns, Kontakt.
-0 là ẩn
-1 là hiển
**/

$config['show_menu_huk']=0;


/**
#Config dia diem tim kiem 
**/

//$config['address_search_google']="Berlin, Deutschland";


/*********** API ************/

//DEFINE PHÂN CÁCH để cắt chuỗi token api

defined('APIARRAY') or define('APIARRAY','==');//ký tự cắt chuỗi thành mạng trong api app
defined('APIKEYARRAY') or define('APIKEYARRAY',2);// giá trị của key cách mạng số index

defined('PRIVATE_KEY') or define('PRIVATE_KEY','luckyteo12131415');//mật khẩu api cho app   
defined('API_LINK_IMG') OR define('API_LINK_IMG','http://localhost/pizza/style/images/');//thay doi khi chuyen code
//DEFINE KEY_API
defined('API_KEY') OR define('API_KEY', 'AIzaSyCIDMIbz2xy1KVmDewYx-mtLNmFb2xgEOY');