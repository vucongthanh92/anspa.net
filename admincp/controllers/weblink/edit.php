<?php
$db = new Models_MWeblink;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'link' 			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	//upload img
	if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Partners/",$error);
		if($hinh!="") $data['images'] = $hinh;
	}
	$db -> editWeblink($data,$id);
	$link = array(
		'list'	=> "weblink/list",
		'add'	=> "weblink/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneWeblink($id);
loadview("weblink/edit_view",$data);
?>