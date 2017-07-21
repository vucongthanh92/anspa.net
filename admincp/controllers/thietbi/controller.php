<?php
$act = $_GET['act'];
switch($act)
{

	case 'add':		include('controllers/thietbi/add.php');break;

	case 'edit':	include('controllers/thietbi/edit.php');break;

	case 'del':		include('controllers/thietbi/del.php');break;

	case 'list':	include('controllers/thietbi/list.php');break;

	case 'save':	include('controllers/thietbi/save.php');break;

	default:		include('controllers/thietbi/list.php');break;

}

?>