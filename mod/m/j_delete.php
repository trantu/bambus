<?php if(!defined('SECURITY')) exit('404 - Not Access');

	require_once("./lib/cart.php");
	$cart=new Cart;

	if(isset($_SESSION['total_PP'])==false){
		echo number_format($cart->delete(),2,',','.');
	}
	else{
		$add=$cart->delete();
		$total=$_SESSION['total_PP']+$add;
		echo number_format($total,2,',','.');
	}



 ?>