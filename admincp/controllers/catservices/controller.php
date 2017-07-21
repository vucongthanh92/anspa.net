<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/catservices/add.php');break;
	case 'edit':	include('controllers/catservices/edit.php');break;
	case 'del':		include('controllers/catservices/del.php');break;
	case 'list':	include('controllers/catservices/list.php');break;
	case 'save':	include('controllers/catservices/save.php');break;
	default:		include('controllers/catservices/list.php');break;
}
?>