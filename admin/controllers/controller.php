<?php
$controller=$_POST['controller'];
$action=$_POST['action'];
require_once $controller.'.php';

$class= new $controller;

echo $class->$action();

?>