<?php
$db = new Models_MFlash;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'width' 		=> varPost('width'),
		'height' 		=> varPost('height'),
		'style' 		=> varPost('style'),
		'location' 		=> varPost('location'),
		'link'			=> varPost('link'),
		'sort'			=> varPost('sort'),
	);
	
	if($_FILES['file_vn']['name']!=""){	
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$data['file_vn'] = time() . '_' . $_FILES['file_vn']['name'];
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Flash/'.$data['file_vn']);
		
	}

	
	$db -> editflash($data,$id);
	$link = array(
		'list'	=> "flash/list",
		'add'	=> "flash/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneflash($id);
loadview("flash/edit_view",$data);
?>