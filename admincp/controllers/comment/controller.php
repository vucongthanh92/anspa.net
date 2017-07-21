<?php

$act = $_GET['act'];



switch($act)

{

	case 'add':		include('controllers/comment/add.php');break;

	case 'edit':	include('controllers/comment/edit.php');break;

	case 'del':		include('controllers/comment/del.php');break;

	case 'list':	include('controllers/comment/list.php');break;

	case 'save':	include('controllers/comment/save.php');break;

	case 'delete':	include('controllers/comment/delete.php');break;

	default:		include('controllers/comment/list.php');break;

}

?>