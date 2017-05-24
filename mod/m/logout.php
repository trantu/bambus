<?php if(!defined('SECURITY')) exit('404 - Not Access'); 
unset($_SESSION['Email']);
header("location:index.php?mod=m/home");

 ?>