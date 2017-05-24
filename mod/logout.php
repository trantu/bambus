<?php if(!defined('SECURITY')) exit('404 - Not Access'); 

//log out khoi he thong
unset($_SESSION['Email']);
unset($_SESSION['idUser']);
header("location:index.php?mod=home");

 ?>