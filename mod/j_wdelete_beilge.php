<?php if(!defined('SECURITY')) exit('404 - Not Access');

	require_once("./lib/cart.php");
	$cart=new Cart;
	
	if(isset($_POST['idSP'])){
		
		$idSP=$_POST['idSP'];
		$stt=$_POST['stt'];
		settype($stt,"int");

		if(isset($_SESSION['arrSPPP'][$stt]["$idSP"])){
			$qty=$_SESSION['arrSPPP'][$stt]["$idSP"]['qty'];
			$price=$_SESSION['arrSPPP'][$stt]["$idSP"]['price'];
			$money=$qty* $price;
			$_SESSION['total_PP']=$_SESSION['total_PP']-$money;
			$_SESSION['qtySP']=$qty;
			unset($_SESSION['arrSPPP'][$stt]["$idSP"]);
			echo $_SESSION['total_PP'];
		}
		else{

			if(isset($_SESSION['sp']["$idSP"])){
				$_SESSION['sp']["$idSP"]=0;
			}

			echo $cart->delete_idSPw($idSP);
		}
			
	}
	
 ?>