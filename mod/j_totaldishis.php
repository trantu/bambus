<?php 
#Lấy tổng số lượng món ăn  theo session total_dishis bên lib/cart.php
if(!defined('SECURITY')) exit('404 - Not Access');
require_once("./lib/cart.php");
$cart=new Cart;
echo $_SESSION['total_dishis'];

 ?>