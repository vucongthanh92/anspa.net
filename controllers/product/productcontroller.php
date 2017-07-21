<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else 
	$act = "";
switch($act)
{
	case 'timnhanh':			include('controllers/product/search.php');break;
	case 'tim-kiem':			include('controllers/product/search.php');break;
	case 'chi-tiet':			include('controllers/product/detail.php');break;
	case 'danh-muc':			include('controllers/product/list.php');break;
	case 'catelog':				include('controllers/product/catelog.php');break;
	case 'giamcan':				include('controllers/product/list3.php');break;
	default:					include('controllers/product/list.php');break;
}
?>