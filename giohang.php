<?php
include ("libraries/class_db.php");
include ("config/config.php");
include ("config/config_site.php");
include ("config/title_page.php");

include ("libraries/functions.php");
include ("libraries/controls.php");
$id =$_GET["id"];
$soluong = $_GET['soluong'];
session_start();
if($_GET['pri']==0){
$db = new Models_MProduct;
if( isset($_SESSION["cart2"][$id])){
	$_SESSION["cart2"][$id] = $_SESSION["cart2"][$id] + $soluong;	
}
else {
	$_SESSION["cart2"][$id] = $soluong;
}
 if(isset($_SESSION['cart2'])==false) {
	 $tong = "0";
 } else {
	$tong = 0;
	 $tien = 0;
	 foreach($_SESSION['cart2'] as $k=>$v){
		 if($k>0){
		$info = $db->getOneProduct($k);
		$tong = $tong + $v;
		$tien = $tien+ $info['sale_price']*$v;
		 }
	 } 
	 
 }

	$_SESSION['price'] = $tien;
	echo $tong;
}else {
	echo bsVndDot($_SESSION['price'])." đ";
}
?> 
