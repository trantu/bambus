<?php 
# add mon an và echo tổng tiền của giỏ hàng theo format
# kiem tra post stt nếu có thì sẽ chia theo người order không có thì 1 người 

 if(!defined('SECURITY')) exit('404 - Not Access');
require_once("./lib/cart.php");
$cart=new Cart;

if(isset($_POST['idSP'])){
		$stt='sothutu';
		$idSP=$_POST['idSP'];
	if(isset($_POST['stt'])){
		$stt=trim(strip_tags($_POST['stt']));
		settype($stt,'int');

		if($stt==$_SESSION['countpp'] || $_SESSION['countpp'] ==0){

			if(isset($_SESSION['total_PP'])==false){
				echo  number_format($cart->add_cart(),2,',','.');
			}
			else{
				$add=$cart->add_cart();
				$total=$_SESSION['total_PP']+$add;
				 echo number_format($total,2,',','.');
			}
		}
		else{

			if(isset($_SESSION['arrSPPP'][$stt]["$idSP"])){
				$_SESSION['arrSPPP'][$stt]["$idSP"]['qty']=$_SESSION['arrSPPP'][$stt]["$idSP"]['qty']+1;
				$price=$_SESSION['arrSPPP'][$stt]["$idSP"]['price'];
				$_SESSION['total_PP']=$_SESSION['total_PP']+ $price;
				echo number_format($_SESSION['total_PP']+ $_SESSION['total'],2,',','.');;
			}

		}	

	}
	
	else{
		if(isset($_SESSION['total_PP'])==false){
				echo number_format($cart->add_cart(),2,',','.');	
		}
		else{
			$add=$cart->add_cart();
			$total=$_SESSION['total_PP']+$add;
			echo number_format($total,2,',','.');	
		}
	}	

	
}	
?>

