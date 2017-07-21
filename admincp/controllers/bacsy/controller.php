<?php
$act = $_GET['act'];
switch($act)
{

	case 'add':		include('controllers/bacsy/add.php');break;

	case 'edit':	include('controllers/bacsy/edit.php');break;

	case 'del':		include('controllers/bacsy/del.php');break;

	case 'list':	include('controllers/bacsy/list.php');break;

	case 'save':	include('controllers/bacsy/save.php');break;

	default:		include('controllers/bacsy/list.php');break;

}

?>