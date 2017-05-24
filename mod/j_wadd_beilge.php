<?php  
#Add sản phẩm có ăn kèm
#lưu ý kiểm tra order cho 1 người hay nhiều người
#chú ý đến session tổng sản  đổi dạng json
if(!defined('SECURITY')) exit('404 - Not Access');
require_once("./lib/cart.php");
$cart=new Cart;
if(isset($_POST['arrDS'])){
	$arr=$_POST['arrDS'];
	$idSPs=$_POST['idSPs'];
	/*$stt='sothutu';
		if(isset($_POST['stt'])) { $stt=$_POST['stt'];}
	*/
	$i=0;$total_ds=0;$name_ds='';$arrdishis='';$note='';$stt_bei='';
	$count=count($arr);
	foreach ($arr as $a) {
		if(is_array($a)){
			$total_ds +=$a[0];
			$name_ds.=$a[1];
			$stt_bei.=$a[2].'¶'.$a[1].'¶'.($a[0]*100).'█';
			if($i<$count-1) { $arrdishis.=$a[1]."|"; }
			else{ $arrdishis.=$a[1]; }	
		}
		else{ echo -1;}	
		$i++;
	}

	//¶¶¶*¶¶¶1¶¶¶*¶¶¶2¶¶¶*¶¶¶2,00¶¶¶*¶¶¶1¶Tỏi¶30█1¶Hành¶█2¶Bò¶150█

	$idSP=$name_ds.$idSPs;
	$note=trim(strip_tags($_POST['note']));
	if(isset($_SESSION['total_PP'])==false){
		$total_price=number_format($cart->add_cart_beilage_w($idSP,$idSPs,$total_ds,$arrdishis,$idSPs,$note,$stt_bei),2,',','.');
		$total_sp=$_SESSION['total_dishis'];
		$arr_rs['total_price']=$total_price;
		$arr_rs['total_sp']=$total_sp;
		echo json_encode($arr_rs);
	}
	else{
		$add=$cart->add_cart_beilage_w($idSP,$idSPs,$total_ds,$arrdishis,$idSPs,$note,$stt_bei);
		$total=$_SESSION['total_PP']+$add;
		$total_price=number_format($total,2,',','.');
		$total_sp=$_SESSION['total_dishis'];
		$arr_rs['total_price']=$total_price;
		$arr_rs['total_sp']=$total_sp;
		echo json_encode($arr_rs);
	}
	
	
}


 ?>