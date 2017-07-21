<?php
$db = new Models_MPicture;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'sort'			=> varPost('sort'),
		'link'			=> varPost('link'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	
	//upload img
	if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn')).time().rand_string();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Picture/",$error);
		if($hinh!="") $data['images'] = $hinh;
	}else{ $hinh = "";}
	
	if($_FILES['file_vn']['name']!=""){	
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$data['file_vn'] = time() . '_' . $_FILES['file_vn']['name'];
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Picture/'.$data['file_vn']);
		
		
	}

	
	$db -> editNews($data,$id);
	$link = array(
		'list'	=> "picture/list",
		'add'	=> "picture/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("picture/edit_view",$data);
?>