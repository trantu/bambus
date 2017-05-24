<?php
session_start();

if(isset($_POST['user'])){
    $_SESSION['user']=$_POST['user'];
}
if(isset($_POST['pass'])){
    $_SESSION['pass']=$_POST['pass'];
}

$admin = parse_ini_file("admin.ini");
if($_SESSION['user']=='admin'&&$_SESSION['pass']==$admin['PASS']){
    header("Location: ../admin/index.php");
}else{
    header("Location: ../admin/login.php");
}

?>