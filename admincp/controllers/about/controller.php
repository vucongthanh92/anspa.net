<?php

$act = $_GET['act'];



switch($act)

{

	case 'add':		include('controllers/about/add.php');break;

	case 'edit':	include('controllers/about/edit.php');break;

	case 'del':		include('controllers/about/del.php');break;

	case 'list':	include('controllers/about/list.php');break;

	case 'save':	include('controllers/about/save.php');break;

	case 'delete':	include('controllers/about/delete.php');break;

	default:		include('controllers/about/list.php');break;

}

?>