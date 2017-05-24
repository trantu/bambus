<?php 

	$_SESSION['newcart']=1;//tao session nhận biết có người mới order
	if(isset($_SESSION['sp'])){
		unset($_SESSION['sp']);
	}
	
	$_SESSION['sp']=array();
	if(isset($_SESSION['arrSPPP'])==false){
		$_SESSION['arrSPPP']=array();
	}

	if(isset($_SESSION['total_PP'])==false){
		$_SESSION['total_PP']=0;
	}

	if(isset($_SESSION['total'])==false){
		$_SESSION['total']=0;
	}

	if($_SESSION['arrSP']!=null){
		$_SESSION['arrSPPP'][$_SESSION['countpp']]=$_SESSION['arrSP'];
		$_SESSION['total_PP']=$_SESSION['total_PP']+$_SESSION['total'];
		
		unset($_SESSION['arrSP']);
		unset($_SESSION['total']);
	}
		
	$_SESSION['countpp']++;	
 ?>