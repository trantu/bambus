<?php 
	#kIỂM Tra đăng nhập và giá tiền để hiện popup và tài khoản
	if(isset($_SESSION['Email'])){
		$display_form_address='display:none'; # Trang thai hien thi  form nhap dia chi
		$text_position_login='<a href="index.php?mod=p_infouser"> '.$de_top['top_myaccount'].' </a>|<p><a href="index.php?mod=logout">'.$de_top['top_logout'].'</a></p>';
	}
	else{
		if(!isset($_SESSION['price_distance'])){
			$display_form_address='display:block';# Trang thai hien thi form nhap dia chi
		}
		else{
			$display_form_address='display:none';
		}
		
		$text_position_login='<a href="#" class="login popup">'.$de_top['top_login'].'</a><p>'.$de_top['top_notmember'].'<a href="index.php?mod=register" class="register ">'.$de_top['top_registernow'].'</a></p>';
	}
	
	if(!isset($_GET['mod'])){
		$class_menus=array('home'=>'red-border','about'=>'','main'=>'','contact'=>'','checkout'=>'');
	}
	elseif($_GET['mod']=='main'){
		$class_menus=array('home'=>'','about'=>'','main'=>'red-border','contact'=>'','checkout'=>'');
	}
	elseif($_GET['mod']=='about'){
		$class_menus=array('home'=>'','about'=>'red-border','main'=>'','contact'=>'','checkout'=>'');
	}elseif($_GET['mod']=='contact'){
		$class_menus=array('home'=>'','about'=>'','main'=>'','contact'=>'red-border','checkout'=>'');
	}
	elseif($_GET['mod']=='checkout'){
		$class_menus=array('home'=>'','about'=>'','main'=>'','contact'=>'','checkout'=>'red-border');
	}else{
		$class_menus=array('home'=>'red-border','about'=>'','main'=>'','contact'=>'','checkout'=>'');
	}

	$xtpl->assign("MODMENU",$class_menus);

	$xtpl->assign("DISPLAYFORMADDRESS",$display_form_address);
	$xtpl->assign("TEXTPOSITIONLOGIN",$text_position_login);
	# hiển thị địa chỉ thông tin trên
	$xtpl->assign("TELEPHONE",$config['telephone_store']);
	$xtpl->assign("EMAILCONTACT",$config['email_store']);
	$xtpl->assign("ADDRESSSTORE",$config['address_store']);

    //setting color for header banner
    $xtpl->assign("HEADER_COLOR",$config['header_color']);

    //LOGO
    $xtpl->assign("LOGO_BANNER",$config['logo_banner']);

	$weekday_hd =strtoupper(date("l"));
	$time_hd=$config['time_in_web']["$weekday_hd"];
	$xtpl->assign("TIMEDAYWORK",$time_hd);
	#end hiển thị địa chỉ thông tin trên

	if($config['show_menu_huk']==0){
		$style_menu=".menu_hide_shows{display:none;}";
		$xtpl->assign("STYLEMENU",$style_menu);
	}
 ?>
