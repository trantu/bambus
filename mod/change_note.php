<?php 
##Change note food
#CHange ipSP SESSSION
#Check ipSP isset
 if(!defined('SECURITY')) exit('404 - Not Access');
 if(isset($_POST['idSP'])){
 	$idSP=trim(strip_tags($_POST['idSP']));
 	$note=trim(strip_tags($_POST['note']));
 	$idSP_new=$idSP.md5($note);
 	if(isset($_SESSION['arrSP']["$idSP_new"])){
 		$soluongthem=$_SESSION['arrSP']["$idSP"]['qty'];
 		$_SESSION['arrSP']["$idSP_new"]['qty']=$_SESSION['arrSP']["$idSP_new"]['qty']+$soluongthem;
 		unset($_SESSION['arrSP']["$idSP"]);
 		echo json_encode(array('rs'=>2,'idSP'=>$idSP_new));
 	}
 	
 	elseif(isset($_SESSION['arrSP']["$idSP"]) && !isset($_SESSION['arrSP']["$idSP_new"])){
 		$_SESSION['arrSP']["$idSP_new"]=$_SESSION['arrSP']["$idSP"];
 		$_SESSION['arrSP']["$idSP_new"]['idSP']=$idSP_new;
 		$_SESSION['arrSP']["$idSP_new"]['note']=$note;
 		unset($_SESSION['arrSP']["$idSP"]);
 		echo json_encode(array('rs'=>1,'idSP'=>$idSP_new));
 	}

 }


 ?>