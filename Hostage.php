<?php 

//********************************************************************************************
//	Diyanada J. Gunawardena
// 	diyanada@gmail.com
//********************************************************************************************

echo "<pre>";

$_Url = filter_input(INPUT_GET, "_Url");

require_once (dirname(__FILE__) . "/Class/Hostage.php");
$_Hostage = new Hostage($_Url);

echo "</pre>";





