<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/chuyenkhoa/add.php');break;
	case 'edit':	include('controllers/chuyenkhoa/edit.php');break;
	case 'del':		include('controllers/chuyenkhoa/del.php');break;
	case 'list':	include('controllers/chuyenkhoa/list.php');break;
	case 'save':	include('controllers/chuyenkhoa/save.php');break;
	default:		include('controllers/chuyenkhoa/list.php');break;
}
?>