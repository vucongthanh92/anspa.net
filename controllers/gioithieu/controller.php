<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act = "";
}

switch($act)
{
	case "danhmuc":
		include ("controllers/gioithieu/list.php");
		break;
	case "chitiet":
		include ("controllers/gioithieu/detailnews.php");
		break;
	case "timkiem":
		include ("controllers/gioithieu/searchnews.php");
		break;
	default:
		include ("controllers/gioithieu/list.php");
		break;	
}

?>