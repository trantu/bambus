<?php  
if(!defined('SECURITY')) exit('404 - Not Access');
	require_once("././lib/cart.php");
	$cart=new Cart;
	$cart->unsetCart();
	header("location:index.php?mod=m/main");
 ?>