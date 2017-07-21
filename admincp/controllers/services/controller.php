<?php
$act = $_GET['act'];
switch($act)
{

	case 'add':		include('controllers/services/add.php');break;

	case 'edit':	include('controllers/services/edit.php');break;

	case 'del':		include('controllers/services/del.php');break;

	case 'list':	include('controllers/services/list.php');break;

	case 'save':	include('controllers/services/save.php');break;

	default:		include('controllers/services/list.php');break;

}

?>