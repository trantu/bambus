<?php #trang chinh shop
if(!defined('SECURITY')) exit('404 - Not Access');
	$rule=new Rule;
	$xtpl=new XTemplate(TEMPLATE.'main.tpl');
	require_once("all.php");
	require_once("j_all.php");
	$all=new All;
	$j_all=new j_all;
	$xtpl->assign('LANGUAGEMAIN',$de_main);
	$xtpl->assign('LANGUAGECART',$de_cart);



	$xtpl->assign('FORM_LOGO',$config['cart_logo']);
	$xtpl->assign('INFO_BOARD',$config['info_board']);
	$xtpl->assign('TITLE',$config['namestore']);
	$xtpl->assign('FAVICON_ICO',$config['favicon_ico']);


	include('inc/header.php');
	unset($_SESSION['total_PP']);

	if(isset($_SESSION['addresold'])){
		$address_old=$_SESSION['addresold'];
		$xtpl->assign("ADDRESSOLD",$address_old);
	}

	if(isset($_SESSION['price_distance'])){
		$xtpl->assign("PRICEMIN",$_SESSION['price_distance']);
	}

	# Xứ lý session price_distance
	if(isset($_SESSION['Email'])){
		$rowuser=$j_all->infoUser($_SESSION['Email']);
		$address_price_rule=$rowuser['Postalcode'].$rowuser['Numberhouse'].$rowuser['Stress'].$rowuser['Region'];
		$check_stress=$rule->getPrice($config['address'],$config["price"],$address_price_rule);
		if($check_stress==false){
			$xtpl->assign("PRICEMIN",'Address Error');
		}
		if(isset($_SESSION['price_distance'])){
			$xtpl->assign("PRICEMIN",$_SESSION['price_distance']);
		}
		$display_form_address='display:none'; # Trang thai hien thi form nhap dia chi
		//$text_position_login='<a href="index.php?mod=p_infouser"> My Account </a>|<p><a href="index.php?mod=logout">Logout</a></p>';
		$xtpl->assign("DISPLAYFORMADDRESS",$display_form_address);
		//$xtpl->assign("TEXTPOSITIONLOGIN",$text_position_login);
	}

	/******* TIME ********/
    $weekday =strtoupper(date("l"));
    $time=$config['time']["$weekday"];
    $time=str_replace('h','.',$time);
    $arrT=explode("|",$time);
    $true=0;
    $timenow=date("H.i");
    foreach ($arrT as $val) {
        $hour=explode("-",$val);
        $hour1=$hour[0];
        $hour2=$hour[1];
        settype($hour1,"float");
        settype($hour2,"float");
        if($timenow >= $hour1 && $timenow < $hour2){
            $true=1; // available
        }
    }

	/**End check time**/

    /******* DATE ********/
    $date_off = date("m.d");
    if(array_key_exists($date_off, $config['date_off'])){
        $time = $config['date_off']["$date_off"];
        // Reset $true = 0 if having date_off
        $true = 0;
    }

    if(isset($time)){
        if($time == '')
            $true = 0;
        else{
            $time = str_replace('H','.',$time);
            $arrT = explode("|",$time);
            foreach ($arrT as $val) {
                $hour=explode("-",$val);
                $hour1=$hour[0];
                $hour2=$hour[1];
                settype($hour1,"float");
                settype($hour2,"float");
                if($timenow >= $hour1 && $timenow < $hour2){
                    $true=1; // available
                }
            }
        }
    }

    if($true==0){
        if($config['as_order_time_out']==0){
            $xtpl->assign('TOTITLE',$de_main['timeout']['timeout_title']);
            $xtpl->parse("main.timeout");
            $xtpl->assign('DISPLAYFORMATTIME','display:block');
        }
    }

	/**End check time**/
    if(isset($_SESSION['alert_paid']))
    {
        $xtpl->assign('ALERT_TITLE',sprintf($de_checkout['alert_paid'], $config['time_arrive']));
        $xtpl->parse("main.alert_paid");

        unset($_SESSION['alert_paid']);
    }

	/**lay mon ăn và nhóm món ăn*/
    $namegruppe=$all->getNameGruppe();
    $dishis_first=$config['dishis_first'];
    $name=$all->getNameMain($dishis_first);

	#load nhom mon an
    foreach ($namegruppe as $gr) {
        if($gr['Online_Gruppe_ID'] ==$dishis_first){
            $xtpl->assign("GRUPPEBILDMAIN",$gr['Online_Gruppe_Bild']);
        }
        $xtpl->assign("NAMEGRUPPE",$gr['Online_Gruppe_Name']);
        $xtpl->assign("GRUPPEID",$gr['Online_Gruppe_ID']);

        if($gr['Online_Gruppe_ID']==$config['dishis_first']){
            $xtpl->assign("id_default",'id="menu_active"');
        }else{
            $xtpl->assign("id_default",'');
        }

        $xtpl->assign("GRUPPEBILD",$gr['Online_Gruppe_Bild']);
        $xtpl->assign("GRUPPEFARBE",$gr['Online_Gruppe_Farbe']);

        $xtpl->parse("main.menu");
    }

    $xtpl->assign("NAMEGRUPPE",$config['dishis_first_name']);
    $xtpl->parse('main.contentdishis');

	#load mon an trang chinh
	foreach ($name as $names) {
		if($names['Beilage']==null){
			#khong co mon an them
			$xtpl->assign('IDSP',$names['PLU']);
			$xtpl->assign('NAME',$names['Name']);
			$price_s=number_format($names['Preis1'],2,',','.');
			$xtpl->assign("PRICE",$price_s);
			$xtpl->assign("ONLINEBILD",$names['Online_Bild']);
			$xtpl->assign("ONLINEFARBE",$names['Online_Farbe']);
			$xtpl->assign("NAMEONLINE",$names['Artikel_Beschreibung']);
			$xtpl->assign("ICONPRICE",$config['iconprice']);//ngon ngu
			$xtpl->assign("NOTE",$de_cart['note']['title']);//ngon ngu
			$xtpl->assign("NOTECONTENT",$de_cart['note']['content']);
			$xtpl->assign("NOTEBUTTON",$de_cart['note']['button']);
			$xtpl->parse("main.name");
		}
		else{
			#co mon an them
			$xtpl->assign('IDSP',$names['PLU']);
			$xtpl->assign('NAME',$names['Name']);
			$price_s=number_format($names['Preis1'],2,',','.');
			$xtpl->assign("PRICE",$price_s);
			$xtpl->assign("ONLINEBILD",$names['Online_Bild']);
			$xtpl->assign("ONLINEFARBE",$names['Online_Farbe']);
			$xtpl->assign("NAMEONLINE",$names['Artikel_Beschreibung']);
			$xtpl->assign("NOTECONTENT",$de_cart['note']['content']);
			$xtpl->assign('SIDEDISH',$de_cart['cart']['side-dish']);
			$beilage=$names['Beilage'];
			$xtpl->assign("ICONPRICE",$config['iconprice']);
			$b=explode("█",$beilage);
			foreach ($b as $row) {
				$d[]=explode("Ө", $row);
			}

			$counts=count($d);
			$dem_ds=0;
			$dem_d=0;
			for($i=0;$i< $counts -1;$i++){
				if($i< $counts -1){
					if($d[$i][0] !=$d[$i+1][0]){
						$dem_ds++;
						$xtpl->assign('DEM_DS',$dem_ds);
						$xtpl->assign('STEP',$de_cart['cart']['step']);
						$xtpl->parse("main.names.demdishis");
					}
				}

				$beilages['name']=$d[$i][1];
				$beilages['price']=$d[$i][2]/100;
				$beilages['group']=$d[$i][0];
				$beilages['display']=$d[$i][3];

				$xtpl->assign('GROUPCLASS',$beilages['group']);
				$xtpl->assign('BEILAGE',$beilages['name']);
				$xtpl->assign('DISPLAY_DS',$beilages['display']);
				$xtpl->assign('CLASSDS',$dem_d);
				$price_bei=number_format($beilages['price'],2,'.',',');
				$xtpl->assign('PRICES',$price_bei);

				$xtpl->parse("main.names.beilage");
				$dem_d++;
			}

			unset($d);
			$xtpl->assign('COUNT_DISHIS',$dem_d);
			$xtpl->assign("ICONPRICE",$config['iconprice']);
			$xtpl->assign("NOTE",$de_cart['note']['title']);//ngon ngu
			$xtpl->assign("NOTECONTENT",$de_cart['note']['content']);
			$xtpl->assign("NOTEBUTTON",$de_cart['note']['button']);
			$xtpl->assign("NOTEPLACEHOLDER",$de_cart['note']['placeholder']);

			$xtpl->parse("main.names");
		}
	}

	/**End lay mon an**/

	#lay tong tien mon an
	$total_temp=(isset($_SESSION['total']))? $_SESSION['total']:0;
	$total=number_format($total_temp,2,',','.');
	$xtpl->assign("TOTALCART",$total);
	$total_dishis=(isset($_SESSION['total_dishis']))? $_SESSION['total_dishis']:0;
	$xtpl->assign("TOTALDISHISCART",$total_dishis);

	#Hiện giỏ hàng chi tiết
	if(isset($_SESSION['arrSP'])){
		$arrSP_cart=$_SESSION['arrSP'];
		if(count($arrSP_cart)>0){
			foreach ($arrSP_cart as $row) {
				$xtpl->assign("QTY",$row['qty']);
				$xtpl->assign("IDSP",$row['idSP']);
				$xtpl->assign('NAME',$row['name']);
				$str=$row['price']*$row['qty'];
				$price_s=number_format($str,2,',','.');
				$xtpl->assign("PRICES",$price_s);
				$str1=$row['price'];
				$price_s1=number_format($str1,2,',','.');
				$xtpl->assign('PRICE',$price_s1);
				$xtpl->assign("ICONPRICE",$config['iconprice']);
				$xtpl->assign("NOTE",$row['note']);

                if(isset($row['Beilage'])==true){
					$bl_ar=explode("|",$row['Beilage']);
					foreach ($bl_ar as $val_a) {
						$xtpl->assign("BEILAGE",$val_a);
						$xtpl->parse("main.cart.beilage.dishisshiss");
					}
					// $xtpl->assign("PLU",$row['plu']);
					$xtpl->assign("STTPP",$_SESSION['countpp']);
					$xtpl->parse("main.cart.beilage");
				}
				else {
					$xtpl->parse("main.cart.namenot");
				}
				$xtpl->assign("STTPP",$_SESSION['countpp']);
				$xtpl->parse("main.cart.pricesession");
				$xtpl->parse("main.cart");
			}
		}
	}


/*
*
* hiển thị hình ảnh của web
*thay doi trong file config.rule.php
*/
	if($config['wdisplayimggruppe']==0){
		$xtpl->parse("main.checkimggruppe");
	}

	if($config['wdisplayimgdishis']==0){
			$xtpl->parse("main.checkimgdishis");
	}

	//load ngon ngu
	$xtpl->assign('LANGUAGEMENU',$de_menu);
	$xtpl->assign('LANGUAGEFOOTER',$de_footer);
	$xtpl->assign('LANGUAGELOGIN',$de_login);

	$xtpl->assign_file("TEMPLATEHEADER",TEMPLATE.'header/header.tpl');
	$xtpl->assign_file("TEMPLATEFOOTER",TEMPLATE.'footer/footer.tpl');
	$xtpl->assign_file("TEMPLATELOGIN",TEMPLATE.'login/login.tpl');
	$xtpl->assign("ICONPRICE",$config['iconprice']);
	$xtpl->assign("DISCOUNTTEXT",$config['discount_text']);
	$xtpl->parse("main");
	$xtpl->out("main");

 ?>
