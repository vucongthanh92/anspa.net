<?php
$db = new Models_MBacsy;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
	    'title_vn' 		   => addslashes(varPost('title_vn')),
		'title_en' 		   => addslashes(varPost('title_en')),
		'sort'			   => varPost('sort'),
		'ticlock'		   => varPost('ticlock','0'),
		'parentid'		   => varPost('parentid','0'),
		'price'		       => str_replace(".","",varPost('price','0')),	
	);
	
	//upload img
	
	$db -> editNews($data,$id);
	$link = array(
		'list'	=> "bacsy/list/",
		'add'	=> "bacsy/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("bacsy/edit_view",$data);
?>