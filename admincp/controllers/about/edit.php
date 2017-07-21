<?php
$db = new Models_MAbout;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'title_vn' 		=> addslashes(varPost('title_vn')),
		'description_vn'=> addslashes(varPost('description_vn','',1)),
		'content_vn'	=> addslashes(varPost('content_vn','',1)),
		'title_en' 		=> addslashes(varPost('title_en')),
		'description_en'=> addslashes(varPost('description_en','',1)),
		'content_en'	=> addslashes(varPost('content_en','',1)),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	
	);
	
	//upload img
	if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/News/",$error);
		if($hinh !="") $data["images"] = $hinh;
	}
	
	$db -> editNews($data,$id);
	//lay id cat cu
	$link = array(
		'list'	=> "about/list",
		'add'	=> "about/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("about/edit_view",$data);
?>