<?php
if(!defined('SECURITY')) exit('404 - Not Access');
// Lấy NOTE
if(isset($_POST['idsp_get_note']))
{
	$idsp = trim(strip_tags($_POST['idsp_get_note']));
	if(isset($_SESSION['arrSP']["$idsp"]))
	{
		echo trim(strip_tags($_SESSION['arrSP']["$idsp"]['note']));
	}
}
?>