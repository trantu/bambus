<?php 
#Xoa san pham theo idSP
if(!defined('SECURITY')) exit('404 - Not Access'); 
	require_once("././lib/cart.php");
	$cart=new Cart;
	$idSP=$_POST['idSP'];
	$cart->delete_idSPw($idSP);
	$ar['total']=$_SESSION['total'];
	$ar['total_dishis']=$_SESSION['total_dishis'];

	echo json_encode($ar);
 ?>