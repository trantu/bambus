<?php
/**
 * Created by PhpStorm.
 * User: kiemduongvan
 * Date: 2/19/16
 * Time: 11:41 PM
 */
if(!defined('SECURITY')) exit('404 - Not Access');

require_once("all.php");
$all = new All();

$dishes = $all->api_getAllDishes();

echo json_encode($dishes);