<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/nhomthietbi/add.php');break;
	case 'edit':	include('controllers/nhomthietbi/edit.php');break;
	case 'del':		include('controllers/nhomthietbi/del.php');break;
	case 'list':	include('controllers/nhomthietbi/list.php');break;
	case 'save':	include('controllers/nhomthietbi/save.php');break;
	default:		include('controllers/nhomthietbi/list.php');break;
}
?>