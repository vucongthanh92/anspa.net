<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ob_start();
session_start();

include ("libraries/class_db.php");
include ("config/config.php");
include ("config/config_site.php");
include ("config/title_page.php");
$_SESSION['hotline']=$title['hotline1'];
$_SESSION['name1']=$title['name1'];
$_SESSION['phone1']=$title['phone1'];
$_SESSION['name2']=$title['name2'];
$_SESSION['phone2']=$title['phone2'];

include ("libraries/functions.php");
include ("libraries/controls.php");

//kiem tra ngon ngu
if(isset($_POST['lang'])){
	$lang = strtolower($_POST['lang']);
	//session_register("lang");
	$_SESSION['lang'] = $lang;
}elseif(isset($_SESSION['lang'])){
	$lang = strtolower($_SESSION['lang']);
}else{
	$lang = "vn"; //default language
	//session_register("lang");
	$_SESSION['lang']=$lang;
}

if(file_exists("language/$lang.php")){
	include ("language/$lang.php");
}else{
//lang not exists, default language
	include ("language/vn.php");
	//session_register("lang");
	$_SESSION['lang']="vn";
}

$lang = $_SESSION['lang'];
define("lang",$lang);

// map title
$map_title = "<a href = '".BASE_URL."' class = 'linkred'>Home</a>";
$arrowmap = "  »  ";



require 'meta.php';

?>