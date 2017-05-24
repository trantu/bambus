<?php 
	if(!defined('SECURITY')) exit('404 - Not Access'); 
	require_once("all.php");
	$xtpl=new Xtemplate(TEMPLATE."m/main.tpl");
	$al=new All;
	$rule=new Rule;

	if(!isset($_SESSION['arrSP'])) {
        $_SESSION['arrSP']= array();
    }
    if(!isset($_SESSION['total'])) {
        $_SESSION['total']= 0;
    }

    if(!isset($_SESSION['total_dishis'])) {
        $_SESSION['total_dishis']= 0;
    }

/*
*Xử lý ngày tháng
* kiểm tra trong thời gian làm việc
*/

    $weekday =strtoupper(date("l"));
    $time=$config['time']["$weekday"];
    $time=str_replace('h','.',$time);
    $arrT=explode("|",$time);
    $true=0;
    $timenow=date("H.i");
    foreach ($arrT as $val) {
    	$hour=explode("-",$val);
    	$hour1=$hour[0];$hour2=$hour[1]; 
    	settype($hour1,"float");
 		settype($hour2,"float");
    	if($timenow > $hour1 && $timenow < $hour2){
    		$true=1;
    	}
    }

    /******* DATE ********/
    $date_off = date("m.d");
    $time = $config['date_off']["$date_off"];

    if(isset($time)){
        if($time == '')
            $true = 0;
        else{
            $time = str_replace('h','.',$time);
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
    /******* END DATE ********/

	 if($true==0){
	 	/**Timeout langue**/
			$xtpl->assign('TTIMEOUT',$main['timeout']['timeout_title']);
			$xtpl->assign('TTORDER',$main['timeout']['order']);
			$xtpl->assign('TTSEE',$main['timeout']['see']);
	
	 		$xtpl->parse("main.timeout");
	 }


/* kiem tra trang thai login */
	if(isset($_SESSION['Email'])==true){
		$xtpl->assign('EMAIL',$_SESSION['Email']);
		$xtpl->assign('SACCOUT',$main['sigin']['myaccount']);
		$xtpl->assign('SLOGUOT',$main['sigin']['logout']);
		$xtpl->parse("main.loginsession");
		//$xtpl->assign('STTCART','redirect-cart');
	}
	

	/*else { 	
			$xtpl->assign('SLOGIN',$main['sigin']['login']);
			$xtpl->parse("main.login"); 
			$xtpl->assign('STTCART','notorder-cartnow');
	}*/


//lấy món ăn và nhóm món ăn
	$namegruppe=$al->getNameGruppe();
	foreach ($namegruppe as $namess) {
		
		$dishis=$al->getDishes($namess['Online_Gruppe_ID']);
		foreach ($dishis as $names) {
			if($names['Beilage']==null){
				$xtpl->assign('IDSP',$names['PLU']);
				$xtpl->assign('NAME',$names['Name']);
				$price_s=number_format($names['Preis1'],2,',','.'); 
				$xtpl->assign("PRICE",$price_s);
				$xtpl->assign("NAMEONLINE",$names['Artikel_Beschreibung']);
				$xtpl->parse("main.gruppe.list");
				$xtpl->assign("ICONPRICE",$config['iconprice']);
			}
			else{
				$xtpl->assign('IDSP',$names['PLU']);
				$xtpl->assign('NAME',$names['Name']);
				$price_s=number_format($names['Preis1'],2,',','.'); 
				$xtpl->assign("PRICE",$price_s);
				$xtpl->assign("NAMEONLINE",$names['Artikel_Beschreibung']);
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
							$xtpl->assign('STEP',$main['cart']['step']);
							$xtpl->parse("main.gruppe.lists.demdishis");
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
					$xtpl->parse("main.gruppe.lists.beilage");
					$dem_d++;
				}
					
				unset($d);
				$xtpl->assign('COUNT_DISHIS',$dem_d);
				$xtpl->assign("NOTE",$main['note']['title']);//ngon ngu
				$xtpl->assign("NOTECONTENT",$main['note']['content']);
				$xtpl->assign("NOTEBUTTON",$main['note']['button']);
				$xtpl->assign("NOTEPLACEHOLDER",$main['note']['placeholder']);
				$xtpl->assign('SIDEDISH',$main['cart']['side-dish']);

				$xtpl->parse("main.gruppe.lists");
			}
		}

		$xtpl->assign("NAMEGRUPPE",$namess['Online_Gruppe_Name']);
		$xtpl->parse('main.gruppe');
	}
	

/**in footter*/	
	$address=$config['address_store'];
	$xtpl->assign("NAMESTORE",$address['name']);
	$xtpl->assign("ADDRESSSTORE",$address['address']);
	$xtpl->assign('REGIONSTORE',$address['region']);
	$xtpl->parse("main.addressstore");

	$telephone=$config['telephone_store'];
	$email=$config['email_store'];
	$xtpl->assign("TELEPHONE",$telephone);
	$xtpl->assign("EMAILCONTACT",$email);
	$xtpl->parse("main.contactus");
	

/* tổng sản phẩm và món ăn */
	$totos=number_format($_SESSION['total'],2,',','.');
	$xtpl->assign("TOTAL",$totos);
	$xtpl->assign("TOTAL_DISHIS",$_SESSION['total_dishis']);

/****Khoảng cách và số tiền  **/
	$rule->getPrice($config['address'],$config["price"]);	
	if(isset($_SESSION['price_distance'])){
		$xtpl->assign("PRICEMIN",$_SESSION['price_distance']);
	}
	else {
		$xtpl->assign("PRICEMIN",0);
	}


	$check_stress=$rule->getPrice($config['address'],$config["price"]);
	if($check_stress=="Not"){
		$xtpl->parse("main.checkstress");
	}

	if(isset($_SESSION['price_distance'])){
		$xtpl->assign("PRICEMIN",$_SESSION['price_distance']);
	}
	else {
		header("location:index.php?mod=m/home");
		//$xtpl->assign("PRICEMIN",0);
	}

/*
*Main menu
*/
	$xtpl->assign('MSPEISEKARTE',$main['menu']['Speisekarte']);
	$xtpl->assign('MBEWERTUNGEN',$main['menu']['Bewertungen']);
	$xtpl->assign('MINFO',$main['menu']['Info']);


/*
*
*Sign in langue
*
*/

	$xtpl->assign('SGTITLE',$main['sigin']['title']);
	$xtpl->assign('SGTITLEP',$main['sigin']['titlep']);
	$xtpl->assign('SGTITLEREGISTER',$main['sigin']['titleregister']);
	$xtpl->assign('SGEMAIL',$main['sigin']['email']);
	$xtpl->assign('SGEMAILP',$main['sigin']['emailplace']);
	$xtpl->assign('SGPASSWORD',$main['sigin']['password']);
	$xtpl->assign('SGPASSWORDP',$main['sigin']['passwordplace']);
	$xtpl->assign('SGFGPASS',$main['sigin']['fgpassword']);
	$xtpl->assign('SGBTSIGNUP',$main['sigin']['btsignup']);
	$xtpl->assign('SGBTRGTER',$main['sigin']['btrgter']);
	$xtpl->assign('SGERROR',$main['sigin']['error']);


/*
*
*Cart langue
*
*/
	$xtpl->assign('CMINIMUM',$main['cart']['minimum_title']);
	$xtpl->assign('CQTY',$main['cart']['qty']);

/*
*
*Forget password langue
*
*/
	$xtpl->assign('FGTITLE',$main['forget']['title']);
	$xtpl->assign('FGPLACE',$main['forget']['placeholder']);
	$xtpl->assign('FGBUTTON',$main['forget']['button']);
	$xtpl->assign('FGSUCCESS',$main['forget']['success']);
	$xtpl->assign('FGERROR',$main['forget']['error']);


	$xtpl->parse('main');
	$xtpl->out('main');


?>