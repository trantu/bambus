<?php 
#tra ve gia tri cua san pham an kem
#kiem tra co post stt.stt chính là số thứ tự của người order trong cart
#kiểm tra số stt post có băngg số thứ tự session đẫ lưu.nếu không bằng thì tức là người đầu tiên
#kiểm tra có tồn tại session newcart .nếu có tức là cart mới.nếu không là cart cũ
 #kiem ta có session so luong san pham chua
if(!defined('SECURITY')) exit('404 - Not Access');
$xtpl=new XTemplate(TEMPLATE.'showcart.tpl');
$xtpl->assign('LANGUAGEMAIN',$de_main);
$xtpl->assign('LANGUAGECART',$de_cart);
if(isset($_POST['idSP']))
{	
	if(!isset($_SESSION['countpp'])){
		$_SESSION['countpp']=0;
	}

	$idSP=$_POST['idSP'];
	$stt=$_SESSION['countpp'];// thứ tự session của người order trong cart
	if(isset($_POST['stt']) && $_SESSION['countpp']!=0 && $_SESSION['countpp']!=$_POST['stt']){
		$stt=$_POST['stt'];
		settype($stt,"int");
		$row=$_SESSION['arrSPPP'][$stt]["$idSP"]; 
	}
	else{
		$row=$_SESSION['arrSP']["$idSP"];
	}
	 
	if(isset($_SESSION['newcart']) )
	{		
		#kiem ta có session so luong san pham chua
		if(isset($_SESSION['qtySP'])){
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
			if(isset($row['Beilage'])==true){
				$bl_ar=explode("|",$row['Beilage']);
				foreach ($bl_ar as $val_a) {
					$xtpl->assign("BEILAGE",$val_a);
					$xtpl->parse("cart.beilage.dishisshiss");
				}

				$xtpl->assign("PLU",$row['plu']);
				$xtpl->assign("STTPP",$stt);
				$xtpl->parse("cart.beilage");
			}
			else {
				$xtpl->parse("cart.namenot");
			}

			$xtpl->parse("cart.pricesession");
			$xtpl->parse('cart');
			$xtpl->out("cart");

			unset($_SESSION['qtySP']);
		}

		elseif(isset($_SESSION['sp']["$idSP"]) && $_SESSION['sp']["$idSP"]>1){
			echo $_SESSION['sp']["$idSP"];
		}
		else{
			$xtpl->assign("QTY",1);
			$xtpl->assign("IDSP",$row['idSP']);
			$xtpl->assign('NAME',$row['name']);
			$str=$row['price']*$row['qty'];
			$price_s=number_format($str,2,',','.');
			$xtpl->assign("PRICES",$price_s);
			$str1=$row['price'];
			$price_s1=number_format($str1,2,',','.');
			$xtpl->assign('PRICE',$price_s1);

			$xtpl->assign("ICONPRICE",$config['iconprice']);
			if(isset($row['Beilage'])==true){
				$bl_ar=explode("|",$row['Beilage']);
				foreach ($bl_ar as $val_a) {
					$xtpl->assign("BEILAGE",$val_a);
					$xtpl->parse("cart.beilage.dishisshiss");
				}
				
				$xtpl->assign("PLU",$row['plu']);
				$xtpl->assign("STTPP",$_SESSION['countpp']);
				$xtpl->parse("cart.beilage");
			}
			else {
				$xtpl->parse("cart.namenot");
			}
			$xtpl->assign("STTPP",$_SESSION['countpp']);
			$xtpl->parse("cart.pricenotsession");		
			$_SESSION['sp']["$idSP"]=$row['price']; //gia cua san pham
			$xtpl->parse('cart');
			$xtpl->out("cart");
		}
	}
	else{	
		if(isset($_SESSION['qtySP'])){
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
			if(isset($row['Beilage'])==true){
				$bl_ar=explode("|",$row['Beilage']);
				foreach ($bl_ar as $val_a) {
					$xtpl->assign("BEILAGE",$val_a);
					$xtpl->parse("cart.beilage.dishisshiss");
				}

				$xtpl->assign("PLU",$row['plu']);
				$xtpl->assign("STTPP",$_SESSION['countpp']);
				$xtpl->parse("cart.beilage");
			}
			else {
				$xtpl->parse("cart.namenot");
			}

			$xtpl->parse("cart.pricesession");
			$xtpl->parse('cart');
			$xtpl->out("cart");

			unset($_SESSION['qtySP']);
		}
		elseif($row['qty']>1){ echo $row['price'];}
		else{
			$xtpl->assign("QTY",1);
			$xtpl->assign("IDSP",$row['idSP']);
			$xtpl->assign('NAME',$row['name']);
			$str=$row['price']*$row['qty'];
			$price_s=number_format($str,2,',','.');
			$xtpl->assign("PRICES",$price_s);
			$str1=$row['price'];
			$price_s1=number_format($str1,2,',','.');
			$xtpl->assign('PRICE',$price_s1);
			$xtpl->assign('NOTECONTENT',$de_cart['note']['content']);
			$xtpl->assign("ICONPRICE",$config['iconprice']);
			if(isset($row['Beilage'])==true){
				$bl_ar=explode("|",$row['Beilage']);
				foreach ($bl_ar as $val_a) {
					$xtpl->assign("BEILAGE",$val_a);
					$xtpl->parse("cart.beilage.dishisshiss");
				}
				$xtpl->assign("PLU",$row['plu']);
				$xtpl->assign("STTPP",$_SESSION['countpp']);
				$xtpl->parse("cart.beilage");
			}
			else {
				$xtpl->parse("cart.namenot");
			}
			$xtpl->assign("STTPP",$_SESSION['countpp']);
			$xtpl->parse("cart.pricenotsession");
			$xtpl->parse('cart');
			$xtpl->out("cart");
		}
	}
}
	
 ?>